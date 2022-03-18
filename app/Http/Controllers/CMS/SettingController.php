<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Settings;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('cms.setting.index');
    }

    /**
     * @param Request $request
     * @param Settings $settings
     * @return RedirectResponse
     */
    public function store(Request $request, Settings $settings): RedirectResponse
    {
        $settings->update(['meta_key' => $request->except('_token')]);

        return redirect()->route('cms.settings');
    }
}
