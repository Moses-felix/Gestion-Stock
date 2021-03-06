@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.contactCompany.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.contact-companies.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contactCompany.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $contactCompany->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contactCompany.fields.company_name') }}
                                    </th>
                                    <td>
                                        {{ $contactCompany->company_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contactCompany.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $contactCompany->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contactCompany.fields.prenom') }}
                                    </th>
                                    <td>
                                        {{ $contactCompany->prenom }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contactCompany.fields.telephone') }}
                                    </th>
                                    <td>
                                        {{ $contactCompany->telephone }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contactCompany.fields.company_address') }}
                                    </th>
                                    <td>
                                        {{ $contactCompany->company_address }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contactCompany.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $contactCompany->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contactCompany.fields.company_website') }}
                                    </th>
                                    <td>
                                        {{ $contactCompany->company_website }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.contact-companies.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection