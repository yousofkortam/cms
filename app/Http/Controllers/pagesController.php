<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function features() {
        $feat = ['Create post', 'Update post', 'Delete post', 'Upload media', 'Delete media'];
        return view('features', ['feat' => $feat, 'title' => "Feature"]);
    }

    public function about() {
        return view('about');
    }
}
