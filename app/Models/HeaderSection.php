<?php

namespace App\Models;

use App\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class HeaderSection extends Model
{
    use HasFactory, HasTranslations, ImageTrait;

    protected $fillable = ['mini_title', 'title', 'subtitle', 'image'];

    public $translatable = ['mini_title', 'title', 'subtitle'];
}
