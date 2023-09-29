<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Feedback;
use App\Models\MyRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.technician.index',[
            'feedbacks'=> Feedback::where('user_id',Auth::user()->id)->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validateWithBag('dutyFeedback',[
        'user_id'=>['required'],
        'arrival_date'=>['required','date'],
        'arrival_time'=>['required','string','max:100'],
        'description'=>['required','string','max:500'],
        ]);

        $feedback = new Feedback;

        $feedback->user_id = $request->user_id;
        $feedback->request_id = $request->request_id;
        $feedback->arrival_date = $request->arrival_date;
        $feedback->arrival_time = $request->arrival_time;
        $feedback->description = $request->description;

        $feedback->save();

        return redirect()->back()->with('status','Feedback Send Successfull');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('backend.technician.show',[
            'myrequest'=> MyRequest::findorfail($id),
            'requests'=>MyRequest::latest()->get(),
            'techs' => User::latest()->get(),
            'feedbacks' => Feedback::where('request_id',$id)->orderby('created_at')->limit(1)->get()
        ]);
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
        //
    }
}
