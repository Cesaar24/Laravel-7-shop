<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>AE| Resultados de la busqueda</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/app.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
        <script src="https://kit.fontawesome.com/fd8d177af3.js" crossorigin="anonymous"></script>
 
  </head>
<body>  

      

  @include('layouts.header')

  <div class="container container-height">
     
    <div class=" mt-5 pt-5 ">
    @php($count = count($products))	
    	@if(count($products) > 0)
			@foreach($products as $parent)
				@if($count <= 2)
					@if($loop->first)
					<div class="row mt-5 p-5">
					@endif
						<div class="col-sm-6 p-2 text-center">
              <a href="{{route('product.show',Str::slug($parent->tittle,'-')) }}">
  							<img src="{{asset('storage/'.$parent->pic)}}" width="240" height="200">
  						  <p>{{$parent->tittle}}</p>
              </a>
						</div>
					@if($loop->last)
					</div>
					@endif
				@else
					@if($loop->first or ($loop->iteration % 3) == 1)
					<div class="row mt-5 p-5">
					@endif
						<div class="col-sm-4 text-center p-2">
						{{-- <a href="{{route('categori.show',$parent->Name)}}"> --}}
            <a href="{{route('product.show',Str::slug($parent->tittle,'-') )}}">
						<img src="{{asset('default.png')}}" width="240" height="200">
						  <p>{{$parent->tittle}}</p>
            </a>
						{{-- </a> --}}
					</div>
					@if( ($loop->iteration % 3) == 0 or ($loop->last))	
					</div>
					@endif
				@endif
			@endforeach
        @else
        	<h1 class=" text-head">Productos no encontrado</h1>
        @endif

    </div>
    {{-- @include('product.indexshow') --}}

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
 
<script type="text/javascript" src="js/app.js"></script>
<script type="text/javascript" src="{{asset('js/js.js')}}" ></script>

</body>
</html>
