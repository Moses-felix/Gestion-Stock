@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.ligneDemande.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.ligne-demandes.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('product') ? 'has-error' : '' }}">
                            <label class="required" for="product_id">{{ trans('cruds.ligneDemande.fields.product') }}</label>
                            <select class="form-control select2" name="product_id" id="product_id" required>
                                @foreach($products as $id => $entry)
                                    <option value="{{ $id }}" {{ old('product_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('product'))
                                <span class="help-block" role="alert">{{ $errors->first('product') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.ligneDemande.fields.product_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('quantite') ? 'has-error' : '' }}">
                            <label class="required" for="quantite">{{ trans('cruds.ligneDemande.fields.quantite') }}</label>
                            <input class="form-control" type="number" name="quantite" id="quantite" value="{{ old('quantite', '1') }}" step="1" required>
                            @if($errors->has('quantite'))
                                <span class="help-block" role="alert">{{ $errors->first('quantite') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.ligneDemande.fields.quantite_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('demande') ? 'has-error' : '' }}">
                            <label for="demande_id">{{ trans('cruds.ligneDemande.fields.demande') }}</label>
                            <select class="form-control select2" name="demande_id" id="demande_id">
                                @foreach($demandes as $id => $entry)
                                    <option value="{{ $id }}" {{ old('demande_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('demande'))
                                <span class="help-block" role="alert">{{ $errors->first('demande') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.ligneDemande.fields.demande_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('demande_achat') ? 'has-error' : '' }}">
                            <label for="demande_achat_id">{{ trans('cruds.ligneDemande.fields.demande_achat') }}</label>
                            <select class="form-control select2" name="demande_achat_id" id="demande_achat_id">
                                @foreach($demande_achats as $id => $entry)
                                    <option value="{{ $id }}" {{ old('demande_achat_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('demande_achat'))
                                <span class="help-block" role="alert">{{ $errors->first('demande_achat') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.ligneDemande.fields.demande_achat_helper') }}</span>
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