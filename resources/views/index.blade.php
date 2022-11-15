<!DOCTYPE html>
@extends('layouts.app')
<body>
    @include('partials.welcome')
    @include('partials.about')
    @include('partials.carousel')
    @include('partials.reservation')
    @include('partials.contact')
    <seccion>
    @include('partials.login')
    @include('partials.register')
    </seccion>
</body>