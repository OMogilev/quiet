<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Support\Str;

class StoreController extends Controller
{

    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);

        if( Post::where('slug', $data['slug'])->count() > 0 ) {
            return back()->withErrors('К сожалению, запись с таким url адресом уже есть');
        }

        $post = Post::create($data);
        return view('admin.posts.index', ['id', $post->id]);
    }
}
