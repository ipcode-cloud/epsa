<?php

namespace App\Http\Controllers;

use App\Models\Chief;
use Illuminate\Http\Request;

class ChiefController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }
    public function register()
    {
        return view('auth.register');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function login(Request $request)
    {
        $validated=$request->validate([
            'username'=>'required|string|min:4',
            'password'=>'required|string'
        ]);

        $user=Chief::where('username',$validated['username'])->exists();
        if(!$user){
            return redirect()->back()->with('fail', 'User Not Found');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'username'=>'required|string|unique:username,chiefs|min:4',
            'password'=>'required|string|confirmed',
            'cpassowrd'=>'required|string'
        ]);

        $user=Chief::create($validated);
        if(!$user){
            return redirect()->back()->with('fail', 'An error occured please try again!');
        }
        return redirect('/login')->with('successfull', 'registered Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Chief $chief)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chief $chief)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chief $chief)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chief $chief)
    {
        //
    }
}
