<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class Email extends Resource
{
    public static $model = \App\Models\Email::class;

    public static $title = 'email';

    public static $search = [
        'id', 'email'
    ];

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Email', 'email')
                ->rules('required', 'email', 'max:255')
                ->creationRules('unique:emails,email')
                ->updateRules('unique:emails,email,{{resourceId}}'),
        ];
    }
}
