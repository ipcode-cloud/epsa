@extends('layouts.app')
@section('content')
    <div>
        <h1>Register</h1>
        <div>
            <form action="{}" method="post">
                @csrf
                <label for="name">Name:</label>
                <input type="text" name="username" id="username" value="{{ old('username') }}">
                @error("username")
                    <span>$message</span>
                @enderror
                <label for="password">Password</label>
                <input type="text" name="password" id="password" value="{{ old('password') }}">
                @error("password")
                    <span>$message</span>
                @enderror
                <label for="cpassword">ConfirmPassword</label>
                <input type="text" name="cpassword" id="cpassword" value="{{ old('cpassword') }}">
                @error("cpassword")
                    <span>$message</span>
                @enderror
                <button type="submit">Submit</button>
            </form>
            <span><a href="/login">Login</a></span>
        </div>
    </div>
@endsection
