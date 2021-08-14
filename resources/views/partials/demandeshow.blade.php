<tr>
    <th>
        {{ trans('cruds.demande.fields.objet_demande') }}
    </th>
    <td>
        {{ $demande->objet_demande }}
    </td>
</tr>

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