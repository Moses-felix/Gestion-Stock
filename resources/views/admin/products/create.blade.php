@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.product.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.products.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.product.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('quantite') ? 'has-error' : '' }}">
                            <label class="required" for="quantite">{{ trans('cruds.product.fields.quantite') }}</label>
                            <input class="form-control" type="number" name="quantite" id="quantite" value="{{ old('quantite', '1') }}" step="1" required>
                            @if($errors->has('quantite'))
                                <span class="help-block" role="alert">{{ $errors->first('quantite') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.quantite_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                            <label class="required" for="price">{{ trans('cruds.product.fields.price') }}</label>
                            <input class="form-control" type="number" name="price" id="price" value="{{ old('price', '') }}" step="0.01" required>
                            @if($errors->has('price'))
                                <span class="help-block" role="alert">{{ $errors->first('price') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.price_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('categorie') ? 'has-error' : '' }}">
                            <label class="required" for="categorie_id">{{ trans('cruds.product.fields.categorie') }}</label>
                            <select class="form-control select2" name="categorie_id" id="categorie_id" required>
                                @foreach($categories as $id => $entry)
                                    <option value="{{ $id }}" {{ old('categorie_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('categorie'))
                                <span class="help-block" role="alert">{{ $errors->first('categorie') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.categorie_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('rangement') ? 'has-error' : '' }}">
                            <label class="required" for="rangement_id">{{ trans('cruds.product.fields.rangement') }}</label>
                            <select class="form-control select2" name="rangement_id" id="rangement_id" required>
                                @foreach($rangements as $id => $entry)
                                    <option value="{{ $id }}" {{ old('rangement_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('rangement'))
                                <span class="help-block" role="alert">{{ $errors->first('rangement') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.rangement_helper') }}</span>
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