@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.demande.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.demandes.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.demande.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $demande->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.demande.fields.users') }}
                                    </th>
                                    <td>
                                        {{ $demande->users->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.demande.fields.objet_demande') }}
                                    </th>
                                    <td>
                                        {{ $demande->objet_demande }}
                                    </td>
                                </tr>
                                {{-- <tr>
                                    <th>
                                        {{ trans('cruds.demande.fields.created_at') }}
                                    </th>
                                    <td>
                                        {{ $demande->created_at }}
                                    </td>
                                </tr> --}}
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
                                                                {{ $ligne->product->name }}
                                                            </td>
                                                            <td>
                                                                {{ $ligne->quantite }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.demandes.index') }}">
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