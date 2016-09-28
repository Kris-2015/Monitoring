@extends('adminlte/app')

@section('title', 'Profile')

@section('css')
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="{{ url('css/profile.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="fb-profile">
        <img align="left" class="fb-image-lg" src="{{ url('images/slides3.jpeg') }}" alt="Profile image example"/>
        <img align="left" class="fb-image-profile thumbnail" src="{{ url('images/user2-160x160.jpg') }}" alt="Profile image example"/>
        <div class="fb-profile-text">
            <h1>Eli Macy</h1>
            <p>Girls just wanna go fun.</p>
        </div>
    </div>
</div>
@endsection