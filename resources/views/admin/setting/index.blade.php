@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
       {{ trans('cruds.setting.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.setting.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
          
          
            <div class="form-group {{ $errors->has('bankname') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.setting.fields.bankname') }}</label>
                <input type="text" id="bankname" name="bankname" class="form-control"
                value="{{ old('bankname', isset($setting) ? $setting->bankname : '') }}">
                @if($errors->has('bankname'))
                <em class="invalid-feedback">
                    {{ $errors->first('bankname') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.setting.fields.bankname_helper') }}
                </p>
            </div>
            
            <div class="form-group {{ $errors->has('banknumber') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.setting.fields.banknumber') }}</label>
                <input type="text" id="banknumber" name="banknumber" class="form-control"
                value="{{ old('banknumber', isset($setting) ? $setting->banknumber : '') }}">
                @if($errors->has('banknumber'))
                <em class="invalid-feedback">
                    {{ $errors->first('banknumber') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.setting.fields.banknumber_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('bankowner') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.setting.fields.bankowner') }}</label>
                <input type="text" id="bankowner" name="bankowner" class="form-control"
                value="{{ old('bankowner', isset($setting) ? $setting->bankowner : '') }}">
                @if($errors->has('bankowner'))
                <em class="invalid-feedback">
                    {{ $errors->first('bankowner') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.setting.fields.bankowner_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('banksynax') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.setting.fields.banksynax') }}</label>
                <input type="text" id="banksynax" name="banksynax" class="form-control"
                value="{{ old('banksynax', isset($setting) ? $setting->banksynax : '') }}">
                @if($errors->has('banksynax'))
                <em class="invalid-feedback">
                    {{ $errors->first('banksynax') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.setting.fields.bankowner_helper') }}
                </p>
            </div>
            
            <div class="form-group {{ $errors->has('titlepage') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.setting.fields.titlepage') }}</label>
                <input type="text" id="titlepage" name="titlepage" class="form-control"
                value="{{ old('titlepage', isset($setting) ? $setting->titlepage : '') }}">
                @if($errors->has('titlepage'))
                <em class="invalid-titlepage">
                    {{ $errors->first('titlepage') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.setting.fields.titlepage_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('meta') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.setting.fields.meta') }}</label>
                <input type="text" id="meta" name="meta" class="form-control"
                value="{{ old('meta', isset($setting) ? $setting->meta : '') }}">
                @if($errors->has('meta'))
                <em class="invalid-feedback">
                    {{ $errors->first('meta') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.setting.fields.meta_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('keyword') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.setting.fields.keyword') }}</label>
                <input type="text" id="keyword" name="keyword" class="form-control"
                value="{{ old('keyword', isset($setting) ? $setting->keyword : '') }}">
                @if($errors->has('keyword'))
                <em class="invalid-feedback">
                    {{ $errors->first('keyword') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.setting.fields.keyword_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('logo') ? 'has-error' : '' }}">
                <label for="photo" required>{{ trans('cruds.setting.fields.logo') }}*</label>
                <div class="input-group">
                    <span class="input-group-btn">
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="fa fa-picture-o"></i> Choose
                        </a>
                    </span>
                    <input id="thumbnail" class="form-control" type="text" name="logo" value="{{ old('logo', isset($setting) ? $setting->logo : '') }}">
                </div>
                <img id="holder" style="margin-top:15px;max-height:100px;"/>
                @if($errors->has('logo'))
                <em class="invalid-feedback">
                    {{ $errors->first('logo') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.setting.fields.logo_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('contact') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.setting.fields.contact') }}*</label>
                <textarea id="contact" name="contact" class="form-control">{!! old('contact', isset($setting) ? $setting->contact : '')!!}</textarea>
                @if($errors->has('contact'))
                <em class="invalid-feedback">
                    {{ $errors->first('contact') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.setting.fields.contact_helper') }}
                </p>
            </div>
            <div>
            <input type="hidden" id="id" name="id" class="form-control" value="{{ old('id', isset($setting) ? $setting->id : '') }}">
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection

@section('scripts')

<script>
  var editor_config = {
    path_absolute : "/",
    selector: "#contact",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }
      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };
  tinymce.init(editor_config);
</script>
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
<script>
    $('#lfm').filemanager('image');
</script>
@endsection