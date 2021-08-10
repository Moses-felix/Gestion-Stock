@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.commande.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.commandes.update", [$commande->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('company') ? 'has-error' : '' }}">
                            <label class="required" for="company_id">{{ trans('cruds.commande.fields.company') }}</label>
                            <select class="form-control select2" name="company_id" id="company_id" required>
                                @foreach($companies as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('company_id') ? old('company_id') : $commande->company->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('company'))
                                <span class="help-block" role="alert">{{ $errors->first('company') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.commande.fields.company_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('demande_achat') ? 'has-error' : '' }}">
                            <label for="demande_achat_id">{{ trans('cruds.commande.fields.demande_achat') }}</label>
                            <select class="form-control select2" name="demande_achat_id" id="demande_achat_id">
                                @foreach($demande_achats as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('demande_achat_id') ? old('demande_achat_id') : $commande->demande_achat->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('demande_achat'))
                                <span class="help-block" role="alert">{{ $errors->first('demande_achat') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.commande.fields.demande_achat_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('quantite') ? 'has-error' : '' }}">
                            <label class="required" for="quantite">{{ trans('cruds.commande.fields.quantite') }}</label>
                            <input class="form-control" type="number" name="quantite" id="quantite" value="{{ old('quantite', $commande->quantite) }}" step="1" required>
                            @if($errors->has('quantite'))
                                <span class="help-block" role="alert">{{ $errors->first('quantite') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.commande.fields.quantite_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('transport') ? 'has-error' : '' }}">
                            <label for="transport">{{ trans('cruds.commande.fields.transport') }}</label>
                            <input class="form-control" type="number" name="transport" id="transport" value="{{ old('transport', $commande->transport) }}" step="0.01">
                            @if($errors->has('transport'))
                                <span class="help-block" role="alert">{{ $errors->first('transport') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.commande.fields.transport_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('divers') ? 'has-error' : '' }}">
                            <label for="divers">{{ trans('cruds.commande.fields.divers') }}</label>
                            <input class="form-control" type="number" name="divers" id="divers" value="{{ old('divers', $commande->divers) }}" step="0.01">
                            @if($errors->has('divers'))
                                <span class="help-block" role="alert">{{ $errors->first('divers') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.commande.fields.divers_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tva') ? 'has-error' : '' }}">
                            <label for="tva_id">{{ trans('cruds.commande.fields.tva') }}</label>
                            <select class="form-control select2" name="tva_id" id="tva_id">
                                @foreach($tvas as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('tva_id') ? old('tva_id') : $commande->tva->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('tva'))
                                <span class="help-block" role="alert">{{ $errors->first('tva') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.commande.fields.tva_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('prix') ? 'has-error' : '' }}">
                            <label class="required" for="prix">{{ trans('cruds.commande.fields.prix') }}</label>
                            <input class="form-control" type="number" name="prix" id="prix" value="{{ old('prix', $commande->prix) }}" step="1" required>
                            @if($errors->has('prix'))
                                <span class="help-block" role="alert">{{ $errors->first('prix') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.commande.fields.prix_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('delai_livraison') ? 'has-error' : '' }}">
                            <label class="required" for="delai_livraison">{{ trans('cruds.commande.fields.delai_livraison') }}</label>
                            <input class="form-control date" type="text" name="delai_livraison" id="delai_livraison" value="{{ old('delai_livraison', $commande->delai_livraison) }}" required>
                            @if($errors->has('delai_livraison'))
                                <span class="help-block" role="alert">{{ $errors->first('delai_livraison') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.commande.fields.delai_livraison_helper') }}</span>
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