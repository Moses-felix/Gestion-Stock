<?php

namespace App\Http\Requests;

use App\Models\Tva;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTvaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tva_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tvas,id',
        ];
    }
}
