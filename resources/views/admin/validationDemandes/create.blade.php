@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.validationDemande.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.validation-demandes.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('demande') ? 'has-error' : '' }}">
                            <label class="required" for="demande_id">{{ trans('cruds.validationDemande.fields.demande') }}</label>
                            <select class="form-control select2" name="demande_id" id="demande_id" required>
                                @foreach($demandes as $id => $entry)
                                    <option value="{{ $id }}" {{ old('demande_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('demande'))
                                <span class="help-block" role="alert">{{ $errors->first('demande') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.validationDemande.fields.demande_helper') }}</span>
                        </div>
                        {{-- <div class="form-group {{ $errors->has('users') ? 'has-error' : '' }}">
                            <label for="users_id">{{ trans('cruds.validationDemande.fields.users') }}</label>
                            <select class="form-control select2" name="users_id" id="users_id">
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ old('users_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('users'))
                                <span class="help-block" role="alert">{{ $errors->first('users') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.validationDemande.fields.users_helper') }}</span>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Article</th>
                                                <th>Quantité</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($demande->lignedemandes as $ligne )
                                                <tr>
                                                    <td>
                                                        {{ $ligne->product->name }}
                                                    </td>
                                                    <td>
                                                        {{ $ligne->quantite }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> --}}
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                            <label for="status">{{ trans('cruds.validationDemande.fields.status') }}</label>
                            <input class="form-control" type="number" name="status" id="status" value="{{ old('status', '') }}" step="1">
                            @if($errors->has('status'))
                                <span class="help-block" role="alert">{{ $errors->first('status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.validationDemande.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('etat') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="etat" value="0">
                                <input type="checkbox" name="etat" id="etat" value="1" {{ old('etat', 0) == 1 ? 'checked' : '' }}>
                                <label for="etat" style="font-weight: 400">{{ trans('cruds.validationDemande.fields.etat') }}</label>
                            </div>
                            @if($errors->has('etat'))
                                <span class="help-block" role="alert">{{ $errors->first('etat') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.validationDemande.fields.etat_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection