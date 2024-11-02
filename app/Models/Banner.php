<?php


namespace App\Models;

use App\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory, ImageTrait;

    protected $fillable = [
        'about_banner',
        'portfolio_banner',
        'services_banner',
        'blogs_banner',
        'contact_banner'
    ];
}
