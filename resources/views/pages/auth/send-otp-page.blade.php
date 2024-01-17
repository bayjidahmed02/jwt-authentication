@extends('layout.app')
@section('page_title', 'Send OTP')

@section('content')
    @include('components.auth.send-otp-form')
@endsection
