<?php

namespace App\Http\Requests;

use App\Models\Tva;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTvaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tva_create');
    }

    public function rules()
    {
        return [
            'tva' => [
                'numeric',
                'required',
            ],
        ];
    }
}
