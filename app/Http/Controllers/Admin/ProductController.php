<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\Category;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products= Product::with('category')->orderBy('id','desc')->get();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_select=Category::pluck('category_name','slug');
        return view('admin.product.create',compact('category_select'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'product_name'=>'required|unique:products',
            'image'=>'required',
            'retail_price'=>'required',
            'wholesale_price'=>'required',
            'wholesale_qnty'=>'required',
            'description'=>'required',
            'unit'=>'required',
            'slug'=>'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $input=$request->all();
        if ($request->hasFile('image')) {
            $file=$request->file('image');
            $fileType=$file->getClientOriginalExtension();
            $fileName="pro_".rand(1,1000).date('dmyhis').".".$fileType;
            /*$fileName=$file->getClientOriginalName();*/
            $file->move('products',$fileName);
            $input['image']='products/'.$fileName;
        }
        try{

            Product::create($input);
            session::flash('success','Your product added success');

            return redirect('/admin-products');
        }catch (Exception $e){
            session::flash('error','Your product added Failed');
            return redirect('/admin-products');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product,$id)
    {
        $category_select=Category::pluck('category_name','slug');

        $product= Product::findOrFail($id);
        return view('admin.product.edit',compact('product','category_select'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product= Product::findOrFail($id);
        if(empty($request->image)){
            $validator=Validator::make($request->all(),[
                'product_name'=>'required',
                'retail_price'=>'required',
                'wholesale_price'=>'required',
                'wholesale_qnty'=>'required',
                'description'=>'required',
                'unit'=>'required',
                'slug'=>'required'
            ]);

            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $input=$request->all();
            $input['image']=$product->image;

            try{

                $product->update($input);
                session::flash('success','Your product update success');

                return redirect('/admin-products');
            }catch (Exception $e){
                session::flash('error','Your product update Failed');
                return redirect('/admin-products');
            }
        }else{
            $validator=Validator::make($request->all(),[
                'product_name'=>'required',
                'image'=>'required',
                'retail_price'=>'required',
                'wholesale_price'=>'required',
                'wholesale_qnty'=>'required',
                'description'=>'required',
                'unit'=>'required',
                'slug'=>'required'
            ]);

            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $input=$request->all();
            if ($request->hasFile('image')) {
                $file=$request->file('image');
                $fileType=$file->getClientOriginalExtension();
                $fileName="pro_".rand(1,1000).date('dmyhis').".".$fileType;
                /*$fileName=$file->getClientOriginalName();*/
                $file->move('products',$fileName);
                $input['image']='products/'.$fileName;
            }
            try{
                if($product->image){
                    unlink($product->image);
                }
                $product->update($input);
                session::flash('success','Your product update success');

                return redirect('/admin-products');
            }catch (Exception $e){
                session::flash('error','Your product update Failed');
                return redirect('/admin-products');
            }
        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::findOrFail($id);
        if($product->image){
           // unlink($product->image);
        }
        //$product->delete();
        return redirect('/admin-products')->with('success','Your product  delete success.');
    }
}
