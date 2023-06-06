<p align="center"><img height="150" src="/.github/banner.png"></p>
<p align="center">
  <a href="https://patreon.com/lolibrary" title="Support us on Patreon"><img src="/.github/patreon-donate-orange.svg" alt=""></a>
</p>

## Lolibrary

[Lolibrary](https://lolibrary.org) is a lolita fashion archive website, run by Lolibrary Inc (a 501(c)(3) nonprofit). This repository contains frontend code for Lolibrary's main archive site.

### Technology

This codebase is primarily written in PHP, using the [Laravel](https://laravel.com/) framework. Some of the search functionality is written in [Vue.js](https://vuewjs.org). UI styling is done using [Bootstrap 4](https://getbootstrap.com/docs/4.6/getting-started/introduction/).

### Licensing

The majority of this repository is offered under [the BSD 3-Clause license](https://choosealicense.com/licenses/bsd-3-clause/), with two exceptions:

  * The [Nova ImageArray component](https://github.com/lolibrary/sakura/tree/master/nova-components/ImageArray) is offered under the [MIT license](https://choosealicense.com/licenses/mit/)
  * Asset files under [/public](https://github.com/lolibrary/sakura/tree/master/public) are not licensed for reuse. They contain images and branding created specifically for the main Lolibrary instance, and are included here for volunteers working on the codebase and to show what filenames the templates expect.

In addition, the codebase currently relies on two non-free components - [Laravel Nova](https://nova.laravel.com/) and [Font Awesome Pro](https://fontawesome.com/). They are not distributed with the project, and anyone wishing to reuse the codebase will need to provide their own copies. Volunteers working on the main Lolibrary.org codebase who need copies for local development work only should speak to one of the head devs.