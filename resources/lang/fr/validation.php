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
    'confirmed' => 'La confirmation de :attribute ne correspond pas.',
    'email' => 'Le :attribute doit-être une adresse email valide.',
    'max' => [
        'string' => 'Le :attribute ne doit pas dépasser :max caractères.',
    ],
    'min' => [
        // 'numeric' => 'The :attribute may not be greater than :max.',
        // 'file' => 'The :attribute may not be greater than :max kilobytes.',
        // 'array' => 'The :attribute may not have more than :max items.',
        'string' => 'Le :attribute doit au moins contenir :min caractères.',
    ],
    // 'numeric' => 'The :attribute must be at least :min.',
    // 'file' => 'The :attribute must be at least :min kilobytes.',
    // 'array' => 'The :attribute must have at least :min items.',
    'regex' => 'Le format de :attribute est invalide.',
    'required' => 'Le champ :attribute est obligatoire.',
    'string' => 'Le :attribute doit être une chaîne.',
    'unique' => 'Le :attribute a déjà été pris.',
];
