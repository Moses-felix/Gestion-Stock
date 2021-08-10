@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.validationAchat.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.validation-achats.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.validationAchat.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $validationAchat->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.validationAchat.fields.users') }}
                                    </th>
                                    <td>
                                        {{ $validationAchat->users->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.validationAchat.fields.demande_achat') }}
                                    </th>
                                    <td>
                                        {{ $validationAchat->demande_achat->objet ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.validationAchat.fields.commentaire') }}
                                    </th>
                                    <td>
                                        {{ $validationAchat->commentaire }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.validationAchat.fields.etat') }}
                                    </th>
                                    <td>
                                        {{ App\Models\ValidationAchat::ETAT_RADIO[$validationAchat->etat] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.validationAchat.fields.statut') }}
                                    </th>
                                    <td>
                                        {{ $validationAchat->statut }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.validation-achats.index') }}">
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