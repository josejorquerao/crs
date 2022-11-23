<head>
    <!-- CSS -->
    <link href="{{asset('/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('/css/style.css')}}" rel="stylesheet">
    <!-- <link href="{{asset('/vendor/aos/aos.css')}}" rel="stylesheet"> -->
    <!-- CSS -->
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Altos del Chucao</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>