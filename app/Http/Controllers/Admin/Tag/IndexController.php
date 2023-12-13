<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class IndexController extends Controller
{
    private $perPage = 20;

    public function __invoke()
    {
        $tags = Tag::orderBy('title', 'asc')->paginate($this->perPage);

        return view('admin.tag.index', compact('tags'));
    }
}
