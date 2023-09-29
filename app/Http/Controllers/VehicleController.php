<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->hasRole('user')) {
            return view('pages.vehicles.index',[
            'vehicles'=>Vehicle::where('user_id', Auth::user()->id)->latest()->get()
        ]);
        } else {

            return view('backend.vehicles.index',[
            'vehicles'=>Vehicle::latest()->get()
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
       $request->validateWithBag('newVehicle',[
            'make'=>['required','string','max:100'],
            'model'=>['required','string','max:100'],
            'reg_number'=>['required','unique:vehicles'],
            'status'=>['required','string','max:100'],
        ]);

        $vehicle = new Vehicle;

        $vehicle->user_id = Auth::user()->id;
        $vehicle->make = $request->make;
        $vehicle->model = $request->model;
        $vehicle->reg_number = $request->reg_number;
        $vehicle->status = $request->status;

        $vehicle->save();

        return redirect()->back()->with('status','New Vehicle created Successfull');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        $vehicle = Vehicle::findorfail($id);

        $vehicle->delete();

        return redirect()->back()->with('error','Vehicle Deleted Successfull');

    }
}
