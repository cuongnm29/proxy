@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.ipaddress.title_singular') }}
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
                <select name="countriesid[]" id="countriesid" class="form-control select2"  required>
                    @foreach($countries as $id => $countries)
                    <option value="{{ $id }}" {{ (in_array($id, old('countries', [])) || isset($ipaddress) && $ipaddress->countries->contains($id)) ? 'selected' : '' }}>{{ $countries }}</option>
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
            <div class="form-group {{ $errors->has('ipName') ? 'has-error' : '' }}">
                <label for="ipName">{{ trans('cruds.ipaddress.fields.ipName') }}*</label>
                <input type="text" id="ipName" name="ipName" class="form-control" value="{{ old('ipName', isset($ipaddress) ? $ipaddress->ipName : '') }}" required>
                @if($errors->has('ipName'))
                    <em class="invalid-feedback">
                        {{ $errors->first('ipName') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.ipaddress.fields.ipName_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('timeExpired') ? 'has-error' : '' }}">
                <label for="timeExpired">{{ trans('cruds.ipaddress.fields.expired') }}*</label>
                <input type="text" id="timeExpired" name="timeExpired" class="form-control" value="{{ old('timeExpired', isset($ipaddress) ? $ipaddress->timeExpired : '') }}" required>
                @if($errors->has('timeExpired'))
                    <em class="invalid-feedback">
                        {{ $errors->first('timeExpired') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.ipaddress.fields.expired_helper') }}
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

