@extends('layouts.app')
@section('content')
    <div>
        <h1>Register</h1>
        <div>
            <form action="{{ route('register') }}" method="post" class="flex flex-col items-center justify-center bg-gray-100 p-4 rounded shadow-md">
                @csrf
                <div>
                    <label for="name">Name:</label>
                    <input type="text" name="username" id="username" value="{{ old('username') }}">
                    @error('username')
                        <span>{{$message}}</span>
                    @enderror
                </div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" value="{{ old('password') }}">
                @error('password')
                    <span>{{$message}}</span>
                @enderror
                <div>
                    <label for="cpassword">ConfirmPassword</label>
                <input type="password" name="cpassword" id="cpassword" value="{{ old('cpassword') }}">
                @error('cpassword')
                    <span>{{$message}}</span>
                @enderror
                </div>
                <button type="submit">Submit</button>
            </form>
            <span><a href="/login">Login</a></span>
        </div>
        @if (session('fail'))
            <span>{{session('fail')}}</span>
        @elseif (session('success'))
            <span>{{session('success')}}</span>
        @endif
    </div>
@endsection
