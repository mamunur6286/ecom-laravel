<?php

namespace App\Http\Controllers\Fontend;

use App\User;
use App\Withdraw;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;
use Session;
class WithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $withdraws=Withdraw::orderBy('id','desc')->where('user_id',auth()->user()->id)->get();
        return view('fontend.withdraw.index',compact('withdraws'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fontend.withdraw.create');

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
            'mobile'=>'required|numeric',
            'amount'=>'required|numeric',
            'password'=>'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if (password_verify($request->password,Auth::user()->getAuthPassword() ))
        {


                $user=User::where('id',Auth::user()->id)->first();
            $wallet=$user->wallet-$request->amount;
            if($wallet<0){
                session::flash('error','Insufficient Balance');

                return redirect()->back();
            }

            $input=$request->all();
            $input['user_id']= auth()->user()->id;
            try{

                Withdraw::create($input);
                session::flash('success','You have successfully withdrawn');

                return redirect()->back();
            }catch (Exception $e){
                session::flash('error','Your deposit Failed');
                return redirect()->back();
            }
        }else{
            session::flash('error','Your password incorrect');
            return redirect()->back();
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
        $account=Withdraw::findOrFail($id);
        $account->delete();
        return redirect('/fontend-transfer')->with('success','Your history  delete success.');
    }
}
