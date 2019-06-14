<?php

namespace App\Http\Controllers\Fontend;

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
        $user=User::Where('id',Auth::user()->id)->first();
        return view('fontend.profile.profile',compact('user'));
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
                return redirect('profile/create');

            }catch (\Exception $e){
                session()->flash('error','Your category update failed.');
                return redirect('admin-categories');
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
                if(!empty($user->image)){
                    unlink($user->image);
                }

                $user->update($input);
                session()->flash('success','Your profile update success.');
                return redirect('profile/create');

            }catch (\Exception $e){
                session()->flash('error','Your profile update failed.');
                return redirect('profile/create');
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
        //
    }
}
