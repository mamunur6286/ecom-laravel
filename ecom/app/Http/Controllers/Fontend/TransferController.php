<?php

namespace App\Http\Controllers\Fontend;

use App\Transfer;
use App\User;
use App\Withdraw;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Session;
use Validator;
class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transfers=Transfer::orderBy('id','desc')->get();
        return view('fontend.transfer.index',compact('transfers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fontend.transfer.create');
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
        if (password_verify($request->password,Auth::user()->getAuthPassword() )) {

            $input=$request->all();
            try{

                $receiver_user=User::where('mobile',$request->mobile)->first();

                if($receiver_user){

                    $user=User::where('id',Auth::user()->id)->first();
                    $user_wallet=$user->wallet-$request->amount;

                    $receiver_wallet=$receiver_user->wallet+$request->amount;

                    if($user_wallet<0){
                        Session::flash('error','Insufficient Balance');
                        return redirect()->back();
                    }else{
                        $user->update(['wallet'=>$user_wallet]);
                        $receiver_user->update(['wallet'=>$receiver_wallet]);

                        Transfer::create($input);

                        Session::flash('success','Your transaction confirm Success');
                        return redirect()->back();
                    }
                }else{
                    Session::flash('error','User not found');
                    return redirect()->back();
                }


            }catch (Exception $e){
                session::flash('error','Your transfer Failed');
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
        //
    }
}
