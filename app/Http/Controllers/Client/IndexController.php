<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
      //  $posts = Post::where('published_at', '<=', Carbon::now())->where('active', 1)->paginate(6);
$posts = '';
        return view('client.home.index', compact('posts'));
    }
}
