<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Laravel</title>

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
            <h1 class="text-head">Revise su pedido</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <form action="{{route('check.order')}}" method="POST">
              @csrf
              <div class="form-group">
                <label for="id">Id de su pedido</label>
                <input type="text" name="id" class="form-control">
              </div>             
              <div class="form-group">
                <label for="id">Email</label>
                <input type="email" name="email" class="form-control">
              </div>
              <div class="form-group">
                <input type="submit" value = 'ver su pedido' class="btn btn-secondary">
              </div>
            </form>
         
         </div>
    
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


 @include('layouts.footer')
 
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
<script type="text/javascript" src="{{asset('js/js.js')}}" ></script>
</body>
</html>
