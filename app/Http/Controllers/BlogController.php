<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::orderBy('id', 'DESC')->simplePaginate(8);
        return view('blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'blog_text' => 'required',
            'img' => 'required',
            'type' => 'required',
            'title' => 'required',
            'quote' => 'required',
        ]);

        if ($request->file('img')) {
            $img = $request->file('img');
            $img_name = date('YmdHi') . $img->getClientOriginalName();
            $img->move(public_path('public/image/blog'), $img_name);
        }

        $today_date = date('Y-M-d');

        $data = [
            'title' => $request->input('title'),
            'quote' => $request->input('quote'),
            'type' => $request->input('type'),
            'text' => $request->input('blog_text'),
            'date' => $today_date,
            'img' => $img_name,
        ];

        $blog = Blog::create($data);

        return redirect()->route('blogs.index')
            ->with('success', 'new blog added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\blog $blog
     * @return \Illuminate\Http\Response
     */
    public function show(blog $blog)
    {
        $blogs = Blog::find($blog->id);
        return view('blog.show', compact('blogs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\blog $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(blog $blog)
    {
        $blogs = Blog::find($blog)[0];
        return view('blog.edit', compact('blogs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\blog $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, blog $blog)
    {

        $this->validate($request, [
            'blog_text' => 'required',
            'type' => 'required',
            'title' => 'required',
            'quote' => 'required',
        ]);

        $img_name = $blog->img;

        if ($request->file('img')) {
            $img = $request->file('img');
            $img_name = date('YmdHi') . $img->getClientOriginalName();
            $img->move(public_path('public/image/blog'), $img_name);
        }


        $data = [
            'title' => $request->input('title'),
            'quote' => $request->input('quote'),
            'type' => $request->input('type'),
            'text' => $request->input('blog_text'),
            'img' => $img_name,
        ];

        Blog::where('id', $blog->id)
            ->update($data);

        return redirect()->route('blogs.index')
            ->with('success', 'blog updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\blog $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(blog $blog)
    {
        return redirect()->route('blogs.index')
            ->with('unsuccess', "couldn't delete, please try agian");
    }
}
