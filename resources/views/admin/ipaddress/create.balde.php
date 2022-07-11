@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.country.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route('admin.ipaddress.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('serverid') ? 'has-error' : '' }}">
                <label for="serverid">{{ trans('cruds.ipaddress.fields.server') }}*
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                <select name="serverid[]" id="serverid" class="form-control select2" multiple="multiple" required>
                    @foreach($server as $id => $server)
                    <option value="{{ $id }}" {{ (in_array($id, old('server', [])) || isset($ipaddress) && $ipaddress->server->contains($id)) ? 'selected' : '' }}>{{ $server }}</option>
                    @endforeach
                </select>
                @if($errors->has('serverid'))
                    <em class="invalid-feedback">
                        {{ $errors->first('serverid') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.ipaddress.fields.server_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('countriesid') ? 'has-error' : '' }}">
                <label for="countriesid">{{ trans('cruds.ipaddress.fields.country') }}*
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                <select name="countriesid[]" id="countriesid" class="form-control select2" multiple="multiple" required>
                    @foreach($countries as $id => $countries)
                    <option value="{{ $id }}" {{ (in_array($id, old('countries', [])) || isset($ipaddress) && $ipaddress->countries->contains($id)) ? 'selected' : '' }}>{{ $server }}</option>
                    @endforeach
                </select>
                @if($errors->has('countriesid'))
                    <em class="invalid-feedback">
                        {{ $errors->first('countriesid') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.ipaddress.fields.server_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.ipaddress.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($ipaddress) ? $ipaddress->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.ipaddress.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('timeexpired') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.country.fields.expired') }}*</label>
                <input type="text" id="timeexpired" name="code" class="form-control" value="{{ old('timeexpired', isset($ipaddress) ? $ipaddress->timeexpired : '') }}" required>
                @if($errors->has('code'))
                    <em class="invalid-feedback">
                        {{ $errors->first('timeexpired') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.ipaddress.fields.code_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                <label for="status">{{ trans('cruds.country.fields.status') }}
                </label>
                <select name="status" id="status" class="form-control select">
                    <option value="1">Enable</option>
                    <option value="0">Disable</option>
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

