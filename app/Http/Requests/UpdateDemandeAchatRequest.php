<?php

namespace App\Http\Requests;

use App\Models\DemandeAchat;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDemandeAchatRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('demande_achat_edit');
    }

    public function rules()
    {
        return [
            // 'users_id' => [
            //     'required',
            //     'integer',
            // ],
            'objet' => [
                'string',
                'required',
            ],
            'urgence' => [
                'required',
            ],
            'etat' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
