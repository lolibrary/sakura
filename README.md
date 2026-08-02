<p align="center"><img height="150" src="/.github/banner.png"></p>
<p align="center">
  <a href="https://patreon.com/lolibrary" title="Support us on Patreon"><img src="/.github/patreon-donate-orange.svg" alt=""></a>
</p>

## Lolibrary

[Lolibrary](https://lolibrary.org) is a lolita fashion archive website, run by Lolibrary Inc (a 501(c)(3) nonprofit). This repository contains code for Lolibrary's main archive site, `lolibrary.org`.

### Technology

This codebase is primarily written in PHP, using modern [Laravel](https://laravel.com/) and [Filament](https://filamentphp.com). UI styling is done using Tailwind, with [Bootstrap 4](https://getbootstrap.com/docs/4.6/getting-started/introduction/) in there too.

Translation of UI elements is in progress, using [Weblate](https://hosted.weblate.org/projects/lolibrary/).

### Licensing

The majority of this repository is offered under [the BSD 3-Clause license](https://choosealicense.com/licenses/bsd-3-clause/), with one exception:

  * Image files under [/public](https://github.com/lolibrary/sakura/tree/master/public) are not licensed for reuse. They contain images and branding created specifically for the main Lolibrary instance, and are included here for volunteers working on the codebase and to show what filenames the templates expect.

### Getting Started

You will need a working development environment - at minimum, this is:

- A PHP 8.5+ server using a trusted TLS certificate
- A working PostgreSQL server (16+)
- A local or remote S3-compatible storage, with a trusted TLS certificate.
- Redis/Valkey

On macOS, Laravel Herd, enabling valkey and minio, and `brew install postgres@18` will do the trick.

The hostname you use must be `https://sakura.test` or `https://lolibrary.test` locally if you plan to connect to any of our services in production via readonly dev keys.
This is for CORS setups.

```bash
$ composer install
$ cp .env.example .env     # edit this accordingly
$ php artisan key:generate
$ php artisan migrate --seed
$ php artisan app:create-system-users
```

This should give you a minimal environment locally.

### Contributing

Please submit pull requests against `main`; your pull request might be cloned into `preview/your-branch-name` by an organisation member to automatically generate a preview environment using our production config.

Feel free to join our discord if you have any questions; the link can be found in the contributor dashboard on the website.
