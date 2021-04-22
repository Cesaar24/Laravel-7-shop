<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>AE|Order {{$order->id}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
        {{-- <link rel="stylesheet" type="text/css" href="{{asset('css/fontawesome.min.css')}}"> --}}
        <script src="https://kit.fontawesome.com/fd8d177af3.js" crossorigin="anonymous"></script>
 
  </head>
<body>  

        
     
         @include('layouts.header')
        

         <div class="container container-height mt-5 p-5">

            @include('order.show')
       
         </div>
    

 @include('layouts.footer')
 
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
</body>
</html>
