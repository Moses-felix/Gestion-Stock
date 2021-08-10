@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.listeCommande.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.liste-commandes.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listeCommande.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $listeCommande->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listeCommande.fields.commande') }}
                                    </th>
                                    <td>
                                        {{ $listeCommande->commande->prix ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listeCommande.fields.product') }}
                                    </th>
                                    <td>
                                        {{ $listeCommande->product->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listeCommande.fields.quantite') }}
                                    </th>
                                    <td>
                                        {{ $listeCommande->quantite }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listeCommande.fields.prix_unitaire') }}
                                    </th>
                                    <td>
                                        {{ $listeCommande->prix_unitaire }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listeCommande.fields.created_at') }}
                                    </th>
                                    <td>
                                        {{ $listeCommande->created_at }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listeCommande.fields.updated_at') }}
                                    </th>
                                    <td>
                                        {{ $listeCommande->updated_at }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.listeCommande.fields.deleted_at') }}
                                    </th>
                                    <td>
                                        {{ $listeCommande->deleted_at }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.liste-commandes.index') }}">
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