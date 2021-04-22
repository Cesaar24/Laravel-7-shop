<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>AE| Categoria {{$tag}}</title>
		
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/side.css')}}">

        <script src="https://kit.fontawesome.com/fd8d177af3.js" crossorigin="anonymous"></script>
     
 	
  </head>
<body>  
 @include('layouts.header')
    <div class="container container-height" >
       
         <section class="mt-5 pt-4">
         	<div class="row">
         		<div class="col-lg-3 side" >
         			@include('category.slide')
         		</div>
         		<div class="col-lg-9">
         			<h2 class="text-head mt-3" >{{$tag}}</h2>
                    @foreach($Products as $Product)

                    @if($loop->first or ($loop->iteration % 3) == 1)
         			    <div class="row mt-5  " >
                    @endif
             				<div class="col-sm-4 text-center p-2 product-blur" >
                                <div class="d-flex justify-content-end mr-2 mt-1 icon">
                                    @auth
                                        <a href="{{route('admin.remove.product',$Product->id)}}" class="btn btn-danger">x</a>
                                    @else
                                        <a href="{{route('product.addi',$Product->id)}}" data-toggle="tooltip" data-placement="top" title="añadir al carrito" >
                                            <i class="fas fa-cart-plus fa-2x"></i>
                                        </a>
                                    @endauth  
                                </div>
                                <a href="{{route('product.show',Str::slug($Product->tittle,'-'))}}" >
             					  <img src="{{asset('storage/'.$Product->pic)}}" width="200px" height="200px" class="imgp">
             					  <p>{{$Product->tittle}}</p><span>${{$Product->price}}</span>
                                  <div class="my-auto">
                                    <button class="btn btn-cyan">ver mas</button> 
                                  </div>
             					</a>
             				</div>
         			@if( ($loop->iteration % 3) == 0)   
                        </div>
                    @endif

                    @endforeach

         		</div>
         	</div>

         	
         </section>
 		 
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

<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
<script type="text/javascript" src="{{asset('js/js.js')}}" ></script>



</body>
</html>
