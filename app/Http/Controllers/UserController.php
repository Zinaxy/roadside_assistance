<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Password;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.users.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'role_id' => ['required'],
            'dob' => ['required', 'date', 'before:01/01/2015'],
            'phone' => ['required', 'string', 'max:255'],
            'inter_id' => ['required', 'string', 'max:255','unique:'.User::class],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $user = new User;

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->dob = $request->dob;
        $user->inter_id = $request->inter_id;
        $user->occupation = $request->occupation;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        $user->addRole($request->role_id);

        return redirect()->back()->with('status','User Registered Successfull');
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
        //
    }
}
