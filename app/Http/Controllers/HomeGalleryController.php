<?php

namespace App\Http\Controllers;

use App\Gallery;

class HomeGalleryController extends Controller
{
    public function index()
    {
        return view('front-end.gallery', [
            'galleries' => Gallery::query()->active()->orderBy('created_at', 'desc')->get()
        ]);
    }
}
