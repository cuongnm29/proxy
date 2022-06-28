<?php

namespace App\Http\Controllers\Admin;


use App\Server;
use App\Services;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyServerRequest;
use App\Http\Requests\Admin\StoreServerRequest;
use App\Http\Requests\Admin\UpdateServerRequest;
use Gate;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servers = Server::get();  
        return view('admin.server.index', compact('servers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('server_manage')) {
            return abort(401);
        }
        $services = Services::tree();
        return view('admin.server.create',compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServerRequest $request)
    {
        Server::create($request->all());
        return redirect()->route('admin.server.index');
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Server $server)
    {
        if (! Gate::allows('server_manage')) {
            return abort(401);
        }
        $services = Services::tree();
        return view('admin.server.edit', compact( 'server','services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServerRequest $request, Server $server)
    {
        $server->update($request->all());

        return redirect()->route('admin.server.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Server $server)
    {
        if (! Gate::allows('server_manage')) {
            return abort(401);
        }

        $server->delete();
        return back();
    }
    /**
     * Delete all selected Services at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('server_manage')) {
            return abort(401);
        }
        Server::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
}
