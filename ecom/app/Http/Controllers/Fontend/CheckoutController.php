<?php

namespace App\Http\Controllers\Fontend;

use App\Order;
use App\OrderDetails;
use App\User;
use Cart;
use Psy\Input\CodeArgument;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::findOrFail(Auth::user()->id);

         $orders=$user->orders;
        return view('fontend.checkout.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fontend.checkout.checkout');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Cart::count()==0){
            session()->flash('error','You have no product in your cart.');
            return redirect('/');
        }

        $validator=Validator::make($request->all(),[
            'name'=>'required',
            'mobile'=>'required',

            'address'=>'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $input=$request->all();
        try{

            $input['user_id']=Auth::user()->id;
             $details_id=OrderDetails::create($input)->id;

             foreach (Cart::content() as $cart){
                 Order::insert([
                     'user_id'=>Auth::user()->id,
                     'order_details_id'=>$details_id,
                     'product_name'=>$cart->name,
                     'image'=>$cart->options->image,
                     'price'=>$cart->price,
                     'qnty'=>$cart->qty,
                     'subtotal'=>$cart->subtotal,
                 ]);
             }
            $user=User::findOrFail(Auth::user()->id);
            $wallet=$user->wallet;

            if(Cart::total()>$wallet){
                session()->flash('error','Insufficient Balance!');
                return redirect('/checkout/create');
            }else{
                $now_balance=$wallet-Cart::total();
                $user->update(['wallet'=>$now_balance]);
            }
            Cart::destroy();

            session()->flash('success','Your checkout success.');
            return redirect('/');

        }catch (\Exception $e){
            session()->flash('error','Your checkout failed.');
            return redirect('/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function destroy($id)
    {
        $order=Order::findOrFail($id);
        $details_id=$order->order_details_id;
        $orders=Order::where('order_details_id',$details_id)->get();
        foreach ($orders as $order) {
            $order->delete();
        }
        OrderDetails::find($details_id)->delete();
        return redirect('/checkout')->with('success','Your Order  delete success.');
    }
}
