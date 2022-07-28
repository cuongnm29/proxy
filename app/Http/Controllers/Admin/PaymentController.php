<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Payment;
use App\Member;
use Gate;
use App\Http\Requests\Admin\UpdatePaymentRequest;
use App\Http\Requests\Admin\UpdateMemberRequest;
use Illuminate\Support\Facades\Session;
class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('payment_manage')) {
            return abort(401);
        }
        $payments = Payment::get();

        return view('admin.payment.index', compact('payments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        if (! Gate::allows('payment_manage')) {
            return abort(401);
        }
        return view('admin.payment.edit', compact( 'payment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaymentRequest $request, UpdateMemberRequest $reqmember,Payment $payment)
    {
        if (! Gate::allows('payment_manage')) {
            return abort(401);
        }
        $members=Session::get('member');
        $request['status']= 1 ;
        $request['method']= 1 ;
        $request['memberid']=$payment->memberid;
        $payment->update($request->all());

        $members = Member::where('id',$payment->memberid)->first();
        $reqmember['point']= $members->point + $payment->money;
        $members->update($reqmember->all());
        return redirect()->route('admin.payment.index');
    }

   
   
}
