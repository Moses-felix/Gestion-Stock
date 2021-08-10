<?php

namespace App\Http\Requests;

use App\Models\ValidationAchat;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreValidationAchatRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('validation_achat_create');
    }

    public function rules()
    {
        return [
            'demande_achat_id' => [
                'required',
                'integer',
            ],
            'commentaire' => [
                'string',
                'nullable',
            ],
            'statut' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
