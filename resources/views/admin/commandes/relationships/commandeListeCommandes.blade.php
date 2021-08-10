<div class="content">
    @can('liste_commande_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.liste-commandes.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.listeCommande.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.listeCommande.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-commandeListeCommandes">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.listeCommande.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.listeCommande.fields.commande') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.listeCommande.fields.product') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.listeCommande.fields.prix_unitaire') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.listeCommande.fields.quantite') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.listeCommande.fields.created_at') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.listeCommande.fields.updated_at') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.listeCommande.fields.deleted_at') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($listeCommandes as $key => $listeCommande)
                                    <tr data-entry-id="{{ $listeCommande->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $listeCommande->id ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($listeCommande->commandes as $key => $item)
                                                <span class="label label-info label-many">{{ $item->destinataire_commande }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($listeCommande->products as $key => $item)
                                                <span class="label label-info label-many">{{ $item->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $listeCommande->prix_unitaire ?? '' }}
                                        </td>
                                        <td>
                                            {{ $listeCommande->quantite ?? '' }}
                                        </td>
                                        <td>
                                            {{ $listeCommande->created_at ?? '' }}
                                        </td>
                                        <td>
                                            {{ $listeCommande->updated_at ?? '' }}
                                        </td>
                                        <td>
                                            {{ $listeCommande->deleted_at ?? '' }}
                                        </td>
                                        <td>
                                            @can('liste_commande_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.liste-commandes.show', $listeCommande->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('liste_commande_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.liste-commandes.edit', $listeCommande->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('liste_commande_delete')
                                                <form action="{{ route('admin.liste-commandes.destroy', $listeCommande->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('liste_commande_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.liste-commandes.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 10,
  });
  let table = $('.datatable-commandeListeCommandes:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection