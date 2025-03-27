<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    use \Illuminate\Foundation\Auth\Access\AuthorizesRequests, 
        \Illuminate\Foundation\Bus\DispatchesJobs, 
        \Illuminate\Foundation\Validation\ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke()

    {
        //Obtener a quienes seguimos
        $ids = auth()->user()->followings->pluck('id')->toArray();
        $post = Post::whereIn('user_id', $ids)->latest()->paginate(20);

        return view('home',[
            'posts'=> $post
        ]);
    }
}
