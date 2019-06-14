<?php

namespace App\Http\Controllers\Fontend;

use App\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Session;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts=Account::orderBy('id','desc')->where('user_id',auth()->user()->id)->get();
        return view('fontend.account.index',compact('accounts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fontend.account.create');
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
            'transaction_id'=>'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $input=$request->all();
        $input['user_id']= auth()->user()->id;
        try{

            Account::create($input);
            session::flash('success','You have successfully deposited');

            return redirect('account/create');
        }catch (Exception $e){
            session::flash('error','Your deposit Failed');
            return redirect('account/create');
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
        $account=Account::findOrFail($id);
        $account->delete();
        return redirect('/account')->with('success','Your history  delete success.');
    }
}
