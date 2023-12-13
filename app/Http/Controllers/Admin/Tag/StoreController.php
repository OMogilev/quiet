<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\StoreRequest;
use App\Models\Tag;
use Illuminate\Support\Str;

class StoreController extends Controller
{

    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);

        if( Tag::where('slug', $data['slug'])->count() > 0 ) {
            return back()->withErrors('К сожалению, тег с таким url адресом уже есть');
        }

        $tag = Tag::create($data);

        return redirect()->route('admin.tags.edit', ['tag' => $tag->id]);
    }
}
