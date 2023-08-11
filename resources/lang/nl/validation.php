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
    'confirmed' => 'De :attribute bevestiging komt niet overeen.',
    'email' => 'Het :attribute moet een geldig e-mailadres zijn.',
    'max' => [
        'string' => 'Het :attribute mag niet langer zijn dan :max tekens.',
    ],
    'min' => [
        // 'numeric' => 'The :attribute may not be greater than :max.',
        // 'file' => 'The :attribute may not be greater than :max kilobytes.',
        // 'array' => 'The :attribute may not have more than :max items.',
        'string' => 'Het :attribute moet minstens :min tekens bevatten.',
    ],
    // 'numeric' => 'The :attribute must be at least :min.',
    // 'file' => 'The :attribute must be at least :min kilobytes.',
    // 'array' => 'The :attribute must have at least :min items.',
    'regex' => 'De indeling van :attribute is ongeldig.',
    'required' => 'Het :attribute veld is verplicht.',
    'string' => 'Het :attribute moet een tekenreeks zijn.',
    'unique' => ':attribute is al in gebruik.',
];
