<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Outl1ne\NovaSortable\Traits\HasSortableRows;

class Testimonial extends Resource
{
    use HasSortableRows;
    public static $model = \App\Models\Testimonial::class;

    public static $title = 'full_name';

    public static $search = [
        'id', 'full_name', 'text'
    ];

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Image::make('Image', 'image')
                ->default('testimonials/default.png')
                ->rules('nullable', 'image', 'max:1024'),

            Text::make('Full Name', 'full_name')->rules('required', 'max:255'),

            Textarea::make('Text', 'text')->rules('required'),
        ];
    }
}
