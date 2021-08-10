@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.livraison.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.livraisons.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('commande') ? 'has-error' : '' }}">
                            <label class="required" for="commande_id">{{ trans('cruds.livraison.fields.commande') }}</label>
                            <select class="form-control select2" name="commande_id" id="commande_id" required>
                                @foreach($commandes as $id => $entry)
                                    <option value="{{ $id }}" {{ old('commande_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('commande'))
                                <span class="help-block" role="alert">{{ $errors->first('commande') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.livraison.fields.commande_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('etat') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="etat" value="0">
                                <input type="checkbox" name="etat" id="etat" value="1" {{ old('etat', 0) == 1 ? 'checked' : '' }}>
                                <label for="etat" style="font-weight: 400">{{ trans('cruds.livraison.fields.etat') }}</label>
                            </div>
                            @if($errors->has('etat'))
                                <span class="help-block" role="alert">{{ $errors->first('etat') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.livraison.fields.etat_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('statut') ? 'has-error' : '' }}">
                            <label for="statut">{{ trans('cruds.livraison.fields.statut') }}</label>
                            <input class="form-control" type="number" name="statut" id="statut" value="{{ old('statut', '') }}" step="1">
                            @if($errors->has('statut'))
                                <span class="help-block" role="alert">{{ $errors->first('statut') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.livraison.fields.statut_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('product_category') ? 'has-error' : '' }}">
                            <label class="required" for="product_category_id">{{ trans('cruds.livraison.fields.product_category') }}</label>
                            <select class="form-control select2" name="product_category_id" id="product_category_id" required>
                                @foreach($product_categories as $id => $entry)
                                    <option value="{{ $id }}" {{ old('product_category_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('product_category'))
                                <span class="help-block" role="alert">{{ $errors->first('product_category') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.livraison.fields.product_category_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('rangement') ? 'has-error' : '' }}">
                            <label class="required" for="rangement_id">{{ trans('cruds.livraison.fields.rangement') }}</label>
                            <select class="form-control select2" name="rangement_id" id="rangement_id" required>
                                @foreach($rangements as $id => $entry)
                                    <option value="{{ $id }}" {{ old('rangement_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('rangement'))
                                <span class="help-block" role="alert">{{ $errors->first('rangement') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.livraison.fields.rangement_helper') }}</span>
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