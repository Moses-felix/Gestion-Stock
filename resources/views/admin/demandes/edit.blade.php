@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.demande.title_singular') }}
                </div>
                
                <div class="panel-body">
                    <div class="form-group">
                        <a class="btn btn-default" href="{{ route('admin.demandes.index') }}">
                            {{ trans('global.back_to_list') }}
                        </a>
                    </div>
                    <form method="POST" action="{{ route("admin.demandes.update", [$demande->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('users') ? 'has-error' : '' }}">
                            <label class="required" for="users_id">{{ trans('cruds.demande.fields.users') }}</label>
                            <select class="form-control select2" name="users_id" id="users_id">
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('users_id') ? old('users_id') : $demande->users->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('users'))
                                <span class="help-block" role="alert">{{ $errors->first('users') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.demande.fields.users_helper') }}</span>
                            {{-- //@if($product->id == $ligne->product->id) selected @endif --}}
                            {{-- <input type="text" value="{{ $demande->users->name }}" class="form-control" name="users_id" id="users_id" readonly> --}}
                        </div>
                        <div class="form-group {{ $errors->has('objet_demande') ? 'has-error' : '' }}">
                            <label for="objet_demande">{{ trans('cruds.demande.fields.objet_demande') }}</label>
                            <input class="form-control" type="text" name="objet_demande" id="objet_demande" value="{{ old('objet_demande', $demande->objet_demande) }}">
                            @if($errors->has('objet_demande'))
                                <span class="help-block" role="alert">{{ $errors->first('objet_demande') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.demande.fields.objet_demande_helper') }}</span>
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
                                                        {{-- <input type="text" class="form-control" value="{{ $ligne->product->name }}" name="product[]" id="product"> --}}
                                                        
                                                        <select name="product[]" id="product" class="form-control">
                                                            @foreach($products as $product)
                                                                <option value="{{ $product->id }}" @if($product->id == $ligne->product->id) selected @endif>{{ $product->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control" value="{{ $ligne->quantite }}" id="quantite" name="quantite[]">
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" type="submit">
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