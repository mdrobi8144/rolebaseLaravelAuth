<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('dashboard.reviewer.index');
    }

    public function profile(){
        return view('dashboard.reviewer.profile');
    }
    
    public function settings(){
        return view('dashboard.reviewer.settings');
    }
}
