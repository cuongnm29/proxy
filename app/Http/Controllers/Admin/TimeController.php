<?php

namespace App\Http\Controllers\Admin;

use App\time;
use App\Server;
use App\TimeHasServer;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTimeRequest;
use App\Http\Requests\Admin\UpdateTimeRequest;
use Gate;
use Illuminate\Http\Request;
class TimeController extends Controller
{
    public function index()
    {
        $times = time::get();  
        return view('admin.time.index', compact('times'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        if (! Gate::allows('time_manage')) {
            return abort(401);
        }
        $server = Server::get()->pluck('name', 'id');
        return view('admin.time.create',compact('server'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTimeRequest $request)
    {
        $input = $request->all();
        $servers = $input['serverid'];
       $time=  Time::create($request->all());
       $input['time_id']=$time->max('id');
       foreach($servers as $server)
       {
        $input['server_id'] = $server;
        TimeHasServer::create($input);
       }
      return redirect()->route('admin.time.index');
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Time $time)
    {
        if (! Gate::allows('time_manage')) {
            return abort(401);
        }
        $server = Server::get()->pluck('name', 'id');
        return view('admin.time.edit', compact( 'time','server'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTimeRequest $request, Time $time)
    {
        $input = $request->all();
        $servers = $input['serverid'];
        $time->update($request->all());
       TimeHasServer::where('time_id', $time->id)->delete();
        $input['time_id']=$time->id;
        foreach($servers as $server)
        {
            $input['server_id'] = $server;
            TimeHasServer::create($input);
        }
        return redirect()->route('admin.time.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(time $time)
    {
        if (! Gate::allows('time_manage')) {
            return abort(401);
        }

        $time->delete();
        TimeHasServer::where('time_id', $time->id)->delete();
        return back();
    }
     /**
     * Delete all selected Services at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('time_manage')) {
            return abort(401);
        }
       Time::whereIn('id', request('ids'))->delete();
       TimeHasServer::where('time_id', request('ids'))->delete();
        return response()->noContent();
    }
}
