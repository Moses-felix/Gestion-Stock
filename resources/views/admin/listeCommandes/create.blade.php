@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.listeCommande.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.liste-commandes.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('commande') ? 'has-error' : '' }}">
                            <label class="required" for="commande_id">{{ trans('cruds.listeCommande.fields.commande') }}</label>
                            <select class="form-control select2" name="commande_id" id="commande_id" required>
                                @foreach($commandes as $id => $entry)
                                    <option value="{{ $id }}" {{ old('commande_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('commande'))
                                <span class="help-block" role="alert">{{ $errors->first('commande') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.listeCommande.fields.commande_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('product') ? 'has-error' : '' }}">
                            <label class="required" for="product_id">{{ trans('cruds.listeCommande.fields.product') }}</label>
                            <select class="form-control select2" name="product_id" id="product_id" required>
                                @foreach($products as $id => $entry)
                                    <option value="{{ $id }}" {{ old('product_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('product'))
                                <span class="help-block" role="alert">{{ $errors->first('product') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.listeCommande.fields.product_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('quantite') ? 'has-error' : '' }}">
                            <label class="required" for="quantite">{{ trans('cruds.listeCommande.fields.quantite') }}</label>
                            <input class="form-control" type="number" name="quantite" id="quantite" value="{{ old('quantite', '1') }}" step="1" required>
                            @if($errors->has('quantite'))
                                <span class="help-block" role="alert">{{ $errors->first('quantite') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.listeCommande.fields.quantite_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('prix_unitaire') ? 'has-error' : '' }}">
                            <label class="required" for="prix_unitaire">{{ trans('cruds.listeCommande.fields.prix_unitaire') }}</label>
                            <input class="form-control" type="number" name="prix_unitaire" id="prix_unitaire" value="{{ old('prix_unitaire', '') }}" step="1" required>
                            @if($errors->has('prix_unitaire'))
                                <span class="help-block" role="alert">{{ $errors->first('prix_unitaire') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.listeCommande.fields.prix_unitaire_helper') }}</span>
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