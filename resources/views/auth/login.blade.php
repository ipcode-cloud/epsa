@extends('layouts.app')
@section('content')
    <div>
        <h1>Login</h1>
        <div>
            <form action="{{route('login')}}" method="post">
                @csrf
                <label for="name">Name:</label>
                <input type="text" name="username" id="username" value="{{ old('username') }}">
                @error('username')
                    <span>$message</span>
                @enderror
                <label for="password">Password</label>
                <input type="password" name="password" id="password" value="{{ old('password') }}">
                @error('password')
                    <span>$message</span>
                @enderror
                <button type="submit">Signin</button>
            </form>
            <span><a href="/register">Create Account</a></span>
        </div>
    </div>
@endsection
