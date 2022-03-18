<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Resource;
use App\ResourceTopic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = ResourceTopic::withCount('resources')->get();

        return view('cms.resources.index', [
            'topics' => $topics
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formData = $request->except('_token');

        $validator = Validator::make($formData, [
            'name' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        ResourceTopic::create($formData);

        return redirect()->route('cms.resources.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeResource(Request $request)
    {
        $formData = $request->except('_token');

        $validator = Validator::make($formData, [
            'title' => ['required'],
            'link' => ['required', 'url'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Resource::create($formData);

        return redirect()->route('cms.resources.show', [$request->topic_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $topic = ResourceTopic::find($id);
        $topic->load('resources');

        return view('cms.resources.resource-in-topic', ['topic' => $topic]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $topic  = ResourceTopic::find($id);
        
        if ($topic) {
            $topic->delete();

            return redirect()->route('cms.resources.index');
        }
    }

    public function deleteResource($topic, $id)
    {
        $resource = Resource::find($id);

        if ($resource) {
            $resource->delete();

            return redirect()->route('cms.resources.show', [$topic]);
        }
    }
}
