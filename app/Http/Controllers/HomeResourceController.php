<?php

namespace App\Http\Controllers;

use App\ResourceTopic;
use Illuminate\Http\Request;

class HomeResourceController extends Controller
{
    public function index()
    {
        $topics = ResourceTopic::withCount('resources')->get();

        return view('front-end.resources', ['topics' => $topics]);
    }
}
