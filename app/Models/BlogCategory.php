<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

class BlogCategory extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['title', 'slug'];

    public $translatable = ['title', 'slug'];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($cat) {
            $locales = Lang::pluck('code') ?? ['az', 'ru'];

            foreach ($locales as $locale) {
                $currentTitle = $cat->getTranslation('title', $locale);
                $originalTitle = $cat->getOriginal('title->' . $locale);

                // Title dəyişibsə slug yenilənir
                if ($currentTitle !== $originalTitle) {
                    $slug = Str::slug($currentTitle);

                    // Mövcud slug-ları yoxlayır (öz modelini istisna edir)
                    $existingSlugCount = self::where('slug->' . $locale, $slug)
                        ->where('id', '!=', $cat->id)
                        ->count();

                    // Əgər slug varsa, unikallıq üçün təsadüfi rəqəm əlavə edilir
                    if ($existingSlugCount > 0) {
                        $randomNumber = rand(1000, 9999);
                        $slug = $randomNumber . '-' . $slug;
                    }

                    $cat->setTranslation('slug', $locale, $slug);
                }
            }
        });
    }

}
