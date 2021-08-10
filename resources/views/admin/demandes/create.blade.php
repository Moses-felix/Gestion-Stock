@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.demande.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.demandes.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('users') ? 'has-error' : '' }}">
                            <label class="required" for="users_id">{{ trans('cruds.demande.fields.users') }}</label>
                            <select class="form-control select2" name="users_id" id="users_id" required>
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ old('users_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('users'))
                                <span class="help-block" role="alert">{{ $errors->first('users') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.demande.fields.users_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('objet_demande') ? 'has-error' : '' }}">
                            <label for="objet_demande">{{ trans('cruds.demande.fields.objet_demande') }}</label>
                            <input class="form-control" type="text" name="objet_demande" id="objet_demande" value="{{ old('objet_demande', '') }}">
                            @if($errors->has('objet_demande'))
                                <span class="help-block" role="alert">{{ $errors->first('objet_demande') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.demande.fields.objet_demande_helper') }}</span>
                        </div>

                        <div class="card-body">
                            <h4>Demande d'un article en stock</h4>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Article</th>
                                                <th>Quantité</th>
                                                <th><a href="#" style="text-align: center" class="btn btn-info addRow">+</a></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <select class="form-control" name="product[]" id="product">
                                                        @foreach($products as $product)
                                                            <option value="{{ $product->id }}" disabled='true'>{{ $product->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td><input type="text" name="quantite[]" type="number" class="form-control" min='1'></td>
                                                <td><a href="#" style="text-align: center" class="btn btn-danger remove">-</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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

@section('scripts')
<script type="text/javascript">
    $('.addRow').on('click', function(){
        addRow();
    });

    function addRow(){
        var tr = '<tr>'+
                    '<td>'+
                        '<select class="form-control" name="product[]" id="product">'+
                            '@foreach($products as $product)'+
                                '<option value="{{ $product->id }}">{{ $product->name }}</option>'+
                            '@endforeach'+
                        '</select>'+
                    '</td>'+
                    '<td><input type="text" name="quantite[]" type="number" class="form-control"></td>'+
                    '<td><a href="#" style="text-align: center" class="btn btn-danger remove">-</a></td>'+
                '</tr>';
            $('tbody').append(tr);
    };

    $('tbody').on('click', '.remove', function(){
        $(this).parent().parent().remove();
    });
</script>
@endsection