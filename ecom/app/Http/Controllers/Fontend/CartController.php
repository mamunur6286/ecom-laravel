<?php

namespace App\Http\Controllers\Fontend;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
use Session;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::content();
        return view('fontend.cart.index',compact('carts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product=Product::findOrFail($request->id);

        $cart=Cart::content();
        foreach ($cart as $value){
            if($value->id==$request->id){

                session::flash('error','This product already added.');
                return redirect('/fontend-cart');
            }
        }

        Cart::add(['id' => $product->id, 'name' => $product->product_name, 'qty' => $request->qnty, 'price' =>$product->retail_price,'weight' => null,'options'=>['image' => $product->image]]);

        return redirect('/fontend-cart');
    }
     public function store2(Request $request)
    {
        $product=Product::findOrFail($request->id);

        if($product->wholesale_qnty > $request->qnty){
            session::flash('error','Please chose minimum quantity.');
            return redirect('/fontend-cart');
        }
        $cart=Cart::content();
        foreach ($cart as $value){
            if($value->id==$request->id){

                session::flash('error','This product already added.');
                return redirect('/fontend-cart');
            }
        }

        Cart::add(['id' => $product->id, 'name' => $product->product_name, 'qty' => $request->qnty, 'price' =>$product->wholesale_price,'weight' => null,'options'=>['image' => $product->image]]);

        return redirect('/fontend-cart');
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
        $qnty=$request->qnty;
        Cart::update($id,$qnty);
        return redirect('/fontend-cart');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        session::flash('success','Your cart  delete success.');
        return redirect('/fontend-cart');
    }
}
