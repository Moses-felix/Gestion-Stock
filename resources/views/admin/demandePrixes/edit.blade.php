@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.demandePrix.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.demande-prixes.update", [$demandePrix->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('demande_achat') ? 'has-error' : '' }}">
                            <label for="demande_achat_id">{{ trans('cruds.demandePrix.fields.demande_achat') }}</label>
                            <select class="form-control select2" name="demande_achat_id" id="demande_achat_id">
                                @foreach($demande_achats as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('demande_achat_id') ? old('demande_achat_id') : $demandePrix->demande_achat->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('demande_achat'))
                                <span class="help-block" role="alert">{{ $errors->first('demande_achat') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.demandePrix.fields.demande_achat_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('users') ? 'has-error' : '' }}">
                            <label for="users_id">{{ trans('cruds.demandePrix.fields.users') }}</label>
                            <select class="form-control select2" name="users_id" id="users_id">
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('users_id') ? old('users_id') : $demandePrix->users->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('users'))
                                <span class="help-block" role="alert">{{ $errors->first('users') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.demandePrix.fields.users_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('company') ? 'has-error' : '' }}">
                            <label class="required" for="company_id">{{ trans('cruds.demandePrix.fields.company') }}</label>
                            <select class="form-control select2" name="company_id" id="company_id" required>
                                @foreach($companies as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('company_id') ? old('company_id') : $demandePrix->company->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('company'))
                                <span class="help-block" role="alert">{{ $errors->first('company') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.demandePrix.fields.company_helper') }}</span>
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