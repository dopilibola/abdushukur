<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Writes database/data/products.php to the products table. Product data and
     * photos (public/images/products) live in git, so a fresh server only needs
     * `php artisan migrate --seed` to get the whole store back.
     *
     * Run: php artisan db:seed --class=ProductSeeder (safe to re-run).
     */
    public function run(): void
    {
        $category = Category::firstOrCreate(
            ['name_uz' => 'Tabiiy dorilar'],
            ['name_ru' => 'Натуральные средства', 'name_en' => 'Natural remedies']
        );

        foreach (require database_path('data/products.php') as $data) {
            $slug = $data['slug'];
            $carousel = $data['carousel'] ?? false;
            unset($data['slug'], $data['carousel']);

            Product::updateOrCreate(
                ['id' => $data['id']],
                $data + [
                    'category_id' => $category->id,
                    'country_uz' => "O'zbekiston",
                    'country_ru' => 'Узбекистан',
                    'country_en' => 'Uzbekistan',
                    'image1' => $this->image("{$slug}-1.jpg"),
                    'image2' => $this->image("{$slug}-2.jpg"),
                    'image3' => $this->image("{$slug}-3.jpg"),
                    'banner' => $carousel ? $this->image("{$slug}-banner.jpg") : null,
                    'count' => 100,
                ]
            );
        }
    }

    // Path under public/ for a product photo, or null if the file is absent.
    private function image(string $file): ?string
    {
        $path = "images/products/{$file}";

        return is_file(public_path($path)) ? $path : null;
    }
}
