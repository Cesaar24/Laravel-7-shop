<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>AE| Order</title>

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
		<h1 class="mt-5 p-2">Finalize su compra</h1>
		<h2 class="mt-5 p-2 text-head">Detalles de su pedido</h2>

		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">Producto</th>
					<th scope="col">Subtotal</th>
				</tr>
			</thead>
			<tbody>
				@foreach(Cart::getContent() as $item)
				<tr>
					<td>{{$item->name}} <strong>x{{$item->quantity}}</strong></td>
					<td>{{$item->price * $item->quantity}}$</td>
				</tr>
				@endforeach
				<tr>
					<td><strong>Total</strong></td>
					<td class="total">{{Cart::getTotal()}}$</td>
				</tr>
			</tbody>
		</table>
		<div class="d-flex justify-content-end">
			<a href="{{route('cart.show')}}" class="btn btn-secondary rounded-pill">Ir al carrito</a>
		</div>
		<h2 class="mt-5 text-head">Detalles de Factura </h2>
	{{-- 	@foreach( $errors->all() as $error)
			{{$error}}
		@endforeach --}}
		{{-- Imputs --}}
		<form class="mt-3 pt-2" method="post" action="{{route('check.submit')}}">
			@csrf
			<div class="form-group row">
				
				<div class="col-sm-6">
					<label for="name" class="col-sm-2 col-form-label">Nombre</label>
				
					<input type="text" required class="form-control" id="name" name="name" value="{{old('name')}}">
					@error('name')
						<div class="alert alert-danger">{{ $message  }}</div>
    				@enderror
				</div>
				
				<div class="col-sm-6">
					<label for="LastName" class="col-sm-2 col-form-label">Apellido</label>
					<input type="text" required class="form-control" id="LastName" name="LastName" value="{{old('LastName')}}">
					@error('LastName')
						<div class="alert alert-danger">{{ $message  }}</div>
    				@enderror
				</div>
			</div>

			<div class="form-group row">
				
				<div class="col-sm-6">
					<label for="cedula" class="col-sm-2 col-form-label">Cedula</label>
					<input type="text" required class="form-control" id="cedula" name="cedula" value="{{old('cedula')}}">
					@error('cedula')
						<div class="alert alert-danger">{{ $message  }}</div>
    				@enderror
				</div>

			</div>

			<div class="form-group row">
				<h5>Pais/Region: </h5>
				<h5><strong> Venezuela</strong></h5>
			</div>
			<div class="form-group row">
				<div class="col-sm-6">
					<label for="estado" class="col-sm-2 col-form-label">Estado</label>
					<input type="text" required class="form-control" id="estado" name="estado" value="{{old('estado')}}">
					@error('estado')
						<div class="alert alert-danger">{{ $message  }}</div>
    				@enderror
				</div>
				<div class="col-sm-6">
					<label for="city" class="col-sm-2 col-form-label">Ciudad</label>
					<input type="text" required class="form-control" id="city" name="city" value="{{old('city')}}">
					@error('city')
						<div class="alert alert-danger">{{ $message  }}</div>
    				@enderror
				</div>
			</div>
			<div class="form-group row">
				<div class="col-sm-6">
					<label for="phone" class="col-sm-2 col-form-label">Telefono</label>
					<input type="text" required class="form-control" id="phone" name="phone" value="{{old('phone')}}">
					@error('phone')
						<div class="alert alert-danger">{{ $message  }}</div>
    				@enderror
				</div>
				<div class="col-sm-6">
					<label for="email" class="col-sm-2 col-form-label">Email</label>
					<input type="email" required class="form-control" id="email" name="email" value="{{old('email')}}">
					@error('email')
						<div class="alert alert-danger">{{ $message  }}</div>
    				@enderror
				</div>
			</div>

			<fieldset class="form-group row">
			<legend class="col-form-label col-sm-2 float-sm-left pt-0"  >Metodo de Entrega</legend>
				<div class="col-sm-10">
					<div class="form-check">
						<input class="form-check-input " type="radio" name="delivery" required id="gridRadios1" value="Retiro en Tienda" checked  >
						<label class="form-check-label" for="gridRadios1">
						Retiro en Tienda
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="delivery" required id="gridRadios2" value="Envio a ....">
						<label class="form-check-label" for="gridRadios2">
						Envio a ....  <strong>$1</strong>
						</label>
					</div>
					<div class="form-check ">
						<input class="form-check-input" type="radio" name="delivery" required id="gridRadios3" value="otro" >
						<label class="form-check-label" for="gridRadios3">
						otro ... <strong>$1</strong>
						</label>
					</div>
				</div>
			</fieldset>
			<fieldset class="form-group row">
				<legend class="col-form-label col-sm-2 float-sm-left pt-0" required >Metodo de Pago</legend>
				<div class="col-sm-10">
					<div class="form-check">
						<input class="form-check-input" type="radio" name="payment" id="gridRadios4" value="Pago en tienda" checked>
						<label class="form-check-label" for="gridRadios4">
						Pago en tienda
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="payment" id="gridRadios5" value="Transferencia Bancaria">
						<label class="form-check-label" for="gridRadios5">
						Transferencia Bancaria
						</label>
					</div>
				</div>
			</fieldset>
			<input type="submit" name="submit" class="btn btn-danger rounded-pill" value="Realizar Pedido" >
		</form>
		{{-- Imputs --}}






	</div>
   
 @include('layouts.footer')
 
<script type="text/javascript" src="js/app.js"></script>
<script type="text/javascript" src="{{asset('js/js.js')}}" ></script>

</body>
</html>
