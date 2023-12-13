<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    private $perPage = 20;

    public function __invoke()
    {
//        $categories = Category::withCount('posts')->orderBy('name', 'asc')->paginate($this->perPage);
        $categories = Category::orderBy('title', 'asc')->paginate($this->perPage);

        return view('admin.category.index', compact('categories'));
    }
}
