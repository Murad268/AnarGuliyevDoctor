<?php

namespace App\Nova;

use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Kongulov\NovaTabTranslatable\NovaTabTranslatable;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Mostafaznv\NovaCkEditor\CkEditor;
use Outl1ne\NovaSortable\Traits\HasSortableRows;

class Service extends Resource
{
    use HasSortableRows;
    public static $model = \App\Models\Service::class;

    public static $title = 'title';

    public static $search = [
        'id', 'title', 'meta_keywords', 'meta_description'
    ];

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),



            NovaTabTranslatable::make([
                Text::make('Title', 'title')->rules('required', 'max:255'),
                CkEditor::make('Text', 'text')->rules('nullable'),
                Textarea::make('Meta Keywords', 'meta_keywords')->rules('nullable'),
                Textarea::make('Meta Description', 'meta_description')->rules('nullable'),
            ]),

            Image::make('Image', 'image')->rules('nullable', 'image'),
            Boolean::make('Status', 'status')
                ->trueValue(1)
                ->falseValue(0)
                ->sortable(),
        ];
    }
}
