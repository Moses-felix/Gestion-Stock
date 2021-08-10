<?php

namespace App\Http\Requests;

use App\Models\LigneDemande;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyLigneDemandeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('ligne_demande_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:ligne_demandes,id',
        ];
    }
}
