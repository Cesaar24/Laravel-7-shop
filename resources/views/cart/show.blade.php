<div class="mt-5 pt-3">
	<h1 class="text-center">Resumen de su compra</h1>
</div>
<div class="mt-1 ">

<table class="table mb-5">
	<thead class="thead-dark">
		<tr>
		  <th scope="col">#</th>
		  <th scope="col">Producto</th>
		  <th scope="col">Precio</th>
		  <th scope="col">Cantidad</th>
		  <th scope="col">Total</th>
		</tr>
	</thead>

	<tbody>

		@foreach(Cart::getContent() as $item)
			<tr>
				<th scope="row">{{$loop->iteration}}</th>
				<td><a href="{{route('product.remove',$item->id)}}" class="remove">X</a><a href="{{route('product.show',Str::slug($item->name,'-'))}}">{{$item->name}}</a> </td>
				<td>{{$item->price}}$</td>
				<td>{{$item->quantity}}</td>
				<td>{{$item->price * $item->quantity}}$</td>
			</tr>
		@endforeach
			<tr class="bg-info">
				<th scope="row" colspan="4" >Total </th>
				<td >{{Cart::getTotal()}}$</td>
			</tr>
	</tbody>

</table>
<div class="d-flex justify-content-end mt-4">
	<a href="{{route('check')}}" class="btn btn-danger rounded-pill">Realizar Pedido</a>
</div>
</div>