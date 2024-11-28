<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
{{-- @dd(env('APP_NAME')) --}}
    <title> {{ $title ?? 'Home' }} - {{ env('APP_NAME') }}  </title>
    <meta charset="utf-8">
    <meta name="title" content="{{ $metatitle ?? 'Default Meta Title' }}">
    <meta name="keywords" content="{{ $keywords ?? '' }}">
    <meta name="description" content="{{ $description ?? '' }}">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">   
    <link rel="canonical" href="{{ url()->current() }}" />
    <meta name="google-site-verification" content="THEB9gGUUt_eH2xUQf4qpzw06ika-tCs89no2raq1fI" />
    <!-- Favicon -->
    <link href="{{ asset('frontend/img/favicon.ico') }}" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="{{ asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
</head>
