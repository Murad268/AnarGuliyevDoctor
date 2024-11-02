<?php

namespace App\Models;

use App\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Support\Str;
class Blog extends Model
{
    use HasFactory, HasTranslations, ImageTrait;
    protected $casts = [
        'date' => 'datetime',
    ];
    protected $guarded = [];

    public $translatable = ['title', 'seo_title', 'meta_keywords', 'meta_description', 'text', 'tags', 'slug'];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($blog) {
            $locales = Lang::pluck('code') ?? ['az', 'ru'];

            foreach ($locales as $locale) {
                $currentTitle = $blog->getTranslation('title', $locale);
                $originalTitle = $blog->getOriginal('title->' . $locale);

                // Title dəyişibsə slug yenilənir
                if ($currentTitle !== $originalTitle) {
                    $slug = Str::slug($currentTitle);

                    // Mövcud slug-ları yoxlayır (öz modelini istisna edir)
                    $existingSlugCount = self::where('slug->' . $locale, $slug)
                        ->where('id', '!=', $blog->id)
                        ->count();

                    // Əgər slug varsa, unikallıq üçün təsadüfi rəqəm əlavə edilir
                    if ($existingSlugCount > 0) {
                        $randomNumber = rand(1000, 9999);
                        $slug = $randomNumber . '-' . $slug;
                    }

                    $blog->setTranslation('slug', $locale, $slug);
                }
            }
        });
    }

}
