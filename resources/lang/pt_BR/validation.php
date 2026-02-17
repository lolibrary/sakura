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
    'array' => 'O :attribute precisa ser uma matriz',
    'confirmed' => '',
    'email' => 'O :attribute deve ser um email válido.',
    'integer' => 'O :attribute deve ser um número inteiro.',
    'max' => [
        'string' => 'O :attribute não deve ter mais que :max caracteres.',
    ],
    'min' => [
        // 'numeric' => 'The :attribute may not be greater than :max.',
        // 'file' => 'The :attribute may not be greater than :max kilobytes.',
        // 'array' => 'The :attribute may not have more than :max items.',
        'string' => 'O :attribute deve ter pelo menos :min caracteres.',
        'numeric' => 'O :attribute deve ter pelo menos :min.',
    ],
    // 'file' => 'The :attribute must be at least :min kilobytes.',
    // 'array' => 'The :attribute must have at least :min items.',
    'regex' => 'O formato de :attribute é inválido.',
    'required' => 'O campo :attribute é obrigatório.',
    'string' => 'O :attribute deve ser um string.',
    'unique' => 'O :attribute já foi utilizado.',
];
