<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreTaskRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|min:3',
            'value' => 'sometimes',
            'body' => 'sometimes'
        ];
    }
}
