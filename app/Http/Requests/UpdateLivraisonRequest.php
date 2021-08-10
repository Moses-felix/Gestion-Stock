<?php

namespace App\Http\Requests;

use App\Models\Livraison;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLivraisonRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('livraison_edit');
    }

    public function rules()
    {
        return [
            'commande_id' => [
                'required',
                'integer',
            ],
            'statut' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'product_category_id' => [
                'required',
                'integer',
            ],
            'rangement_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
