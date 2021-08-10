<?php

namespace App\Http\Requests;

use App\Models\DemandePrix;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDemandePrixRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('demande_prix_create');
    }

    public function rules()
    {
        return [
            'company_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
