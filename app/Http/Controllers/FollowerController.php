<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class FollowerController extends Controller
{
    
    public function store(User $user)
    {

        $user->followers()->attach( auth()->user()->id);

        return back();
    }

    

    public function destroy(User $user)
    {

        $user->followers()->detach( auth()->user()->id);

        return back();
    }

}
