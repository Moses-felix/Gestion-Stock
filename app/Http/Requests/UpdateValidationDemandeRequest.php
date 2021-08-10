<?php

namespace App\Http\Requests;

use App\Models\ValidationDemande;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateValidationDemandeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('validation_demande_edit');
    }

    public function rules()
    {
        return [
            'demande_id' => [
                'required',
                'integer',
            ],
            'status' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
