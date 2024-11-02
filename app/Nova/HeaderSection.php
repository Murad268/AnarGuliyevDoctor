<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Kongulov\NovaTabTranslatable\NovaTabTranslatable;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;

class HeaderSection extends Resource
{
    public static $model = \App\Models\HeaderSection::class;

    public static $title = 'id';

    public static $search = [
        'id', 'mini_title', 'title', 'subtitle'
    ];

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            NovaTabTranslatable::make([
                Text::make('Mini Title', 'mini_title')->rules('nullable', 'max:255'),
                Text::make('Title', 'title')->rules('nullable', 'max:255'),
                Text::make('Subtitle', 'subtitle')->rules('nullable', 'max:255'),
            ]),

            Image::make('Image', 'image')->rules('nullable', 'image', 'max:1024'),
        ];
    }
}
