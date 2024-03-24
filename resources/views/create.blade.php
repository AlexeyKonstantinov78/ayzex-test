@extends('layout.layout')

@section('title', $title)

@section('content')

            <h1>{{ $title }}</h1>
            <hr>
            @include('layout.form')

@endsection

