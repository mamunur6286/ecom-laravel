<?php

namespace App\Http\Controllers\Fontend;

use App\Setting;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mockery\Exception;
use Validator;
use Session;
use Illuminate\Support\Str;


class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegister()
    {
        return view('fontend.register.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required|min:6',
            'mobile'=>'required|unique:users',
            'password' => 'required|min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password'=>'required|min:6'
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try{
            if ($request->hasFile('image')) {
                $file=$request->file('image');
                $fileType=$file->getClientOriginalExtension();
                $fileName="user_".rand(1,1000).date('dmyhis').".".$fileType;
                /*$fileName=$file->getClientOriginalName();*/
                $file->storeAs('users',$fileName);

            }
            $referal=rand(10,99).rand(10,99).rand(1000,9999);
            if($request->referal_id){
                $referal_user= User::where('own_referal_id',$request->referal_id)->firstOrFail();
                $user_wallet=$referal_user->wallet+Setting::first()->referal_amount;
                $referal_user->update(['wallet'=>$user_wallet]);
            }

            User::create([
                'name' =>$request->name,
                'mobile' =>$request->mobile,
                'email' =>$request->email,
                'own_referal_id'=>$referal,
                'uses_referal_id'=>$request->referal_id,
                'password' =>bcrypt($request->password),
                'image' =>'',
                'address' =>null,
                'bkash_no' =>null,
                'wallet'=>0,
                'roll' =>'2',
                'verify' =>'1',
                'verify_token' =>null,
                'email_verified_at' => now(),
                'remember_token' =>null,
            ]);


            session::flash('success','Your register success');
            return redirect('/fontend-register');
        }catch (Exception $e){
            session::flash('error','Your register fail');
            return redirect('/fontend-register');

        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


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
        //
    }
}
