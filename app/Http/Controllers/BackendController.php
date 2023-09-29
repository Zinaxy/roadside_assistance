<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BackendController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('user') || Auth::user()->hasRole('mechanic')) {
            return view('dashboard',[
           'users' => User::latest()->get()
        ]);
        } else {
            return view('backend.index',[
           'users' => User::latest()->get()
        ]);
        }

    }
    public function customer()
    {
        return view('backend.users.customer',[
           'customers' => User::latest()->get()
        ]);
    }

    public function mechanic()
    {
        return view('backend.users.mechanic',[
            'techs' => User::latest()->get()
        ]);
    }

    public function admin()
    {
        return view('backend.users.admin',[
            'admins' => User::latest()->get()
        ]);
    }
}
