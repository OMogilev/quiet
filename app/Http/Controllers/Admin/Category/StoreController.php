<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Models\Category;
use Illuminate\Support\Str;

class StoreController extends Controller
{

    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);

        if( Category::where('slug', $data['slug'])->count() > 0 ) {
            return back()->withErrors('К сожалению, категория с таким url адресом уже есть');
        }

        $category = Category::create($data);
        return view('admin.category.index', ['id', $category->id]);
    }
}
