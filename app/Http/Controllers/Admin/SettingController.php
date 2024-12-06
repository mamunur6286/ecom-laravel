<?php

namespace App\Http\Controllers\Admin;

use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings= Setting::orderBy('id','desc')->get();
        return view('admin.setting.index',compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $settings= Setting::orderBy('id','desc')->get();
        return view('admin.setting.index',compact('settings'));
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
        $setting=Setting::where('id',$id)->orderBy('id','desc')->first();
        return view('admin.setting.setting',compact('setting'));

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


        $setting=Setting::findOrFail($id);

        $input=$request->all();


        if(empty($request->header_logo) || empty($request->banner)){
            $validator=Validator::make($request->all(),[
                'address'=>'required',
                'email'=>'required',
                'mobile'=>'required',
                'bkash_no'=>'required'

            ]);

            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }

            try{

                $input['header_logo']=$setting->header_logo;
                $input['banner']=$setting->banner;
                $setting->update($input);
                session()->flash('success','Your setting update success.');
                return redirect('/setting/create');

            }catch (\Exception $e){
                session()->flash('error','Your setting update failed.');
                return redirect('/setting/create');
            }
        }else{
            $validator=Validator::make($request->all(),[
                'header_logo'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'banner'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }
            if ($request->hasFile('banner')) {
                $file=$request->file('banner');
                $fileType=$file->getClientOriginalExtension();
                $fileName="sett_".rand(1,1000).date('dmyhis').".".$fileType;
                /*$fileName=$file->getClientOriginalName();*/
                $file->move('setting',$fileName);
                $input['banner']='setting/'.$fileName;
            }
            if ($request->hasFile('header_logo')) {
                $file=$request->file('header_logo');
                $fileType=$file->getClientOriginalExtension();
                $fileName="settt_".rand(1,1000).date('dmyhis').".".$fileType;
                /*$fileName=$file->getClientOriginalName();*/
                $file->move('setting',$fileName);
                $input['header_logo']='setting/'.$fileName;
            }
            try{
                if($setting->banner){
                    unlink($setting->banner);
                }
                if($setting->header_logo){
                    unlink($setting->header_logo);
                }
                $setting->update($input);
                session()->flash('success','Your setting update success.');
                return redirect('/setting/create');

            }catch (\Exception $e){
                session()->flash('error','Your setting update failed.');
                return redirect('/setting/create');
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
        $setting=Setting::findOrFail($id);
        if($setting->image){
            unlink($setting->image);
        }
        $setting->delete();
        return redirect('/setting/create')->with('success','Your setting  delete success.');
    }
}
