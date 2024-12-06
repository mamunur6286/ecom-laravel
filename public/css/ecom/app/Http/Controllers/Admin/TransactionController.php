<?php

namespace App\Http\Controllers\Admin;

use App\Account;
use App\Setting;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Session;
class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions=Account::with('user')->orderBy('id','desc')->where('status',0)->get();
        return view('admin.transaction.pending',compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $transactions=Account::with('user')->orderBy('id','desc')->where('status',1)->get();
        return view('admin.transaction.success',compact('transactions'));
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
        $setting=Setting::where('id',1)->first();

        $transaction=Account::findOrFail($id);
        $user_id=$transaction->user_id;
        $user=User::where('id',$user_id)->first();

        if($user->verify==0){
            $user_wallet=($user->wallet+$transaction->amount)-$setting->active_amount;
            if($user_wallet>0){
                $user->verify=1;
                $user->save();
            }
        }else{
            $user_wallet=$user->wallet+$transaction->amount;

        }

        $user->update(['wallet'=>$user_wallet]);
        $transaction->update(['status'=>1]);
        Session::flash('success','Your transaction confirm Success');
        return redirect('/admin-transaction');
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
        $account=Account::findOrFail($id);
        $account->delete();
        return redirect('/admin-transaction/create')->with('success','Your Transaction delete success');
    }
}
