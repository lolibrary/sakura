<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use YesWeDev\Nova\Translatable\Translatable;

class Feature extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Feature::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'slug',
    ];

    /**
     * Overrides to make search/filter work with translations.
     */
    protected static function applySearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $model = $query->getModel();

            foreach (static::searchableColumns() as $column) {
                $query->orWhere($model->qualifyColumn($column), 'ilike', '%'.$search.'%');
            }
            $query->orWhereTranslationLike('name', '%'.$search.'%');
        });
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query->orderByTranslation('name');
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->onlyOnDetail(),

            Text::make('Slug')
                ->sortable()
                ->creationRules('required', 'string', 'regex:/[a-z0-9][a-z0-9\-]{1,50}/u', 'unique:features,slug')
                ->updateRules('required', 'string', 'regex:/[a-z0-9][a-z0-9\-]{1,50}/u', 'unique:features,slug,{{resourceId}}')
                ->hideFromIndex(),

            Translatable::make('Name')
                ->indexLocale('en')
                ->sortable()
                ->rules('required', 'min:2', 'max:255'),

            DateTime::make('Created', 'created_at')->onlyOnDetail(),
            DateTime::make('Updated', 'updated_at')->onlyOnDetail(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
