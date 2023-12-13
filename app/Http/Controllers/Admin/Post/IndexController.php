<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    private $perPage = 20;

    public function __invoke()
    {
        $posts = Post::orderBy('title', 'asc')->paginate($this->perPage);

        return view('admin.posts.index', compact('posts'));
    }
}
