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
    'array' => 'அந்த :attribute ஒரு வரிசையாக இருக்க வேண்டும்.',
    'confirmed' => 'அந்த :attribute உறுதிப்படுத்தல் பொருந்தவில்லை.',
    'email' => 'அந்த :attribute சரியான மின்னஞ்சல் முகவரியாக இருக்க வேண்டும்.',
    'integer' => 'அந்த :attribute ஒரு முழு எண்ணாக இருக்க வேண்டும்.',
    'max' => [
        'string' => 'அந்த :attribute :max எழுத்துக்கள் விட அதிகமாக இருக்காது.',
    ],
    'min' => [
        // 'numeric' => 'The :attribute may not be greater than :max.',
        // 'file' => 'The :attribute may not be greater than :max kilobytes.',
        // 'array' => 'The :attribute may not have more than :max items.',
        'string' => 'அந்த :attribute குறைந்தபட்சம் :min எழுத்துக்கள் இருக்க வேண்டும்.',
        'numeric' => 'அந்த :attribute குறைந்தபட்சம் :min இருக்க வேண்டும்.',
    ],
    // 'file' => 'The :attribute must be at least :min kilobytes.',
    // 'array' => 'The :attribute must have at least :min items.',
    'regex' => 'அந்த :attribute வடிவம் தவறானது.',
    'required' => 'அந்த :attribute புலம் தேவை.',
    'string' => 'அந்த :attribute ஒரு சரமாக இருக்க வேண்டும்.',
    'unique' => 'அந்த :attribute ஏற்கனவே எடுக்கப்பட்டுள்ளது.',
];
