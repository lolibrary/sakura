<?php

namespace App\Nova;

use App\Models\User as BaseUser;
use App\Nova\Metrics\NewUsers;
use App\Nova\Metrics\TotalUsers;
use App\Nova\Metrics\UserItemsPublished;
use App\Nova\Metrics\UserSubmissions;
use App\Nova\Metrics\UsersByRole;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Panel;

class User extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = BaseUser::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'username';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'name', 'username', 'email',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            Gravatar::make(),

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,email')
                ->updateRules('unique:users,email,{{resourceId}}')
                ->hideFromIndex()
                ->canSeeWhen('viewEmail', $this),

            Text::make('Username')
                ->sortable()
                ->rules('required', 'string', 'min:3', 'max:40', 'regex:/^[^-_][0-9a-z_-]+$/u')
                ->creationRules('unique:users,username')
                ->updateRules('unique:users,username,{{resourceId}}'),

            Password::make('Password')
                ->onlyOnForms()
                ->creationRules('required', 'string', 'min:8')
                ->updateRules('nullable', 'string', 'min:8'),

            new Panel('Authentication', [
                Select::make('Level')->options([
                    BaseUser::DEVELOPER => 'Developer',
                    BaseUser::ADMIN => 'Administrator',
                    BaseUser::SENIOR_LOLIBRARIAN => 'Senior Lolibrarian',
                    BaseUser::LOLIBRARIAN => 'Lolibrarian',
                    BaseUser::JUNIOR_LOLIBRARIAN => 'Junior Lolibrarian',
                    BaseUser::REGULAR => 'Regular User',
                ])->displayUsingLabels()->sortable(),

                Boolean::make('Banned')->canSeeWhen('update', $this),
            ]),

            HasMany::make('Items'),
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
        return [
            new NewUsers,
            new TotalUsers,
            new UsersByRole,
            UserSubmissions::make()
                ->onlyOnDetail()
                ->help("This is only a user's non-published works"),
            UserItemsPublished::make()
                ->onlyOnDetail()
                ->help('Self-published (if applicable) means the user was also the approver for this item (as a Lolibrarian or Senior Lolibrarian)"'),
        ];
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
