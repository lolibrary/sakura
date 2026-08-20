<?php

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Relative orders for brands, if they exist.
     * Roughly preserves the homepage order.
     *
     * @var array<string, int>
     */
    protected array $brands = [
        'angelic-pretty' => 2000,
        'baby-the-stars-shine-bright' => 1900,
        'innocent-world' => 1800,
        'metamorphose-temps-de-fille' => 1700,
        'moi-meme-moitie' => 1600,
        'alice-and-the-pirates' => 1500,
        'victorian-maiden' => 1400,
        'atelier-boz' => 1300,
        'mary-magdalene' => 1200,
        'juliet-et-justine' => 1100,
        'putumayo' => 1000,
    ];

    /**
     * Relative orders for categories, if they exist.
     * Roughly preserves the homepage order.
     *
     * @var array<string, int>
     */
    protected array $categories = [
        'jsk' => 2000,
        'op' => 1900,
        'skirt' => 1800,
        'blouse' => 1700,
        'hair-accessories' => 1600,
        'bolero' => 1500,
        'cardigan' => 1400,
        'sets' => 1300,
        'coats' => 1200,
    ];

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('brands', function (Blueprint $table) {
            $table->smallInteger('order')->default(0);
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->smallInteger('order')->default(0);
        });

        $this->order();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('brands', function (Blueprint $table) {
            $table->dropColumn('order');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('order');
        });
    }

    protected function order(): void
    {
        $categories = Category::whereIn('slug', array_keys($this->categories))->get();

        foreach ($categories as $category) {
            $category->update(['order' => $this->categories[$category->slug] ?? 0]);
        }

        $brands = Brand::whereIn('slug', array_keys($this->brands))->get();

        foreach ($brands as $brand) {
            $brand->update(['order' => $this->brands[$brand->slug] ?? 0]);
        }
    }
};
