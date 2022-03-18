<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Introduction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IntroductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cms.intro.index', ['intro' => Introduction::query()->first()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formData = $request->except(['_token, _method']);

        $valid = Validator::make($formData, [
            'description' => ['required']
        ]);

        if ($valid->fails()) {
            return redirect()->back()->withErrors($valid)->withInput();
        }

        Introduction::updateOrCreate(
            ['id' => $request->intro_id],
            [
                'description' => $request->description,
                'video' => ''
            ]
        );

        return redirect()->route('cms.introduction.index');
    }
}
