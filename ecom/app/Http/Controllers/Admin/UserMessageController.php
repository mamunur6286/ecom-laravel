<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\userMessage;
use Validator;
use Session;
class UserMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $messages =userMessage::orderBy('id','desc')->get();
        return view('admin.message.index',compact('messages'));
    }

    public function messageList($id)
    {
        $messages=User::findOrFail($id)->userM;
        return view('fontend.contact.user_message',compact('messages'));
    }

    public function showMessage($id)
    {

        $msg= userMessage::where('id',$id)->first();
        $contact= userMessage::findOrFail($id);
        $contact->status=1;
        $contact->save();

        $message=userMessage::findOrFail($id)->message;
        return view('fontend.contact.show',compact('message'));
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
        $validator=Validator::make($request->all(),[
            'message'=>'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $input=$request->all();

        try{

            UserMessage::create($input);
            session::flash('success','Your message send success');

            return redirect()->back();
        }catch (Exception $e){
            session::flash('error','Your message  send failed');
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
        return view('admin.user.send_message',compact('id',$id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $msg= userMessage::where('id',$id)->first();
        

        return view('admin.message.view',compact('msg'));
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
         $contact = userMessage::findOrFail($id);
        $contact->delete();
        session()->flash('success', 'Your message  delete success.');
        return redirect()->back();
    }
}
