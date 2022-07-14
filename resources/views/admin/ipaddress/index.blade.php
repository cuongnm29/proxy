@extends('layouts.admin')
@section('content')
@can('ip_manage')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.ipaddress.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.ipaddress.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.ipaddress.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ipaddress">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.ipaddress.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.ipaddress.fields.ipName') }}
                        </th>
                        <th>
                            {{ trans('cruds.ipaddress.fields.country') }}
                        </th>
                        <th>
                            {{ trans('cruds.ipaddress.fields.server') }}
                        </th>
                        <th>
                            {{ trans('cruds.ipaddress.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ipaddress as $key => $ip)
                        <tr data-entry-id="{{ $ip->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $ip->id ?? '' }}
                            </td>
                            <td>
                                {{ $ip->ipName ?? '' }}
                            </td>
                            <td>
                            @foreach($ip->countries()->pluck('name') as $countries)
                                    <span class="badge badge-info">{{ $countries }}</span>
                                @endforeach
                            </td>
                            <td>
                            @foreach($ip->servers()->pluck('name') as $server)
                                    <span class="badge badge-info">{{ $server }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $ip->status == "1" ? 'Enable':'Disable' }}
                            </td>
                            <td>
                               
                                <a class="btn btn-xs btn-info" href="{{ route('admin.ipaddress.edit', $ip->id) }}">
                                    {{ trans('global.edit') }}
                                </a>

                                <form action="{{ route('admin.ipaddress.destroy', $ip->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                </form>

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('ip_manage')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.ipaddress.mass_destroy') }}",
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
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-ipaddress:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection