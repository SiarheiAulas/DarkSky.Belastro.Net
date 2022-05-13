<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author", content="Siarhei Aulas">
        <meta name="author", content="Vitali Mechinski">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'DarkSky@Belastro.Net') }}</title>

        <!--Bootstrap-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <!--Своя CSS-->
        <link rel="stylesheet" href="{{asset('css/main.css')}}">
        <!--WYSIWYG-->
        <script src="https://cdn.tiny.cloud/1/esssxnna3kappnbe3yac5ejvd7ffu2jswun5lfq7mupla1ba/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.2.3/jquery.min.js"></script>
        <!--Favicon-->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/favicon/favicon.ico')}}">
        <!--
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/favicon/favicon_16x16.png')}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('img/favicon/favicon_32x32.png')}}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{asset('img/favicon/favicon_96x96.png')}}">
        <link rel="icon" type="image/png" sizes="120x120" href="{{asset('img/favicon/favicon_120x120.png')}}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{asset('img/favicon/favicon_192x192.png')}}">
        <link sizes="72x72" rel="apple-touch-icon" href="{{asset('img/favicon/favicon_72x72.png')}}">
        <link sizes="144x144" rel="apple-touch-icon" href="{{asset('img/favicon/favicon_144x144.png')}}">
        <link sizes="180x180" rel="apple-touch-icon" href="{{asset('img/favicon/favicon_180x180.png')}}">
        -->
    
    </head>
    <body class="bg-light">
        <div class="conteiner">
            @yield('content')
        </div>
    </body>
</html>
