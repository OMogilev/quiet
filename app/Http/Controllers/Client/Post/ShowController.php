<?php

namespace App\Http\Controllers\Client\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke()
    {
        return view('client.posts.index');
    }
}
