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
        ],[
            'username.required'=>'Username is required',
            'username.min'=>'Username must be at least 4 characters',
            'password.required'=>'Password is required',
            'password.min'=>'Password must be at least 5 characters',
        ]);

        $user=Chief::where('user_name',$validated['username'])->exists();
        if(!$user){
            return redirect()->back()->with('fail', 'User Not Found');
        }
        $hashedPassword=Chief::where('user_name',$validated['username'])->value('password');
        if(!password_verify($validated['password'], $hashedPassword)){
            return redirect()->back()->with('fail', 'Incorrect Password');
        }
        $request->session()->put('loggedUser', $validated['username']);
        return redirect('/dashboard')->with('success', 'Login Successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'username'=>'required|string|unique:chiefs,user_name|min:4',
            'password'=>'required|string|min:5',
            'cpassword'=>'required|min:5|string'
        ],[
            'username.required'=>'Username is required',
            'username.unique'=>'Username already exists',
            'username.min'=>'Username must be at least 4 characters',
            'password.required'=>'Password is required',
            'password.min'=>'Password must be at least 5 characters',
            'cpassword.required'=>'Confirm Password is required',
            'cpassword.min'=>'Confirm Password must be at least 5 characters',
        ]);

        $user=Chief::create([
            'user_name'=>$validated['username'],
            'password'=>password_hash($validated['password'], PASSWORD_DEFAULT)
        ])->save();
        if(!$user){
            return redirect()->back()->with('fail', 'An error occured please try again!');
        }
        $user=Chief::where('user_name',$validated['username'])->exists();
        if(!$user){
            return redirect()->back()->with('fail', 'An error occured please try again!');
        }
        return redirect('/login')->with('success', 'registered Successfully');
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
