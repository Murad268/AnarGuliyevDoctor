<?php

namespace App\Nova\Resources;

use App\Nova\Resource;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Text;
use Mostafaznv\NovaCkEditor\ImageUpload;
use App\Models\Image as ImageModel;

class Image extends Resource
{
    public static string $model = ImageModel::class;
    public static function availableForNavigation(Request $request)
    {
        return false; // Menyuda görünməsin
    }
    public static $search = ['name'];
    public static $title = 'name';


    public function fields(Request $request): array
    {
        return [
            Text::make(trans('Name'), 'name')
                ->help(trans('The file name that should be searched'))
                ->sortable(),

            ImageUpload::make(trans('File'), 'image')
                ->rules('required', 'mimes:jpg,jpeg,png,gif,webp', 'max:5000')
                ->help(trans(':size Megabyte Max FileSize.', ['size' => 5])),

            Text::make(trans('Filename'), 'file_name')
                ->onlyOnDetail()
                ->sortable(),

            Text::make(trans('Mime'), 'mime')
                ->onlyOnDetail()
                ->sortable(),

            Text::make(trans('Size'), 'size')
                ->exceptOnForms()
                ->sortable(),

            Text::make(trans('Width'), 'width')
                ->exceptOnForms()
                ->sortable(),

            Text::make(trans('Height'), 'height')
                ->exceptOnForms()
                ->sortable(),

            DateTime::make(trans('Created At'), 'created_at')
                ->readonly(),

            DateTime::make(trans('Updated At'), 'updated_at')
                ->readonly()
        ];
    }

    public function subtitle(): ?string
    {
        return $this->resource->mime ?? '-';
    }

    public static function singularLabel(): string
    {
        return trans('Image');
    }

    public static function label(): string
    {
        return trans('Images');
    }

    public static function group(): string
    {
        return trans('Media');
    }
}
