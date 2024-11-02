<?php

namespace App\Nova;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Kongulov\NovaTabTranslatable\NovaTabTranslatable;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Boolean;
use Mostafaznv\NovaCkEditor\CkEditor;

class Blog extends Resource
{
    public static $model = \App\Models\Blog::class;

    public static $title = 'title';

    public static $search = [
        'id', 'title', 'seo_title', 'tags'
    ];

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            Image::make('Image File', 'imagefile'),
            Select::make('Blog Category', 'blog_category_id')
                ->options(BlogCategory::all()->pluck('title', 'id'))
                ->displayUsingLabels()
                ->rules('required'),

            NovaTabTranslatable::make([
                Text::make('Title', 'title')->rules('required', 'max:255'),
                Text::make('SEO Title', 'seo_title')->rules('nullable', 'max:255'),
                Textarea::make('Meta Keywords', 'meta_keywords')->rules('nullable'),
                Textarea::make('Meta Description', 'meta_description')->rules('nullable'),
                CkEditor::make('Text', 'text')->rules('nullable'),
                Textarea::make('Tags', 'tags')->rules('nullable'),
            ]),

            Date::make('Date', 'date')->rules('nullable', 'date'),
            Boolean::make('Status', 'status')
                ->trueValue(true)
                ->falseValue(false)
                ->default(true)
                ->sortable()

        ];
    }
}
