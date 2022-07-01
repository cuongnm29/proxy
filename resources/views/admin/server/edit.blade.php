@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.server.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route('admin.server.update', [$server->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group ">
                <label for="name">{{ trans('cruds.server.fields.service') }}</label>
                <select id="parent_id" name="parent_id" class="form-control">
                    <option value="0">{{ trans('cruds.server.fields.service') }} </option>
                    @foreach ($services as $service)
                    @if($server->servicesid==$service->id)
                                    <option  selected value="{{$service->id}}">{{$service->name }}</option>
                                    @else
                                    <option   value="{{$service->id}}">{{$service->name }}</option>
                                @endif
                    
                    @endforeach
                </select>
            </div>
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.server.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($server) ? $server->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.service.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('time') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.service.fields.time') }}*</label>
                <input type="text" id="time" name="time" class="form-control" value="{{ old('time', isset($server) ? $server->time : '') }}" required>
                @if($errors->has('time'))
                    <em class="invalid-feedback">
                        {{ $errors->first('time') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.server.fields.time_helper') }}
                </p>
            </div>
            
            
            <div class="form-group {{ $errors->has('isorder') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.server.fields.order') }}*</label>
                <input type="number" id="isorder" name="isorder" class="form-control" value="{{ old('isorder', isset($server) ? $server->isorder : '') }}" required>
                @if($errors->has('isorder'))
                    <em class="invalid-feedback">
                        {{ $errors->first('isorder') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.server.fields.order_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                <label for="status">{{ trans('cruds.server.fields.status') }}
                </label>
                <select name="status" id="status" class="form-control select">
                <option value="1" {{$server->status==1 ?'selected':''}}>Enable</option>
                    <option value="0" {{$server->status==0 ?'selected':''}}>Disable</option>
                </select>
                @if($errors->has('status'))
                <em class="invalid-feedback">
                    {{ $errors->first('status') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.server.fields.status_helper') }}
                </p>
            </div>
            
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection

