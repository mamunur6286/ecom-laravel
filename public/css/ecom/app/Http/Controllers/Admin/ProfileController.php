<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;
use Session;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $admin_profile=User::findOrFail(Auth::user()->id);
        return view('admin.profile.profile',compact('admin_profile'));
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
        $user=User::findOrFail($id);


        $input=$request->all();


        if(empty($request->image)){
            $validator=Validator::make($request->all(),[
                'name'=>'required',
                'mobile'=>'required',
                'email'=>'required',
            ]);

            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }

            try{

                $input['image']=$user->image;
                $user->update($input);
                session()->flash('success','Your profile update success.');
                return redirect()->back();

            }catch (\Exception $e){
                session()->flash('error','Your category update failed.');
                return redirect()->back();
            }
        }else{
            $validator=Validator::make($request->all(),[
                'name'=>'required',
                'mobile'=>'required',
                'email'=>'required',
            ]);


            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }
            if ($request->hasFile('image')) {
                $file=$request->file('image');
                $fileType=$file->getClientOriginalExtension();
                $fileName="user_".rand(1,1000).date('dmyhis').".".$fileType;
                /*$fileName=$file->getClientOriginalName();*/
                $file->move('users',$fileName);
                $input['image']='users/'.$fileName;
            }
            try{


                $user->update($input);
                session()->flash('success','Your profile update success.');
                return redirect()->back();

            }catch (\Exception $e){
                session()->flash('error','Your profile update failed.');
                return redirect()->back();
            }
        }

    }

    public function passwordUpdate(Request $request,$id)
    {
        $validator=Validator::make($request->all(),[
            'old_password'=>'required|min:6' ,
            'new_password'=>'required|min:6' ,
            'confirm_password'=>'required|min:6|same:new_password' ,
        ]);


        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $admin=User::findOrFail($id);
        if(password_verify($request->old_password,$admin->password)){
            User::findOrFail($id)->update([
                'password'=>bcrypt($request->new_password),
            ]);
            session()->flash("success","Your password changed.");
            return redirect()->back();
        }else{

            session()->flash("error","Your old password was incorrect.");
            return redirect()->back();
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
        //
    }
}
