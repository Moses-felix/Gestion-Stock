@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.validationAchat.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.validation-achats.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('users') ? 'has-error' : '' }}">
                            <label for="users_id">{{ trans('cruds.validationAchat.fields.users') }}</label>
                            <select class="form-control select2" name="users_id" id="users_id">
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ old('users_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('users'))
                                <span class="help-block" role="alert">{{ $errors->first('users') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.validationAchat.fields.users_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('demande_achat') ? 'has-error' : '' }}">
                            <label class="required" for="demande_achat_id">{{ trans('cruds.validationAchat.fields.demande_achat') }}</label>
                            <select class="form-control select2" name="demande_achat_id" id="demande_achat_id" required>
                                @foreach($demande_achats as $id => $entry)
                                    <option value="{{ $id }}" {{ old('demande_achat_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('demande_achat'))
                                <span class="help-block" role="alert">{{ $errors->first('demande_achat') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.validationAchat.fields.demande_achat_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('commentaire') ? 'has-error' : '' }}">
                            <label for="commentaire">{{ trans('cruds.validationAchat.fields.commentaire') }}</label>
                            <input class="form-control" type="text" name="commentaire" id="commentaire" value="{{ old('commentaire', '') }}">
                            @if($errors->has('commentaire'))
                                <span class="help-block" role="alert">{{ $errors->first('commentaire') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.validationAchat.fields.commentaire_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('etat') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.validationAchat.fields.etat') }}</label>
                            @foreach(App\Models\ValidationAchat::ETAT_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="etat_{{ $key }}" name="etat" value="{{ $key }}" {{ old('etat', '') === (string) $key ? 'checked' : '' }}>
                                    <label for="etat_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('etat'))
                                <span class="help-block" role="alert">{{ $errors->first('etat') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.validationAchat.fields.etat_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('statut') ? 'has-error' : '' }}">
                            <label for="statut">{{ trans('cruds.validationAchat.fields.statut') }}</label>
                            <input class="form-control" type="number" name="statut" id="statut" value="{{ old('statut', '') }}" step="1">
                            @if($errors->has('statut'))
                                <span class="help-block" role="alert">{{ $errors->first('statut') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.validationAchat.fields.statut_helper') }}</span>
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