<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reply;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->hasRole('user')) {
            return view('pages.messages.index',[
            'messages'=>Message::where('user_id', Auth::user()->id)->latest()->get(),
            'chats'=>Message::where('user_id', Auth::user()->id)->get()
        ]);
        } else {

            return view('backend.messages.index',[
            'users'=>User::latest()->get(),
            'chats'=>Message::where('user_id', Auth::user()->id)->get(),
        ]);

        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       User::truncate();
       return redirect()->back()->with('error','Chats Deleted');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validateWithBag('newMessage',[
            'message'=> ['required'],
        ]);

        $message = new Message;
        $message->user_id = $request->user_id;
        $message->from_id = $request->from_id;
        $message->message = $request->message;
        $message->save();

        return redirect()->back()->with('status','Message Sent');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (Auth::user()->hasRole('user')) {
            return view('pages.messages.show',[
             'user' => User::where('id',$id)->first(),
            'chats'=>Message::where('user_id', $id)->get(),
        ]);
        } else {

            return view('backend.messages.show',[
             'user' => User::where('id',$id)->first(),
             'customers' => User::latest()->get(),
            'chats'=>Message::where('user_id', $id)->get(),
        ]);

        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         Message::where('user_id', $id)->delete();


        return redirect()->back()->with('error','Chats Deleted');
    }
}
