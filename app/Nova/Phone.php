<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class Phone extends Resource
{
    public static $model = \App\Models\Phone::class;

    public static $title = 'phone';

    public static $search = [
        'id', 'phone'
    ];

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Phone', 'phone')
                ->rules('required', 'max:255')
                ->creationRules('unique:phones,phone')
                ->updateRules('unique:phones,phone,{{resourceId}}'),
        ];
    }
}
