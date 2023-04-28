<?php

namespace App\Http\Controllers;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('getHome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::findOrFail($user_id);
        $data = [
            'posts' => $user->posts,
            'media' => $user->media,
        ];
        return view('home')->with($data);
    }

    public function getHome()
    {
        $title = "Home";
        if (Auth()->user()) {
            return redirect('/home');
        }
        return view('welcome', ['title' => $title]);
    }
}
