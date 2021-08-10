@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.demandeAchat.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.demande-achats.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.demandeAchat.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $demandeAchat->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.demandeAchat.fields.users') }}
                                    </th>
                                    <td>
                                        {{ $demandeAchat->users->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.demandeAchat.fields.objet') }}
                                    </th>
                                    <td>
                                        {{ $demandeAchat->objet }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.demandeAchat.fields.urgence') }}
                                    </th>
                                    <td>
                                        {{ App\Models\DemandeAchat::URGENCE_RADIO[$demandeAchat->urgence] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.demandeAchat.fields.etat') }}
                                    </th>
                                    <td>
                                        {{ $demandeAchat->etat }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.demandeAchat.fields.created_at') }}
                                    </th>
                                    <td>
                                        {{ $demandeAchat->created_at }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.demandeAchat.fields.updated_at') }}
                                    </th>
                                    <td>
                                        {{ $demandeAchat->updated_at }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.demandeAchat.fields.deleted_at') }}
                                    </th>
                                    <td>
                                        {{ $demandeAchat->deleted_at }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.demande-achats.index') }}">
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