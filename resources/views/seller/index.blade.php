@extends('seller.seller_master')
@section('seller')
<h3> Login Seller Name:{{ Auth::guard('seller')->user()->name }}</h3>

    <h1>I'LL FIGURE OUT LATER WHAT HAPPENS HERE</h1>
    <span>Password change</span>
    <a href="{{ route('seller.logout') }}">LOGOUT</a>
@endsection