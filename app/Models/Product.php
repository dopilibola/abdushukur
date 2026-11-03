<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =
    [
        'category_id',
        'name_uz',
        'name_ru',
        'name_en',
        'description_uz',
        'description_ru',
        'description_en',
        'country_uz',
        'country_ru',
        'country_en',
        'file',
        'count',
        'price',
        'image1',
        'image2',
        'image3',
        'banner',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Seeded photos are stored as "images/products/..." under public/; admin uploads go to the public disk.
    public static function imageUrl(?string $path): ?string
    {
        if (! $path) {
            return null;
        }

        return str_starts_with($path, 'images/') ? asset($path) : asset('storage/' . $path);
    }

    public function getImageUrlAttribute(): string
    {
        return self::imageUrl($this->image1 ?? $this->image2 ?? $this->image3) ?? asset('images/product_01.png');
    }

    public function getGalleryAttribute(): array
    {
        return array_values(array_filter(array_map(
            fn ($path) => self::imageUrl($path),
            [$this->image1, $this->image2, $this->image3]
        )));
    }

    public function getBannerUrlAttribute(): ?string
    {
        return self::imageUrl($this->banner);
    }

    public function items()
    {
        return $this->hasMany(CartItem::class);
    }
}
