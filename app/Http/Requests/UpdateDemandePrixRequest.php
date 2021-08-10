<?php

namespace App\Http\Requests;

use App\Models\DemandePrix;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDemandePrixRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('demande_prix_edit');
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
