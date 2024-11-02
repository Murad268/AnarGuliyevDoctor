<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Illuminate\Http\Request;

class ContactForm extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\ContactForm::class;

    /**
     * The fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Username')->sortable(),
            Text::make('Email')->sortable(),
            Text::make('Phone')->sortable(),
            Text::make('Subject')->sortable(),
            Textarea::make('Message')->sortable(),
        ];
    }
}
