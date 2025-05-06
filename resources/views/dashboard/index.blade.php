@extends('layouts.app')
@section('content')
    <div class="w-full h-screen flex flex-col items-center justify-center bg-gray-100">
        <h1 class="text-4xl font-bold mb-4">Welcome to the Dashboard</h1>
        <p class="text-lg mb-4">This is your dashboard where you can manage your tasks and projects.</p>
        <div class="mt-8">
            <h2 class="text-2xl font-semibold mb-4">Recent Activities</h2>
            <ul class="list-disc pl-5">
                <li>Task 1 completed</li>
                <li>Project 1 updated</li>
                <li>New task assigned</li>
            </ul>
        </div>
    </div>
@endsection
