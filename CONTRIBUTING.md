# Developer Certificate of Origin

You'll need to add `Signed-off-by` to at least one of your commits or your pull request message.

Thankfully, this is not hard, and can be your web-based git email, e.g. `id+username@users.noreply.github.com`:

```bash
git commit --signoff -m "your commit message here"

# Signed-off-by: username <you@email.example>
```

By signing off, you agree to this verbatim:

> Developer Certificate of Origin
> Version 1.1
>
> Copyright (C) 2004, 2006 The Linux Foundation and its contributors.
> 1 Letterman Drive
> Suite D4700
> San Francisco, CA, 94129
>
> Everyone is permitted to copy and distribute verbatim copies of this
> license document, but changing it is not allowed.
>
>
> Developer's Certificate of Origin 1.1
>
> By making a contribution to this project, I certify that:
>
> (a) The contribution was created in whole or in part by me and I
>    have the right to submit it under the open source license
>    indicated in the file; or
>
> (b) The contribution is based upon previous work that, to the best
>    of my knowledge, is covered under an appropriate open source
>    license and I have the right under that license to submit that
>    work with modifications, whether created in whole or in part
>    by me, under the same open source license (unless I am
>    permitted to submit under a different license), as indicated
>    in the file; or
>
> (c) The contribution was provided directly to me by some other
>    person who certified (a), (b) or (c) and I have not modified
>    it.
>
> (d) I understand and agree that this project and the contribution
>    are public and that a record of the contribution (including all
>    personal information I submit with it, including my sign-off) is
>    maintained indefinitely and may be redistributed consistent with
>    this project or the open source license(s) involved.

This is taken from [https://developercertificate.org](https://developercertificate.org).

# Commit Messages

We're not too precious about commit message format, but try and make
sure they are fully descriptive of what is actually in the commit given.

# Commit Signing

If you're a regular contributor, please sign your commits when pushing them to preview environments or they will be ignored.

# Branch Usage

Everything should go into `main` and target that in Pull Requests.

This will be continuously pushed into staging automatically.

## Preview Environments

Anything that is:

- pushed by someone in @lolibrary/core
- has a signed commit
- is pushed to `preview/**`

Will be automatically pushed to a preview environment at `https://[branch-name].lolibrary.space` with a seeded database.

## Production

The branch `production` is the only one that will trigger a deployment build on `https://lolibrary.org`.

All pushes must be via pull request and merged by core developers, though admins can override this.
