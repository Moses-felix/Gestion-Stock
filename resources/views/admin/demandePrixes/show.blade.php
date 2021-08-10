@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.demandePrix.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.demande-prixes.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.demandePrix.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $demandePrix->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.demandePrix.fields.demande_achat') }}
                                    </th>
                                    <td>
                                        {{ $demandePrix->demande_achat->objet ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.demandePrix.fields.users') }}
                                    </th>
                                    <td>
                                        {{ $demandePrix->users->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.demandePrix.fields.company') }}
                                    </th>
                                    <td>
                                        {{ $demandePrix->company->company_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.demandePrix.fields.created_at') }}
                                    </th>
                                    <td>
                                        {{ $demandePrix->created_at }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.demandePrix.fields.updated_at') }}
                                    </th>
                                    <td>
                                        {{ $demandePrix->updated_at }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.demandePrix.fields.deleted_at') }}
                                    </th>
                                    <td>
                                        {{ $demandePrix->deleted_at }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.demande-prixes.index') }}">
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