<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cms.account.index', ['user' => User::find(auth()->user()->id)]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $user = User::find($id);
        
        $formData = $request->except('_token', '_method');
        $validator = Validator::make($formData, [
            'name' => ['required', 'string', 'max:255'],
        ]);
        $validator->sometimes('password', ['required', 'string', 'min:8', 'confirmed'], function ($formData) {
            return $formData['type'] === 'change_password';
        });

        if ($validator->fails()) {
            return redirect()
                ->route('cms.account.index')
                ->withErrors($validator);
        }

        $newData = [];
        if ($formData['type'] === 'change_info') {
            $newData['name'] = $formData['name'];
        } else {
            $newData['password'] = Hash::make($formData['password']);
        }

        $user->update($newData);

        return redirect()
                ->route('cms.account.index')
                ->with('showToast', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
