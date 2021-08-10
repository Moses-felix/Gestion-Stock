@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.contactCompany.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.contact-companies.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('company_name') ? 'has-error' : '' }}">
                            <label class="required" for="company_name">{{ trans('cruds.contactCompany.fields.company_name') }}</label>
                            <input class="form-control" type="text" name="company_name" id="company_name" value="{{ old('company_name', '') }}" required>
                            @if($errors->has('company_name'))
                                <span class="help-block" role="alert">{{ $errors->first('company_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contactCompany.fields.company_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.contactCompany.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contactCompany.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('prenom') ? 'has-error' : '' }}">
                            <label class="required" for="prenom">{{ trans('cruds.contactCompany.fields.prenom') }}</label>
                            <input class="form-control" type="text" name="prenom" id="prenom" value="{{ old('prenom', '') }}" required>
                            @if($errors->has('prenom'))
                                <span class="help-block" role="alert">{{ $errors->first('prenom') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contactCompany.fields.prenom_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('telephone') ? 'has-error' : '' }}">
                            <label class="required" for="telephone">{{ trans('cruds.contactCompany.fields.telephone') }}</label>
                            <input class="form-control" type="number" name="telephone" id="telephone" value="{{ old('telephone', '') }}" step="1" required>
                            @if($errors->has('telephone'))
                                <span class="help-block" role="alert">{{ $errors->first('telephone') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contactCompany.fields.telephone_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('company_address') ? 'has-error' : '' }}">
                            <label class="required" for="company_address">{{ trans('cruds.contactCompany.fields.company_address') }}</label>
                            <input class="form-control" type="text" name="company_address" id="company_address" value="{{ old('company_address', '') }}" required>
                            @if($errors->has('company_address'))
                                <span class="help-block" role="alert">{{ $errors->first('company_address') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contactCompany.fields.company_address_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label class="required" for="email">{{ trans('cruds.contactCompany.fields.email') }}</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}" required>
                            @if($errors->has('email'))
                                <span class="help-block" role="alert">{{ $errors->first('email') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contactCompany.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('company_website') ? 'has-error' : '' }}">
                            <label for="company_website">{{ trans('cruds.contactCompany.fields.company_website') }}</label>
                            <input class="form-control" type="text" name="company_website" id="company_website" value="{{ old('company_website', '') }}">
                            @if($errors->has('company_website'))
                                <span class="help-block" role="alert">{{ $errors->first('company_website') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contactCompany.fields.company_website_helper') }}</span>
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