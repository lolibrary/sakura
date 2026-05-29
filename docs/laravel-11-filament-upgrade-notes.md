# Laravel 11 / Filament Upgrade Notes

This document tracks the concrete prep and migration work needed to move
Sakura from Laravel 6 / PHP 7.3 to a Filament-compatible stack.

## Target

- PHP 8.2+
- Laravel 11
- Filament 5

## Prep Work Already Done

- Converted route definitions to class-based controller syntax.
- Removed `RouteServiceProvider` namespace coupling.
- Replaced `Auth::routes()` with explicit auth route definitions.
- Updated the exception handler signatures from `Exception` to `Throwable`.
- Added a forward-compatible mail config shape with `default` / `mailers`
  while preserving the old `MAIL_DRIVER` path during the transition.
- Fixed the Nova action filename/class mismatch that was triggering a PSR-4
  autoload warning during Composer operations.
- Added compatibility wrappers for proxy trust and maintenance middleware so
  the app can bridge Laravel 6 naming/package conventions and newer
  framework middleware classes.

## Dependency Map

### Core framework

- `php:^7.3`
  - Action: raise to PHP 8.2 after dependency compatibility is ready.
- `laravel/framework:^6.18`
  - Action: upgrade in major-version steps until Laravel 11 is reached.

### Keep, but upgrade

- `astrotomic/laravel-translatable:^11.9`
  - Action: keep and upgrade to a Laravel 11 compatible release.
  - Notes: public models already use this package heavily.
- `laravel/passport:^7.5`
  - Action: keep only if the API auth surface still needs OAuth2.
  - Notes: current app code only clearly uses `HasApiTokens` on `User`.
- `laravel/tinker:^2.0`
  - Action: upgrade alongside Laravel.
- `league/flysystem-aws-s3-v3:^1.0`
  - Action: upgrade for the newer Flysystem stack used by Laravel 11.
- `stevebauman/purify:^4.0`
  - Action: upgrade to a Laravel 11 compatible release.
- `sentry/sentry-laravel:^1.6`
  - Action: removed from the root package requirements.
  - Notes: runtime calls were already guarded so app boot does not depend on
    the package being installed.

### Replace or remove

- `fideloper/proxy:^4.0`
  - Action: removed from the root package requirements.
  - Notes: the app now ships its own proxy middleware implementation so the
    current Laravel 6 stack no longer depends on the package.
- `wildbit/swiftmailer-postmark:^3.4`
  - Action: removed from the root package requirements.
  - Replacement: Laravel 11 mailers / Symfony Mailer Postmark transport.
  - Notes: current mail config now falls back to SMTP if an old environment
    still sets `MAIL_DRIVER=postmark` without the legacy transport installed.
- `league/flysystem-cached-adapter:^1.0`
  - Action: removed from the root package requirements.
  - Notes: no direct app-code usage was found before removal.
- `fakerphp/faker`
  - Action: already swapped in for the abandoned `fzaninotto/faker` package.
  - Notes: existing factory files still use the `Faker\Generator` namespace,
    which remains compatible.
- `facade/ignition:^1.4`
  - Action: removed from the current root dev requirements.
  - Replacement: the current Laravel error page package used by the target
    framework version once the Laravel upgrade lands.

## Code Hotspots For The Upgrade

### Framework structure

- `app/Http/Kernel.php`
  - Partially completed: now points at `PreventRequestsDuringMaintenance`.
  - Remaining work: review middleware aliases during the full framework jump.
- `app/Http/Middleware/TrustProxies.php`
  - Completed for the current stack: now uses a local implementation instead
    of depending on `fideloper/proxy`.
- `config/mail.php`
  - Partially completed: modern `default` / `mailers` keys are present.
  - Remaining work: remove the legacy `driver` path after the framework
    upgrade and replace the SwiftMailer Postmark package.

### Tests

- `database/factories/*.php`
  - Completed for Stage 1: converted to Laravel 8 class-based factories for
    the currently covered models.
- `tests/Feature/Policies/ItemPolicyTest.php`
  - Completed for Stage 1: migrated off the legacy `factory()` helper and now
    uses in-memory model construction from Laravel 8 factories.

### Admin migration

- `app/Nova/*`
  - Rebuild resource-by-resource in Filament after Laravel 11 is stable.
- `app/Nova/Item.php`
  - Highest-effort resource because it uses custom actions, uploads, status logic, attach-many UX, and flexible content.
- `app/Nova/TranslatableResource.php`
  - Shared translation-aware admin search/sort behavior that needs a Filament equivalent.

## Recommended Order

1. Finish Laravel-upgrade prep refactors that are safe on Laravel 6.
2. Update Composer constraints and package choices.
3. Upgrade Laravel through the required major versions.
4. Repair tests and factories.
5. Stabilize the public app on Laravel 11.
6. Install Filament.
7. Rebuild simple admin resources first.
8. Rebuild the `Item` admin resource last.
9. Remove Nova once Filament parity is acceptable.

## Version Bump Plan

### Why This Needs To Be Staged

The current dependency graph makes Laravel 8 the first realistic landing
zone. Laravel 9+ is blocked not only by the root `laravel/framework` pin,
but also by the current PHP platform and package compatibility:

- `laravel/passport v7.5.1` only supports Laravel 6 / 7.
- `astrotomic/laravel-translatable v11.9.1` only supports Laravel 8 and below.
- The app is still pinned to PHP `7.3.33`.

### Stage 1: Laravel 6 -> 8

Target:

- Keep PHP on `7.3` for this stage.
- Move `laravel/framework` to `^8`.

Package targets:

- `laravel/passport` -> `^10.4`
  - Supports Laravel `^8.37|^9.0` and PHP `^7.3|^8.0`.
- `laravel/ui` -> `^3.4`
  - Restores the legacy auth controller traits used by the current auth
    controllers on Laravel 8.
- Keep `astrotomic/laravel-translatable` on the current major line for now.
- Keep `stevebauman/purify` on the current major line for now.
- `nunomaduro/collision` -> `^5.11`
- `phpunit/phpunit` -> `^9.6`

App work expected in this stage:

- Convert factories and tests to Laravel 8 class-based factories.
- Review Laravel 8 factory / seeder namespace changes after the initial
  conversion.
- Verify the new route syntax and auth route refactors we already made.
- Retest middleware and auth flows after the framework bump.

### Stage 2: Laravel 8 -> 9

Target:

- Raise PHP to `8.0.2+`.
- Move `laravel/framework` to `^9`.

Package targets:

- `astrotomic/laravel-translatable` -> `^11.17`
  - Supports Laravel `^9|^10|^11|^12|^13`.
- `laravel/passport` -> `^11.10`
  - Supports Laravel `^9|^10` and PHP `^8.0`.
- `stevebauman/purify` -> `^5.1`
  - Supports Laravel `^7|^8|^9|^10` and PHP `>=7.4`.

App work expected in this stage:

- Laravel 9 switches to Symfony Mailer and Flysystem 3.
- Revisit mail configuration after the earlier Postmark cleanup.
- Review storage / filesystem behavior and any S3 integration assumptions.

### Stage 3: Laravel 9 -> 10

Target:

- Raise PHP to `8.1+`.
- Move `laravel/framework` to `^10`.

Package targets:

- Keep `astrotomic/laravel-translatable` on the Laravel 9-compatible line.
- Keep `laravel/passport` on the Laravel 9 / 10-compatible line.
- Keep `stevebauman/purify` on `^5.1`.

App work expected in this stage:

- Remove `minimum-stability: dev` unless a real remaining need exists.
- Review deprecated testing helpers and PHPUnit config changes.
- Review any manual date casting or `DB::raw` expression handling.

### Stage 4: Laravel 10 -> 11

Target:

- Raise PHP to `8.2+`.
- Move `laravel/framework` to `^11`.

Package targets:

- `laravel/passport` -> `^13.7`
  - Supports Laravel `^11.35|^12|^13` and PHP `^8.2`.
- Keep `astrotomic/laravel-translatable` on `^11.17` or newer compatible line.
- `stevebauman/purify` -> `^6.3`
  - Supports Laravel `^7|^8|^9|^10|^11|^12|^13`.

App work expected in this stage:

- Rename `$routeMiddleware` to `$middlewareAliases` if desired.
- Remove remaining Laravel 6 compatibility shims once the framework no longer
  needs them.
- Revisit auth, mail, cache tags, and test infrastructure on the new stack.

### Repo-Specific Hazards To Keep In View

- The app still uses cache tags in several places, including `SearchController`
  and `Item`, which deserve review during later Laravel upgrades.
- `AuthServiceProvider` still manually calls `registerPolicies()`.
- Several models and helpers use `DB::raw(...)` in ways worth retesting during
  the Laravel 10+ jump.
