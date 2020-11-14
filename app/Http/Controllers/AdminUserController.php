<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }
}
