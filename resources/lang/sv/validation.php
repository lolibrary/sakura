<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */
    'confirmed' => 'Bekräftelsen för :attribute stämmer inte överens.',
    'email' => ':attribute måste vara en giltig epostadress.',
    'max' => [
        'string' => ':attribute får inte vara längre än :max karaktärer.',
    ],
    'min' => [
        // 'numeric' => 'The :attribute may not be greater than :max.',
        // 'file' => 'The :attribute may not be greater than :max kilobytes.',
        // 'array' => 'The :attribute may not have more than :max items.',
        'string' => ':attribute måste innehålla minst :min karaktärer.',
    ],
    // 'numeric' => 'The :attribute must be at least :min.',
    // 'file' => 'The :attribute must be at least :min kilobytes.',
    // 'array' => 'The :attribute must have at least :min items.',
    'regex' => 'Formatet på :attribute är ogiltigt.',
    'required' => 'Fältet för :attribute är obligatoriskt.',
    'string' => ':attribute måste vara en sträng.',
    'unique' => ':attribute är redan registrerat.',
];
