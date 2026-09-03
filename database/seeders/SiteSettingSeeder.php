<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = Json::decode(file_get_contents(storage_path('seeds/settings.json')));

        SiteSetting::upsert(
            collect($json)->map(static fn (mixed $value, string $key) => [
                'setting' => $key,
                'value' => json_encode($value),
            ])->all(),
            uniqueBy: ['setting'],
            update: ['value'],
        );
    }
}
