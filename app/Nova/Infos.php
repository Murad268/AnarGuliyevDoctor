<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Kongulov\NovaTabTranslatable\NovaTabTranslatable;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;

class Infos extends Resource
{
    public static $model = \App\Models\Infos::class;

    public static $title = 'id';

    public static $search = [
        'id'
    ];

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Image::make('Logo', 'logo')->nullable(),
            Image::make('Header Logo', 'header_logo')->nullable(),
            Image::make('Footer Logo', 'footer_logo')->nullable(),

            NovaTabTranslatable::make([
                Textarea::make('Address', 'address')->rules('nullable'),
                Text::make('Weekday Working Hours', 'work_hours_weekday')->rules('nullable'),
                Text::make('Saturday Working Hours', 'work_hours_saturday')->rules('nullable'),
                Text::make('Sunday Working Hours', 'work_hours_sunday')->rules('nullable'),
            ]),

            Textarea::make('Iframe', 'iframe')->rules('nullable'),

            Text::make('Contact Video', 'contact_video')->rules('nullable', 'max:255'), // Sadə input olaraq əlavə edildi

            Text::make('Facebook', 'facebook')->rules('nullable', 'url'),
            Text::make('Instagram', 'instagram')->rules('nullable', 'url'),
            Text::make('Tiktok', 'tiktok')->rules('nullable', 'url'),
            Text::make('Twitter', 'twitter')->rules('nullable', 'url'),
            Text::make('LinkedIn', 'linkedin')->rules('nullable', 'url'),
            Text::make('Youtube', 'youtube')->rules('nullable', 'url'),
            Text::make('Home Page Video', 'home_page_video')
                ->nullable(),
            Image::make('Home Page Video Thumbnail', 'home_page_video_thumbnail')->nullable()

        ];
    }
}
