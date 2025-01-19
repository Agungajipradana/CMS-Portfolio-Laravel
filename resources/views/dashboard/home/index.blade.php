@extends('layouts.dashboard.dashboard-layout')

@section('title', 'Dashboad page')

@section('content')
    Dashboard page
    <form action="{{route('auth.logout')}}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
@endsection
