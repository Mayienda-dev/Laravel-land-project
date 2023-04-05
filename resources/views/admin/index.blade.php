@extends('admin.admin_master')
@section('admin')
<h3> Login Admin Name: {{ Auth::guard('admin')->user()->name }}</h3>

    <h1>I'LL FIGURE OUT LATER WHAT HAPPENS HERE</h1>
    <span>Password change</span>
    <a href="{{ route('admin.logout') }}">LOGOUT</a>
@endsection
