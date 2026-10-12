<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class MyPostsController extends Controller
{
    public function index()
    {
        $requests = Auth::user()
            ->bloodRequests()
            ->orderByDesc('created_at')
            ->get();

        return view('my-posts', ['requests' => $requests]);
    }
}
