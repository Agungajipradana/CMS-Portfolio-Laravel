@extends('layouts.dashboard.dashboard-layout')

@section('title', 'Dashboad page')

@section('breadcrumb')
    {{ Breadcrumbs::render('dashboard') }}
@endsection

@section('content')
    Home
@endsection
