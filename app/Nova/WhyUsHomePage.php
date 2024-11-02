<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Kongulov\NovaTabTranslatable\NovaTabTranslatable;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Mostafaznv\NovaCkEditor\CkEditor;

class WhyUsHomePage extends Resource
{
    public static $model = \App\Models\WhyUsHomePage::class;

    public static $title = 'id';

    public static $search = [
        'id', 'image_subbox_text_top', 'image_subbox_text_bottom', 'title'
    ];

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Image::make('Image', 'image')->rules('nullable', 'image', 'max:1024'),

            NovaTabTranslatable::make([
                Text::make('Image Subbox Text Top', 'image_subbox_text_top')->rules('nullable', 'max:255'),
                Text::make('Image Subbox Text Bottom', 'image_subbox_text_bottom')->rules('nullable', 'max:255'),
                Text::make('Title', 'title')->rules('nullable', 'max:255'),
                CkEditor::make('Text', 'text')->rules('nullable'),
            ]),
        ];
    }
}
