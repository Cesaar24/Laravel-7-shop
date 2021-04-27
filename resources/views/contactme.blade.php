<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>AE| Contacto</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/app.css">
         <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="https://kit.fontawesome.com/fd8d177af3.js" crossorigin="anonymous"></script>
        {{-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> --}}
         {!! htmlScriptTagJsApi() !!}
  </head>
<body>  
    @include('layouts.header')
    <div class="container container-height" >
         <div class="row mt-5 pt-5">
         	<div class="col-md-6">
         		<h1>Direccion:</h1>
         		<div class="row">
         			<div class="col-sm-4 alert alert-success">
         				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
         				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
         				quis nostrud exernisi ut aliquip ex ea commodo
         				consequat. llit anim id est laborum.</p>
         			</div>
         			 <div class="col-sm-6 ">
         				{{-- <img src="https://cdn.nexdu.com/img/ve/map/optica-los-angeles-c-a-46051.jpg"> --}}
         			</div>	
         		</div>
         	</div>
         	<div class="col-md-6">
         		<form action="{{route('contact.submit')}}" method="POST">
                    @csrf
         			 <div class="mb-3 row">
					    <label for="inputPassword" class="col-sm-2 col-form-label">Nombre</label>

					    <div class="col-sm-10">
					      <input type="text" class="form-control" name="name">
					    </div>
                        @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
					  </div>

         			 <div class="mb-3 row">
					    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
					    <div class="col-sm-10">
					      <input type="email"  class="form-control"  placeholder = "email@example.com" name="email">
					    </div>
                        @error('email')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
					  </div>


					   <div class="mb-3 row">
					    <label for="inputPassword" class="col-sm-2 col-form-label">Asunto</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="inputPassword" name="subject">
					    </div>
                        @error('subject')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
					  </div>

					   <div class="mb-3 row">
					    <label for="inputPassword" class="col-sm-2 col-form-label">Mensaje</label>
					    <div class="col-sm-10">
					       <textarea class="form-control" placeholder="Escriba su mensaje" name="msg"></textarea>
					    </div>
                        @error('msg')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
					  </div>

                      <div class="mb-3 row">
                        {{-- <div class="g-recaptcha" data-sitekey="6LceZLwaAAAAACFvt6XmrSZPSWetLPjs8qDzCpoM"></div> --}}
                        {!! htmlFormSnippet() !!}
                        @error('g-recaptcha-response')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                      </div>


					  <div class="mb-3 row">
					    <div class="col-sm-12">
					      <input type="submit" class="form-control btn btn-cyan" value="enviar">
					    </div>
					  </div>
         		</form>
         	</div>
         </div>

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

<script type="text/javascript" src="js/app.js"></script>
<script type="text/javascript" src="{{asset('js/js.js')}}" ></script>

</body>
</html>
