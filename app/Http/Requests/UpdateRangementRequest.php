<?php

namespace App\Http\Requests;

use App\Models\Rangement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRangementRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('rangement_edit');
    }

    public function rules()
    {
        return [
            'nom_rangement' => [
                'string',
                'required',
                'unique:rangements,nom_rangement,' . request()->route('rangement')->id,
            ],
        ];
    }
}
