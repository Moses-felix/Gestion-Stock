@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.livraison.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.livraisons.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.livraison.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $livraison->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.livraison.fields.commande') }}
                                    </th>
                                    <td>
                                        {{ $livraison->commande->prix ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.livraison.fields.etat') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $livraison->etat ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.livraison.fields.statut') }}
                                    </th>
                                    <td>
                                        {{ $livraison->statut }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.livraison.fields.product_category') }}
                                    </th>
                                    <td>
                                        {{ $livraison->product_category->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.livraison.fields.rangement') }}
                                    </th>
                                    <td>
                                        {{ $livraison->rangement->nom_rangement ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.livraisons.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection