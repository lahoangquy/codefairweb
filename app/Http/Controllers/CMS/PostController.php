<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function list($postType)
    {
        $posts = Post::query()->type([$postType])->get();
        
        return view('cms.posts.lists', ['posts' => $posts, 'postType' => $postType]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($postType)
    {
        return view('cms.posts.create', ['postType' => $postType]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $postType)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Post::create($request->except(['_token', 'files']));

        return redirect()->route('cms.post.category', [$postType]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($postType, $id)
    {
        return view('cms.posts.edit', [
            'post' => Post::find($id),
            'postType' => $postType
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $postType, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $post = Post::find($id);
        $post->update($request->except(['_token', 'files', '_method']));

        return redirect()->route('cms.post.category', [$postType]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($postType, $id)
    {
        Post::destroy($id);

        return redirect()->route('cms.post.category', [$postType]);
    }
}
