<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Kongulov\NovaTabTranslatable\NovaTabTranslatable;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Image;
use Outl1ne\NovaSortable\Traits\HasSortableRows;

class VideoGallery extends Resource
{
    use HasSortableRows;
    public static $model = \App\Models\VideoGallery::class;

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

            Text::make('Video', 'video'),
            Image::make('Video image', 'video_image'),
            Boolean::make('Status', 'status')
                ->trueValue(true)
                ->falseValue(false)
                ->default(true)
                ->sortable()
        ];
    }
}
