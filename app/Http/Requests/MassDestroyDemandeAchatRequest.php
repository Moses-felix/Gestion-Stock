<?php

namespace App\Http\Requests;

use App\Models\DemandeAchat;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDemandeAchatRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('demande_achat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:demande_achats,id',
        ];
    }
}
