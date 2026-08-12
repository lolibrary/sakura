<?php

namespace App\Helpers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Validation\Rules\Email;
use Illuminate\Validation\Rules\NotIn;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rules\StringRule;

class DefaultRule
{
    public static function username(): StringRule
    {
        return Rule::string()
            ->min(3)
            ->max(40)
            ->alphaDash()
            ->lowercase()
            ->doesntStartWith('-', '_')
            ->doesntEndWith('-', '_');
    }

    public static function restricted(): NotIn
    {
        return Rule::notIn([
            'admin',
            'administrator',
            'lolibrary',
            'official',
            'senior',
            'lolibrarian',
            'system',
            'user',
            'developer',
            'dev',
        ]);
    }

    public static function email(): Email
    {
        return Rule::email()->rules(['encoding:utf-8', 'max:255']);
    }

    public static function password(): Password
    {
        return Password::default();
    }
}
