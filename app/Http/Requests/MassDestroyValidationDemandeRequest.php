<?php

namespace App\Http\Requests;

use App\Models\ValidationDemande;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyValidationDemandeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('validation_demande_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:validation_demandes,id',
        ];
    }
}
