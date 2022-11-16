<!DOCTYPE html>
@include('partials.head')
<body>
@include('partials.header')
    @include('partials.welcome')
    @include('partials.about')
    @include('partials.carousel')
    @include('partials.reservation')
    @include('partials.contact')
    <seccion>
    @include('partials.login')
    @include('partials.register')
    </seccion>
    
    @include('partials.footer')
</body>