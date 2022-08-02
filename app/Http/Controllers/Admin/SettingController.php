<?php

namespace App\Http\Controllers\Admin;

use App\Setting;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSettingRequest;

use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();  
        return view('admin.setting.index', compact('setting'));
    }
    public static   function store(StoreSettingRequest $request)
    {
        if (! Gate::allows('setting_manage')) {
            return abort(401);
        }
        $row = Setting::find($request['id']);
        if($row==null)
        {
                Setting::create($request->all());
        }
        else{
            $row->update($request->all());
        }
        return redirect()->route('admin.setting.index');
    }
}
