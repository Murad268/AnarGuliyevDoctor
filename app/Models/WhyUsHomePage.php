<?php

namespace App\Models;

use App\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class WhyUsHomePage extends Model
{
    use HasFactory, HasTranslations, ImageTrait;

    protected $fillable = ['image', 'image_subbox_text_top', 'image_subbox_text_bottom', 'title', 'text'];

    public $translatable = ['image_subbox_text_top', 'image_subbox_text_bottom', 'title', 'text'];
}
