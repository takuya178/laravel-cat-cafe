<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;

class AdminBlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view("admin.blogs.index", ['blogs' => $blogs]);
    }

    public function create()
    {
        return view("admin.blogs.create");
    }

    public function store(StoreBlogRequest $request)
    {
        $validated = $request->validated();
        $validated['image'] = $request->file('image')->store('blog', 'public');
        Blog::create($validated);

        return redirect('blog.index');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.edit', compact('blog'));
    }
}
