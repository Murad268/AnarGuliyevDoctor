<?php


namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;

class Banner extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Banner::class;

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
            Image::make('About Banner', 'about_banner'),
            Image::make('Portfolio Banner', 'portfolio_banner'),
            Image::make('Services Banner', 'services_banner'),
            Image::make('Blogs Banner', 'blogs_banner'),
            Image::make('Contact Banner', 'contact_banner'),
        ];
    }
}
