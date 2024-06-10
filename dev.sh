#!/bin/bash
cd /srv

if [[ "$1" == "SETUP" ]]; then
    composer config http-basic.nova.laravel.com "$NOVA_USERNAME" "$NOVA_API_KEY" --no-interaction
    COMPOSER_MEMORY_LIMIT=-1 composer install --no-interaction
    cp fortawesome* ../
    npm install
    npm run build
else
    COMPOSER_MEMORY_LIMIT=-1 composer install --no-interaction
    npm install
    npm run build

    # PHP dev server doesn't have a way of handling a static folder seperately
    # so just symlink these where the app expects them.
    ln -s /srv/public/assets /srv/assets
    ln -s /srv/public/build /srv/build
    ln -s /srv/public/fonts /srv/fonts
    ln -s /srv/public/vendor /srv/vendor
    ln -s /srv/public/images /srv/images
    ln -s /srv/public/vendor/nova /srv/vendor/nova
    ln -s /srv/public/categories /srv/categories
    php -S 0.0.0.0:3000 /srv/server.php
fi

