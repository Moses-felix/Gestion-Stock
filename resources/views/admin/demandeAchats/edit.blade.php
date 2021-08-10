@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.demandeAchat.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.demande-achats.update", [$demandeAchat->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('users') ? 'has-error' : '' }}">
                            <label class="required" for="users_id">{{ trans('cruds.demandeAchat.fields.users') }}</label>
                            <select class="form-control select2" name="users_id" id="users_id" required>
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('users_id') ? old('users_id') : $demandeAchat->users->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('users'))
                                <span class="help-block" role="alert">{{ $errors->first('users') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.demandeAchat.fields.users_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('objet') ? 'has-error' : '' }}">
                            <label class="required" for="objet">{{ trans('cruds.demandeAchat.fields.objet') }}</label>
                            <input class="form-control" type="text" name="objet" id="objet" value="{{ old('objet', $demandeAchat->objet) }}" required>
                            @if($errors->has('objet'))
                                <span class="help-block" role="alert">{{ $errors->first('objet') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.demandeAchat.fields.objet_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('urgence') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.demandeAchat.fields.urgence') }}</label>
                            @foreach(App\Models\DemandeAchat::URGENCE_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="urgence_{{ $key }}" name="urgence" value="{{ $key }}" {{ old('urgence', $demandeAchat->urgence) === (string) $key ? 'checked' : '' }} required>
                                    <label for="urgence_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('urgence'))
                                <span class="help-block" role="alert">{{ $errors->first('urgence') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.demandeAchat.fields.urgence_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('etat') ? 'has-error' : '' }}">
                            <label for="etat">{{ trans('cruds.demandeAchat.fields.etat') }}</label>
                            <input class="form-control" type="number" name="etat" id="etat" value="{{ old('etat', $demandeAchat->etat) }}" step="1">
                            @if($errors->has('etat'))
                                <span class="help-block" role="alert">{{ $errors->first('etat') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.demandeAchat.fields.etat_helper') }}</span>
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