<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>AE| Producto {{$product->tittle}} </title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
        <script src="https://kit.fontawesome.com/fd8d177af3.js" crossorigin="anonymous"></script>
 
  </head>
<body>  
    @include('layouts.header')
    <div class="container mt-5 container-height" >
        <div class="mt-5 pt-4">
            <h3 class="text-head">Detalles Del Producto</h3>
        </div>
        
         @include('product.detail')
      
    </div> 
    @include('layouts.footer')
    


    
@if(session('status'))
  <div class="toast toast-status position-fixed bottom-0 right-0 " role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000" >
    <div class="toast-header ">
      {{-- <img src="{{asset('icon/check.png')}}" class="mr-auto" width="30px" height="30px"> --}}
      <i class="fas fa-check mr-auto"></i>
      <button type="button" class=" mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="toast-body">
     {{session('status')}}
    </div>
  </div>
@endif

@if(session('warning'))
  <div class="toast toast-warning position-fixed bottom-0 right-0 " role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000" >
    <div class="toast-header ">
      {{-- <img src="{{asset('icon/check.png')}}" class="mr-auto" width="30px" height="30px"> --}}
      <i class="fas fa-check mr-auto"></i>
      <button type="button" class=" mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="toast-body">
     {{session('warning')}}
    </div>
  </div>
@endif


<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
<script type="text/javascript" src="{{asset('js/js.js')}}" ></script>

</body>
</html>
