<?php

namespace App\Http\Requests;

use App\Models\Demande;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDemandeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('demande_edit');
    }

    public function rules()
    {
        return [
            // 'users_id' => [
            //     'required',
            //     'integer',
            // ],
            'objet_demande' => [
                'string',
                'nullable',
            ],
        ];
    }
}
