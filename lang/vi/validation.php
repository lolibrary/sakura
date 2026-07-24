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
    'confirmed' => ':attribute không khớp xác nhận.',
    'email' => ':attribute phải là một địa chỉ email hợp lệ.',
    'max' => [
        'string' => ':attribute không được nhiều hơn :max ký tự.',
    ],
    'min' => [
        // 'numeric' => 'The :attribute may not be greater than :max.',
        // 'file' => 'The :attribute may not be greater than :max kilobytes.',
        // 'array' => 'The :attribute may not have more than :max items.',
        'string' => ':attribute phải có ít nhất :min ký tự.',
    ],
    // 'numeric' => 'The :attribute must be at least :min.',
    // 'file' => 'The :attribute must be at least :min kilobytes.',
    // 'array' => 'The :attribute must have at least :min items.',
    'regex' => 'Định dạng :attribute không hợp lệ.',
    'required' => 'Bắt buộc phải có :attribute.',
    'string' => ':attribute phải là một chuỗi ký tự.',
    'unique' => ':attribute đã được sử dụng.',
];
