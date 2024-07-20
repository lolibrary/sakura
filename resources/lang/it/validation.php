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
    'confirmed' => 'La conferma di :attribute non corrisponde.',
    'email' => ':attribute deve essere un indirizzo email valido.',
    'max' => [
        'string' => ':attribute non può essere maggiore di :max caratteri.',
    ],
    'min' => [
        // 'numeric' => 'The :attribute may not be greater than :max.',
        // 'file' => 'The :attribute may not be greater than :max kilobytes.',
        // 'array' => 'The :attribute may not have more than :max items.',
        'string' => ':attribute deve avere almeno :min caratteri.',
        'numeric' => ':attribute deve essere almeno :min.',
    ],
    // 'numeric' => 'The :attribute must be at least :min.',
    // 'file' => 'The :attribute must be at least :min kilobytes.',
    // 'array' => 'The :attribute must have at least :min items.',
    'regex' => 'Il formato di :attribute non è valido.',
    'required' => 'Il campo :attribute è richiesto.',
    'string' => ':attribute deve essere una stringa.',
    'unique' => ':attribute è già stato preso.',
    'integer' => ':attribute deve essere un numero intero.',
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
    'array' => 'L\':attribute deve essere un array.',
];
