<div class="content">
    @can('commande_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.commandes.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.commande.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.commande.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-demandeAchatCommandes">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.commande.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.commande.fields.company') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.commande.fields.destinataire_commande') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.commande.fields.demande_achat') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.commande.fields.divers') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.commande.fields.transport') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.commande.fields.tva') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.commande.fields.prix') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.commande.fields.ligne_commande') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.commande.fields.created_at') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.commande.fields.updated_at') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.commande.fields.deleted_at') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($commandes as $key => $commande)
                                    <tr data-entry-id="{{ $commande->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $commande->id ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($commande->companies as $key => $item)
                                                <span class="label label-info label-many">{{ $item->company_name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $commande->destinataire_commande ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($commande->demande_achats as $key => $item)
                                                <span class="label label-info label-many">{{ $item->objet }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $commande->divers ?? '' }}
                                        </td>
                                        <td>
                                            {{ $commande->transport ?? '' }}
                                        </td>
                                        <td>
                                            {{ $commande->tva->tva ?? '' }}
                                        </td>
                                        <td>
                                            {{ $commande->prix ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($commande->ligne_commandes as $key => $item)
                                                <span class="label label-info label-many">{{ $item->prix_unitaire }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $commande->created_at ?? '' }}
                                        </td>
                                        <td>
                                            {{ $commande->updated_at ?? '' }}
                                        </td>
                                        <td>
                                            {{ $commande->deleted_at ?? '' }}
                                        </td>
                                        <td>
                                            @can('commande_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.commandes.show', $commande->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('commande_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.commandes.edit', $commande->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('commande_delete')
                                                <form action="{{ route('admin.commandes.destroy', $commande->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('commande_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.commandes.massDestroy') }}",
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
  let table = $('.datatable-demandeAchatCommandes:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection