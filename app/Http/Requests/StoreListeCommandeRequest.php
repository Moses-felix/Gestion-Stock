<?php

namespace App\Http\Requests;

use App\Models\ListeCommande;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreListeCommandeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('liste_commande_create');
    }

    public function rules()
    {
        return [
            'commande_id' => [
                'required',
                'integer',
            ],
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
            'prix_unitaire' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
