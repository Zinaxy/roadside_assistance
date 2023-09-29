<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehicle;
use App\Models\Feedback;
use App\Models\MyRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->hasRole('user')) {
            return view('pages.requests.index',[
            'requests'=>MyRequest::where('user_id', Auth::user()->id)->latest()->get(),
            'vehicles'=>Vehicle::where('user_id', Auth::user()->id)->latest()->get(),
        ]);
        } else {

            return view('backend.requests.index',[
            'requests'=>MyRequest::latest()->get()
        ]);

        }
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
        $request->validateWithBag('newRequest',[
        'ass_type'=>['required'],
        'vehicle_id'=>['required'],
        'province'=>['required','string','max:100'],
        //'place'=>['required','string','max:100'],
       // 'latitude'=>['required','string','max:100'],
        //'longitude'=>['required','string','max:100'],
        //'status'=>['required','string','max:100'],
        'description'=>['required','string','max:500'],
        ]);

        $myrequest = new MyRequest;

        $myrequest->user_id = Auth::user()->id;

        $myrequest->ass_type = $request->ass_type;
        $myrequest->vehicle_id = $request->vehicle_id;
        $myrequest->province = $request->province;
        $myrequest->place = $request->place;
        $myrequest->latitude = $request->latitude;
        $myrequest->longitude = $request->longitude;
        $myrequest->description = $request->description;

        $myrequest->save();

        return redirect()->back()->with('status','New Request created Successfull');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (Auth::user()->hasRole('user')) {
            return view('pages.requests.show',[
                'myrequest'=> MyRequest::findorfail($id),
            'requests'=>MyRequest::where('user_id', Auth::user()->id)->latest()->get(),
            'feedbacks' => Feedback::where('request_id',$id)->orderby('created_at')->limit(1)->get()
        ]);
        } else {

            return view('backend.requests.show',[
            'myrequest'=> MyRequest::findorfail($id),
            'requests'=>MyRequest::latest()->get(),
            'techs' => User::latest()->get(),
            'feedbacks' => Feedback::where('request_id',$id)->orderby('created_at')->limit(1)->get()
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
        $request = MyRequest::find($id);

        $request->status = $request->status;
        $request->update();
        return redirect()->back()->with('status','Duty Updated Successfull');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
