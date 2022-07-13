@extends('layouts.admin')
@section('content')
@can('category_manage')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("admin.category.create") }}">
            {{ trans('global.add') }} {{ trans('cruds.category.title_singular') }}
        </a>
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.category.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                <thead>
                    <tr>
                        <th>
                            {{ trans('cruds.category.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.category.fields.name') }}
                        </th>

                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($allCategories as $item)
                    <tr>
                        <td>
                            <span>{{ $item->id }}</span>
                        </td>
                        <td class="treeview">
                            <span>{{ $item->name }}</span>
                        </td>
                        <td>
                            @can('category_manage')
                            <a class="btn btn-xs btn-info" href="{{ route('admin.category.edit', $item->id) }}">
                                {{ trans('global.edit') }}
                            </a>
                            @endcan
                            @can('category_manage')
                            <form action="{{ route('admin.category.destroy', $item->id) }}" method="POST"
                                onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                            </form>
                            @endcan
                        </td>
                    </tr>

                    @foreach($item['child'] as $child)
                    <tr class="treeview-menu">
                        <td><span>{{ $item->id }}.{{ $child->id }}</span></td>
                        <td><span>---- {{ $child->name }}</span></td>
                        <td>
                            @can('category_manage')
                            <a class="btn btn-xs btn-info" href="{{ route('admin.category.edit', $child->id) }}">
                                {{ trans('global.edit') }}
                            </a>
                            @endcan
                            @can('category_manage')
                            <form action="{{ route('admin.category.destroy', $child->id) }}" method="POST"
                                onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                            </form>
                            @endcan
                        </td>
                    </tr>
                    @endforeach

                    @endforeach
            </table>
        </div>

    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
$(function() {
    let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
    @can('category_delete')
    let deleteButtonTrans = '{{ trans('global.datatables.delete ') }}'
    let deleteButton = {
        text: deleteButtonTrans,
        url: "{{ route('admin.category.massDestroy') }}",
        className: 'btn-danger',
        action: function(e, dt, node, config) {
            var ids = $.map(dt.rows({
                selected: true
            }).nodes(), function(entry) {
                return $(entry).data('entry-id')
            });
            if (ids.length === 0) {
                alert('{{ trans(' global.datatables.zero_selected ') }}')
                return
            }
            if (confirm('{{ trans('global.areYouSure ') }}')) {
                $.ajax({
                        headers: {
                            'x-csrf-token': _token
                        },
                        method: 'POST',
                        url: config.url,
                        data: {
                            ids: ids,
                            _method: 'DELETE'
                        }
                    })
                    .done(function() {
                        location.reload()
                    })
            }
        }
    }
    dtButtons.push(deleteButton)
    @endcan
    $.extend(true, $.fn.dataTable.defaults, {
        pageLength: 100,
    });
    $('.datatable-User:not(.ajaxTable)').DataTable({
        buttons: dtButtons
    })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})
</script>
@endsection