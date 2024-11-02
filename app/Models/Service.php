<?php

namespace App\Models;

use App\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasFactory, HasTranslations, SortableTrait, ImageTrait;
    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];
    protected $guarded = [];

    public $translatable = ['title', 'text', 'meta_keywords', 'meta_description', 'slug'];

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }


    protected static function boot()
    {
        parent::boot();

        static::saving(function ($service) {
            $locales = Lang::pluck('code') ?? ['az', 'ru'];

            foreach ($locales as $locale) {
                $currentTitle = $service->getTranslation('title', $locale);
                $originalTitle = $service->getOriginal('title->' . $locale);

                // Title dəyişibsə slug yenilənir
                if ($currentTitle !== $originalTitle) {
                    $slug = Str::slug($currentTitle);

                    // Mövcud slug-ları yoxlayır (öz modelini istisna edir)
                    $existingSlugCount = self::where('slug->' . $locale, $slug)
                        ->where('id', '!=', $service->id)
                        ->count();

                    // Əgər slug varsa, unikallıq üçün təsadüfi rəqəm əlavə edilir
                    if ($existingSlugCount > 0) {
                        $randomNumber = rand(1000, 9999);
                        $slug = $randomNumber . '-' . $slug;
                    }

                    $service->setTranslation('slug', $locale, $slug);
                }
            }
        });
    }

}
