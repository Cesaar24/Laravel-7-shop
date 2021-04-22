
<h1 class="text-head">Pedido {{$order->id}}:</h1>
<h2 class="mt-2">Datos del cliente:</h2>
<p>Nombre:<strong class="ml-2">{{$order->Name}}</strong></p>
<p>Apellido:<strong class="ml-2">{{$order->Lastname}}</strong></p>
<p>Cedula:<strong class="ml-2">{{$order->Cedula}}</strong></p>
<p>Estado:<strong class="ml-2">{{$order->Estado}}</strong></p>
<p>Ciudad:<strong class="ml-2">{{$order->city}}</strong></p>
<p>Telefono:<strong class="ml-2">{{$order->phone}}</strong></p>
<p>Correo:<strong class="ml-2">{{$order->email}}</strong></p>
<p>Metodo de envio:<strong class="ml-2">{{$order->delivery}}</strong></p>
<p>Metodo de pago:<strong class="ml-2">{{$order->payment}}</strong></p>

<h2 class="mt-2">Productos del pedido {{$order->id}}:</h2>
@php($total = 0.0)
<ul>
	@foreach($products as $product)
		<li>
			<ul style="list-style: none">
				<li>
					<span>Producto:
					<strong class="ml-2 " ><a href="{{route('product.show',$product->tittle)}}">{{$product->tittle}}</a></strong></span> 
					<img src="{{asset('storage/'.$product->pic)}}" width="50px" height="50px">
				</li>

				<li>
					<span>Precio: {{$product->price}}$</span>
				</li>

				<li>
					<span>Cantidad: {{$product->quantity}}</span>
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
<div class="d-flex justify-content-end">
	<a href="{{route('order.success',$order->id)}}" class="btn btn-cyan rounded-pill mr-2">Finalizar Pedido</a>
	<a href="{{route('order.failed',$order->id)}}" class="btn btn-danger rounded-pill">Eliminar Pedido</a>
</div>