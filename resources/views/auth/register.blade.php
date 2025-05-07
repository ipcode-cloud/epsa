@extends('layouts.app')
@section('content')
    <div>
        <h1>Register</h1>
        <div>
            <form action="{{route('auth.store')}}" method="post">
                @csrf
                <label for="name">Name:</label>
                <input type="text" name="username" id="username" value="{{ old('username') }}">
                @error("username")
                    <span>{{$message}}</span>
                @enderror
                <label for="password">Password</label>
                <input type="password" name="password" id="password" value="{{ old('password') }}">
                @error("password")
                    <span>{{$message}}</span>
                @enderror
                <label for="cpassword">ConfirmPassword</label>
                <input type="password" name="cpassword" id="cpassword" value="{{ old('cpassword') }}">
                @error("cpassword")
                    <span>{{$message}}</span>
                @enderror
                <button type="submit" class="bg-green-400 rounded-xl p-2">Submit</button>
            </form>
            <span>haven't? <a href="/login">Login</a></span>
        </div>
    </div>
@endsection
