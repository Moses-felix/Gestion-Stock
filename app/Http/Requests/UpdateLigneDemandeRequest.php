<?php

namespace App\Http\Requests;

use App\Models\LigneDemande;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLigneDemandeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('ligne_demande_edit');
    }

    public function rules()
    {
        return [
            'product_id' => [
                'required',
                'integer',
            ],
            'quantite' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
