<?php

namespace App\Composers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use Illuminate\View\View;

abstract class Composer
{
    /**
     * How long this key should be cached for.
     *
     * @var int
     */
    protected const int DURATION = 1440;

    /**
     * Bind data into the view.
     */
    public function compose(View $view): void
    {
        $view->with($this->name(), $this->data());
    }

    /**
     * Get a list of models from this composer.
     *
     * @return array<string, string>
     */
    protected function data(): array
    {
        $default = function () {
            return $this->load();
        };

        try {
            return cache()->remember($this->key(), static::DURATION, $default);
        } catch (Throwable $e) {
            sentry($e);

            return $default();
        }
    }

    /**
     * Get the cache key for this composer.
     */
    protected function key(): string
    {
        $locale = App::getLocale();

        return 'composer:'.$locale.':'.$this->name();
    }

    /**
     * The name of this class.
     */
    protected function name(): string
    {
        return Str::snake(class_basename(static::class));
    }

    /**
     * Get models loaded from the database.
     *
     * @return array<string, string>
     */
    abstract protected function load(): array;
}
