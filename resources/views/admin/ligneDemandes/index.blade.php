@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.ligneDemande.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-LigneDemande">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.ligneDemande.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.ligneDemande.fields.product') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.ligneDemande.fields.quantite') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.ligneDemande.fields.demande') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.ligneDemande.fields.demande_achat') }}
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
                                            @foreach($products as $key => $item)
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($demandes as $key => $item)
                                                <option value="{{ $item->objet_demande }}">{{ $item->objet_demande }}</option>
                                            @endforeach
                                        </select>
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
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ligneDemandes as $key => $ligneDemande)
                                    <tr data-entry-id="{{ $ligneDemande->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $ligneDemande->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $ligneDemande->product->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $ligneDemande->quantite ?? '' }}
                                        </td>
                                        <td>
                                            {{ $ligneDemande->demande->objet_demande ?? '' }}
                                        </td>
                                        <td>
                                            {{ $ligneDemande->demande_achat->objet ?? '' }}
                                        </td>
                                        <td>
                                            @can('ligne_demande_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.ligne-demandes.show', $ligneDemande->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
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
  
  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  });
  let table = $('.datatable-LigneDemande:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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