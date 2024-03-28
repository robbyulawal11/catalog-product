@extends('app')

@section('content')
    <h1>Page Home</h1>
    @auth
        <h5>Welcome back, {{ auth()->user()->name }}, your role is {{ auth()->user()->roles()->pluck('name')[0] }}</h5>
    @endauth
@endsection
