@extends('layouts.app')
@section('titulo', 'Login')
@section('content')
    <login-component csrf_token="{{ @csrf_token() }}"></login-component>
@endsection
