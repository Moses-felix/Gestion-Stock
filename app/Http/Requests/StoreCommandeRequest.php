<?php

namespace App\Http\Requests;

use App\Models\Commande;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCommandeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('commande_create');
    }

    public function rules()
    {
        return [
            'company_id' => [
                'required',
                'integer',
            ],
            'quantite' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'prix' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'delai_livraison' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
