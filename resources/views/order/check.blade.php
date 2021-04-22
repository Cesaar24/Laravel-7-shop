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
  <h1 class="text-head">Pedido {{$order->id}}:</h1>
  <h2 class="mt-2">Datos del cliente:</h2>
  <p>Nombre:<strong class="ml-2">{{$order->Name}}</strong></p>
  <p>Apellido:<strong class="ml-2">{{$order->Lastname}}</strong></p>
  <p>Cedula:<strong class="ml-2">{{$order->Cedula[0]}}*******</strong></p>
  <p>Estado:<strong class="ml-2">{{$order->Estado}}</strong></p>
  <p>Ciudad:<strong class="ml-2">{{$order->city}}</strong></p>
  <p>Telefono:<strong class="ml-2">{{$order->phone[0]}}*******</strong></p>
  <p>Correo:<strong class="ml-2">{{$order->email[0]}}*******</strong></p>
  <p>Metodo de envio:<strong class="ml-2">{{$order->delivery}}</strong></p>
  <p>Metodo de pago:<strong class="ml-2">{{$order->payment}}</strong></p>
  <h2 class="mt-2">Productos del pedido {{$order->id}}:</h2>
  @php($total = 0.0)

  <p class="mt-2">Por Favor seleccione los productos que desea conservar.</p>
<form action="{{route('check.order.sub')}}" method="POST">
  @csrf
  <input type="hidden" name="id" value="{{$order->id}}">
  <ul style="list-style: none;">
  @foreach($products as $product)
     <li>
{{--         <div>
          <input type="checkbox" name="is_ok[]" class="form-check-input">
        </div> --}}
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" name="is_ok[]" id="{{'customCheck'.$loop->iteration}}" value="{{$product->id}}">
          <label class="custom-control-label" for="{{'customCheck'.$loop->iteration}}"> </label>
        </div>
        <ul style="list-style: none">
          <li>
            <span>Producto:
            <strong class="ml-2 " ><a href="{{route('product.show',Str::slug($product->tittle,'-') )}}">{{$product->tittle}}</a></strong></span> 
            <img src="{{asset('storage/'.$product->pic)}}" width="50px" height="50px">
          </li>

          <li>
            <span>Precio: {{$product->price}}$</span>
          </li>

          <li >
            <span>Cantidad: {{$product->quantity}} </span> <input type="number" min="1" max="10" name="is_q[]" class="ml-2 " value="1">
          </li>

          <li>
            <span>Subtotal: {{$product->price * $product->quantity}}$</span>
          </li>
      </ul>
    </li>
    @php($total = $total + ($product->price * $product->quantity)  )

    @endforeach
  </ul>
  <p>Total: {{$total}}$</p>
<input type="submit" value="continuar"  class="btn btn-danger">
</form>

</div>





 @include('layouts.footer')


<script type="text/javascript" src="{{asset('js/app.js')}}"></script>

</body>
</html>
