<?php

namespace App\Models;

use App\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AboutWhyUs extends Model
{
    use HasFactory, HasTranslations, ImageTrait;
    protected $guarded = [];

    // Specify translatable fields
    public $translatable = ['title', 'text'];
}
