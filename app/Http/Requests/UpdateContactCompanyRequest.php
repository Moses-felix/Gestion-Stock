<?php

namespace App\Http\Requests;

use App\Models\ContactCompany;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateContactCompanyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('contact_company_edit');
    }

    public function rules()
    {
        return [
            'company_name' => [
                'string',
                'required',
                'unique:contact_companies,company_name,' . request()->route('contact_company')->id,
            ],
            'name' => [
                'string',
                'required',
            ],
            'prenom' => [
                'string',
                'required',
            ],
            'telephone' => [
                'required',
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'company_address' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
                'unique:contact_companies,email,' . request()->route('contact_company')->id,
            ],
            'company_website' => [
                'string',
                'nullable',
            ],
        ];
    }
}
