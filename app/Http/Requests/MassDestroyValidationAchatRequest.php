<?php

namespace App\Http\Requests;

use App\Models\ValidationAchat;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyValidationAchatRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('validation_achat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:validation_achats,id',
        ];
    }
}
