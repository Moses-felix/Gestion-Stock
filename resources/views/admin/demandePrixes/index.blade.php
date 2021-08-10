@extends('layouts.admin')
@section('content')
<div class="content">
    @can('demande_prix_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.demande-prixes.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.demandePrix.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.demandePrix.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-DemandePrix">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.demandePrix.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.demandePrix.fields.demande_achat') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.demandePrix.fields.users') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.demandePrix.fields.company') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.demandePrix.fields.created_at') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.demandePrix.fields.updated_at') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.demandePrix.fields.deleted_at') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($demande_achats as $key => $item)
                                                <option value="{{ $item->objet }}">{{ $item->objet }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($users as $key => $item)
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($contact_companies as $key => $item)
                                                <option value="{{ $item->company_name }}">{{ $item->company_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($demandePrixes as $key => $demandePrix)
                                    <tr data-entry-id="{{ $demandePrix->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $demandePrix->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $demandePrix->demande_achat->objet ?? '' }}
                                        </td>
                                        <td>
                                            {{ $demandePrix->users->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $demandePrix->company->company_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $demandePrix->created_at ?? '' }}
                                        </td>
                                        <td>
                                            {{ $demandePrix->updated_at ?? '' }}
                                        </td>
                                        <td>
                                            {{ $demandePrix->deleted_at ?? '' }}
                                        </td>
                                        <td>
                                            @can('demande_prix_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.demande-prixes.show', $demandePrix->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('demande_prix_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.demande-prixes.edit', $demandePrix->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('demande_prix_delete')
                                                <form action="{{ route('admin.demande-prixes.destroy', $demandePrix->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('demande_prix_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.demande-prixes.massDestroy') }}",
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
  let table = $('.datatable-DemandePrix:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection