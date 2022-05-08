@extends('layout')
@section('content')
<div class="py-5 text-center", id="welcome">
    <h1>Welcome to MSPC bariatric surgery database</h1>
     @if (Route::has('login'))
        @auth
        <h2><a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500">Dashboard</a></h2>
        <h2><a href="{{Route('patients.index')}}" class="text-sm text-gray-700 dark:text-gray-500">Main</a></h2>
     @else
        <h2><a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500">Log in</a></h2>
        <!--@if (Route::has('register'))
        <h2><a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500">Register</a></h2>
        @endif-->
        @endauth
    @endif
</div>
<x-footer/>
@endsection