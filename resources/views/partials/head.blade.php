<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crs</title> 
    <link href="{{asset('/vendor/aos/aos.css')}}" rel="stylesheet">  
    <link href="{{asset('/css/style.css')}}" rel="stylesheet">   
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
