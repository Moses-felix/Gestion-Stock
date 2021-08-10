@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.commande.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.commandes.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.commande.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $commande->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.commande.fields.company') }}
                                    </th>
                                    <td>
                                        {{ $commande->company->company_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.commande.fields.demande_achat') }}
                                    </th>
                                    <td>
                                        {{ $commande->demande_achat->objet ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.commande.fields.quantite') }}
                                    </th>
                                    <td>
                                        {{ $commande->quantite }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.commande.fields.transport') }}
                                    </th>
                                    <td>
                                        {{ $commande->transport }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.commande.fields.divers') }}
                                    </th>
                                    <td>
                                        {{ $commande->divers }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.commande.fields.tva') }}
                                    </th>
                                    <td>
                                        {{ $commande->tva->tva ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.commande.fields.prix') }}
                                    </th>
                                    <td>
                                        {{ $commande->prix }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.commande.fields.delai_livraison') }}
                                    </th>
                                    <td>
                                        {{ $commande->delai_livraison }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.commande.fields.created_at') }}
                                    </th>
                                    <td>
                                        {{ $commande->created_at }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.commandes.index') }}">
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