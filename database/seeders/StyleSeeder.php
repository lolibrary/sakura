<?php

namespace Database\Seeders;

use App\Models\Style;

class StyleSeeder extends Seeder
{
    /**
     * A model to use for seeding.
     *
     * @var string
     */
    protected static $model = Style::class;

    /**
     * A list of lolita styles to seed.
     *
     * @var string[]
     */
    protected static $content = [
        'Gothic',
        'Sweet',
        'Classic',
        'Casual',
        'Hime',
        'Shiro',
        'Kuro',
        'Country',
        'Sailor',
        'Guro',
        'Punk',
        'Ero',
        'Pirate',
        'Steampunk',
        'Fairy',
        'Deco',
        'Mori',
        'Kodona',
        'Aristocrat',
    ];
}
