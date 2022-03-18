<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\SpecificEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SpecificEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event =SpecificEvent::query()->first();
        
        return view('cms.specific-event.index', ['event' => $event]);
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
        $formData = $request->except('_token', '_method');
        $validator = Validator::make($formData, [
            'name' => ['required'],
            'start_on' => ['required']
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $event = SpecificEvent::find($id);
  
        $event->update($formData);

        return redirect()->route('cms.specific-event.index', ['event' => $event]);
    }
}
