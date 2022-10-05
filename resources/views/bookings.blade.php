@extends('layouts.nav')
<br>
<!DOCTYPE html>
<html lang="en">
<link href="{{asset('/css/stylee.css')}}" rel="stylesheet">   

 <body>
   <div id="resumen" class="main">
     @include('partials.sidebar')

     <section class="section dashboard">
     <div class="pagetitle">
     <h1>Ajustes e Informacíon</h1>
       <nav>
         <ol class="breadcrumb">
           <li class="breadcrumb-item active">Entrando como: {{ Auth::user()->name }}</li>
         </ol>
       </nav>
       </div>
       @include('forms.bookings-form')
     </section>
</div>}
 </body>
</html>