<?php

    namespace App\Models;

    use App\Traits\ImageTrait;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Spatie\Translatable\HasTranslations;

    class Infos extends Model
    {
    use HasFactory, HasTranslations, ImageTrait;

    protected $fillable = [
'logo', 'header_logo', 'footer_logo', 'address', 'iframe',
'facebook', 'instagram', 'twitter', 'linkedin',
'work_hours_weekday', 'work_hours_saturday', 'work_hours_sunday'
];

public $translatable = ['address', 'work_hours_weekday', 'work_hours_saturday', 'work_hours_sunday'];
}
