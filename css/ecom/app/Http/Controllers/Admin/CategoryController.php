<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Validator;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::orderBy('id','desc')->get();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'category_name'=>'required|unique:categories',
            'image'=>'required'
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
            $file->move('categories',$fileName);
            $input['image']='categories/'.$fileName;
        }
        try{
            $input['slug']=Str::slug($request->category_name);
            Category::create($input);
            session()->flash('success','Your category added success.');
            return redirect('admin-categories');

        }catch (\Exception $e){
            session()->flash('error','Your category added failed.');
            return redirect('admin-categories');
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
        $category= Category::findOrFail($id);
        return view('admin.category.edit',compact('category'));
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


        $category=Category::findOrFail($id);

        $input=$request->all();

        $products=Product::where('slug',$category->slug)->get();
        $slug=Str::slug($request->category_name);

        if($products){
            foreach ($products as $product){
                $product->update(['slug'=>$slug]);
            }
        }


        if(empty($request->image)){
            $validator=Validator::make($request->all(),[
                'category_name'=>'required'
            ]);

            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }

            try{

                $input['slug']=Str::slug($request->category_name);
                $input['image']=$category->image;
                $category->update($input);
                session()->flash('success','Your category update success.');
                return redirect('admin-categories');

            }catch (\Exception $e){
                session()->flash('error','Your category update failed.');
                return redirect('admin-categories');
            }
        }else{
            $validator=Validator::make($request->all(),[
                'category_name'=>'required',
                'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }
            if ($request->hasFile('image')) {
                $file=$request->file('image');
                $fileType=$file->getClientOriginalExtension();
                $fileName="pro_".rand(1,1000).date('dmyhis').".".$fileType;
                /*$fileName=$file->getClientOriginalName();*/
                $file->move('categories',$fileName);
                $input['image']='categories/'.$fileName;
            }
            try{
                $input['slug']=Str::slug($request->category_name);
                if($category->image){
                    unlink($category->image);
                }
                $category->update($input);
                session()->flash('success','Your category update success.');
                return redirect('admin-categories');

            }catch (\Exception $e){
                session()->flash('error','Your category update failed.');
                return redirect('admin-categories');
            }
        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::findOrFail($id);
        $category->delete();
        return redirect('/admin-categories')->with('success','Your category  delete success.');
    }
}
