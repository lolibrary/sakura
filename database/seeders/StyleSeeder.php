<?php

namespace Database\Seeders;

use App\Models\Style;

class StyleSeeder extends Seeder
{
    /**
     * A model to use for seeding.
     */
    protected static string $model = Style::class;

    /**
     * A list of lolita styles to seed.
     *
     * @var array<string>
     */
    protected static array $content = [
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
