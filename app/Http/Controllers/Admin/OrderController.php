<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\OrderDetails;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=Order::with('user','biiAddress')->orderBy('id','desc')->where('status',0)->get();
        return view('admin.order.pending',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders=Order::with('user','biiAddress')->orderBy('id','desc')->where('status',1)->get();
        return view('admin.order.success',compact('orders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function successOrder($id)
    {
        $order= Order::findOrFail($id);
        $order->update(['status'=>1]);
        Session::flash('success','Your order confirm success');
        return redirect('/admin-order/create');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $details= OrderDetails::where('id',$id)->first();
        return view('admin.order.orderDetails',compact('details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $details= OrderDetails::find($id);
        return view('admin.order.orderDetails',compact('details'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pendingDestroy($id)
    {
        $order=Order::findOrFail($id);
        $user_id=$order->user_id;
        $user=User::where('id',$user_id)->first();
        $amount=$order->subtotal+$user->wallet;
        $user->update(['wallet'=>$amount]);
        $order->delete();
        return redirect('/admin-order/create')->with('success','Your order delete success');
    }
    public function destroy($id)
    {
        $order=Order::findOrFail($id);
        $order->delete();
        return redirect('/admin-order/create')->with('success','Your order delete success');
    }
}
