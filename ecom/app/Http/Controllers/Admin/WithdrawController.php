<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Withdraw;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $withdraws=Withdraw::with('user')->orderBy('id','desc')->where('status',0)->get();
        return view('admin.withdraw.pending',compact('withdraws'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $withdraws=Withdraw::with('user')->orderBy('id','desc')->where('status',1)->get();
        return view('admin.withdraw.success',compact('withdraws'));
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
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $withdraw=Withdraw::findOrFail($id);
        $user_id=$withdraw->user_id;
        $user=User::where('id',$user_id)->first();


        $user_wallet=$user->wallet-$withdraw->amount;
        if($user_wallet<0){
            session::flash('error','Insufficient Balance');
            return redirect()->back();
        }


        $user->update(['wallet'=>$user_wallet]);
        $withdraw->update(['status'=>1]);
        Session::flash('success','Your withdraw confirm Success');
        return redirect()->back();
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
        Session::flash('success','Your Transaction delete success');
        return redirect()->back();
    }
}
