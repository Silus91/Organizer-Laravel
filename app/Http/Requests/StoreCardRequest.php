<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreCardRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|min:3',
        ];
    }
}
