@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.time.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route('admin.time.update', [$time->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('server') ? 'has-error' : '' }}">
                <label for="serverid">{{ trans('cruds.time.fields.server') }}*
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                <select name="serverid[]" id="serverid" class="form-control select2" multiple="multiple" required>
                    @foreach($server as $id => $server)
                    <option value="{{ $id }}" {{ (in_array($id, old('server', [])) || isset($time) && $time->servers()->pluck('id')->contains($id)) ? 'selected' : '' }}>{{ $server }}</option>
                    @endforeach
                </select>
                @if($errors->has('serverid'))
                    <em class="invalid-feedback">
                        {{ $errors->first('serverid') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.time.fields.server_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.time.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($time) ? $time->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.time.fields.name_helper') }}
                </p>
            </div>
            
            <div class="form-group {{ $errors->has('isorder') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.time.fields.order') }}*</label>
                <input type="number" id="isorder" name="isorder" class="form-control" value="{{ old('isorder', isset($time) ? $time->isorder : '') }}" required>
                @if($errors->has('isorder'))
                    <em class="invalid-feedback">
                        {{ $errors->first('isorder') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.time.fields.order_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                <label for="status">{{ trans('cruds.time.fields.status') }}
                </label>
                <select name="status" id="status" class="form-control select">
                <option value="1" {{$time->status==1 ?'selected':''}}>Enable</option>
                    <option value="0" {{$time->status==0 ?'selected':''}}>Disable</option>
                </select>
                @if($errors->has('status'))
                <em class="invalid-feedback">
                    {{ $errors->first('status') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.time.fields.status_helper') }}
                </p>
            </div>
            
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection

