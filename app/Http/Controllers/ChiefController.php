<?php

namespace App\Http\Controllers;

use App\Models\Chief;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $validated = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);
        Auth::attempt(['user_name' => $validated['username'], 'password' => $validated['password']]);
        if (!Auth::check()) {
            return redirect()->back()->with('fail', 'Invalid Credentials');
        }
        return redirect('/')->with('success', 'Login Successfully');
        // $user=Chief::where('username',$validated['username'])->exists();
        // if(!$user){
        //     return redirect()->back()->with('fail', 'User Not Found');
        // }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|unique:chiefs,user_name',
            'password' => 'required|string',
            'cpassword' => 'required|string'
        ],
        [
            'username.unique' => 'Username already exists',
        ]);
        // dd($validated);
        $user = Chief::create([
            'user_name' => $validated['username'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);
        if (!$user) {
            return redirect()->back()->with('fail', 'An error occured please try again!');
        }
        return redirect('/')->with('successfull', 'registered Successfully');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Logout Successfully');
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
