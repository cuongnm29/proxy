@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.country.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route('admin.country.update', [$country->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('server') ? 'has-error' : '' }}">
                <label for="serverid">{{ trans('cruds.country.fields.server') }}*
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                <select name="serverid[]" id="serverid" class="form-control select2" multiple="multiple" required>
                    @foreach($servers as $id => $servers)
                        <option value="{{ $id }}">{{ $id }}</option>
                    @endforeach
                </select>
                @if($errors->has('serverid'))
                    <em class="invalid-feedback">
                        {{ $errors->first('serverid') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.country.fields.server_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.country.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($country) ? $country->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.server.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.server.fields.code') }}*</label>
                <input type="text" id="code" name="code" class="form-control" value="{{ old('code', isset($country) ? $country->code : '') }}" required>
                @if($errors->has('code'))
                    <em class="invalid-feedback">
                        {{ $errors->first('code') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.country.fields.code_helper') }}
                </p>
            </div>
            
            
            <div class="form-group {{ $errors->has('isorder') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.country.fields.order') }}*</label>
                <input type="number" id="isorder" name="isorder" class="form-control" value="{{ old('isorder', isset($country) ? $country->isorder : '') }}" required>
                @if($errors->has('isorder'))
                    <em class="invalid-feedback">
                        {{ $errors->first('isorder') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.country.fields.order_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                <label for="status">{{ trans('cruds.country.fields.status') }}
                </label>
                <select name="status" id="status" class="form-control select">
                <option value="1" {{$country->status==1 ?'selected':''}}>Enable</option>
                    <option value="0" {{$country->status==0 ?'selected':''}}>Disable</option>
                </select>
                @if($errors->has('status'))
                <em class="invalid-feedback">
                    {{ $errors->first('status') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.country.fields.status_helper') }}
                </p>
            </div>
            
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection

