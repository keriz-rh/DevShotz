<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function store()
    {
        \Illuminate\Support\Facades\Auth::logout();
        return redirect()->route('login');
    }
}
