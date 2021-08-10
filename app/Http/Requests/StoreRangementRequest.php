<?php

namespace App\Http\Requests;

use App\Models\Rangement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRangementRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('rangement_create');
    }

    public function rules()
    {
        return [
            'nom_rangement' => [
                'string',
                'required',
                'unique:rangements',
            ],
        ];
    }
}
