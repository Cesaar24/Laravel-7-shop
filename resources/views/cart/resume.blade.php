
<div class="cart collapse " id="sidecart">
  {{-- <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a> --}}

	<h3 class=" text-center">Carrito de Compra</h3>
	@if(!Cart::isEmpty())
		<ul>
			@foreach(Cart::getContent() as $item)
				<li class="mt-3 pr-3">
					
						<div class="cardproduct " >
							@if(Request::route()->methods[0] != 'POST')
								<a href="{{route('product.remove',$item->id)}}" class="remove">X</a>
							@endif
							<img src="{{asset('storage/'.$item->attributes[0])}}" width="70px" height="70px" class="mx-auto">
							<div class="text-center">
								<a href="{{route('product.show',Str::slug($item->name,'-'))}}"><p>{{$item->name}}</p></a>
								<p>{{$item->quantity}}x{{$item->price}}$</p>	
							</div>
						</div>
					
				</li>
			@endforeach
		</ul>
		<div class="text-center">
			<p>Subtotal: {{number_format(Cart::getSubtotal(),2)}}$</p>
		</div>
		<div class="mt-1">	
			<a href="{{route('cart.show')}}" class="btn btn-cyan btn-block rounded-pill" >Ver Carrito</a>
			{{-- <a href="#" class="btn btn-danger btn-block rounded-pill" >Finalizar Compra</a> --}}
		</div>
	@else	
		<p class="mt-3 text-center" style="font-size: 18px; font-family: Georgia;">Su Carrito Esta Vacio</p>
	@endif
	
</div>




{{-- <div>
	
</div> --}}