#!/bin/bash
cd /srv

install_php_dependencies() {
    if [[ -n "$NOVA_USERNAME" && -n "$NOVA_API_KEY" ]]; then
        composer config http-basic.nova.laravel.com "$NOVA_USERNAME" "$NOVA_API_KEY" --no-interaction
    fi

    COMPOSER_MEMORY_LIMIT=-1 composer install --no-interaction
}

build_frontend_assets() {
    export NODE_OPTIONS="--openssl-legacy-provider"

    if npm install && npm run development; then
        :
    else
        echo "Frontend asset build failed. Falling back to checked-in assets."
    fi
}

run_migrations() {
    for attempt in 1 2 3 4 5; do
        if php artisan migrate --force; then
            return 0
        fi

        echo "Database migrations failed on attempt ${attempt}; retrying in 3s."
        sleep 3
    done

    echo "Database migrations did not complete automatically. Starting the server anyway."
    return 0
}

if [[ "$1" == "SETUP" ]]; then
    install_php_dependencies
    build_frontend_assets
else
    install_php_dependencies
    build_frontend_assets
    run_migrations

    # PHP dev server doesn't have a way of handling a static folder seperately
    # so just symlink these where the app expects them.
    ln -s /srv/public/assets /srv/assets
    ln -s /srv/public/fonts /srv/fonts
    ln -s /srv/public/vendor /srv/vendor
    ln -s /srv/public/images /srv/images
    ln -s /srv/public/vendor/nova /srv/vendor/nova
    ln -s /srv/public/categories /srv/categories
    php -S 0.0.0.0:3000 /srv/server.php
fi
