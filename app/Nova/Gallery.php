<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Kongulov\NovaTabTranslatable\NovaTabTranslatable;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Textarea;
use Outl1ne\NovaSortable\Traits\HasSortableRows;

class Gallery extends Resource
{
    use HasSortableRows;
    public static $model = \App\Models\Gallery::class;

    public static $title = 'id';

    public static $search = [
        'id', 'text'
    ];

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            NovaTabTranslatable::make([
                Textarea::make('Text', 'text')->rules('nullable'),
            ]),

            Image::make('Image', 'image')->rules('nullable', 'image', 'max:1024'),

            Boolean::make('See on Home Page', 'see_on_home_page')
                ->sortable()
                ->default(true)
                ->trueValue(true)
                ->falseValue(false)
        ];
    }
}
