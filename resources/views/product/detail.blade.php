

<h3 class="mt-2">Categoria</h3>
<div class="mb-3">
@if(isset($categorys))

@for($i = count($categorys) - 1 ; $i >= 0 ; $i--)
	<a href="{{route('categori.show',$categorys[$i])}}" style="color: #88a;font-size: 15px"	 >{{$categorys[$i]}}/</a>

@endfor
@else
	<a href="{{route('categori.show',$category)}}" >{{$category}}</a>
@endif


</div>

<div class="row detail mt-5">
	<div class=" col-lg-7 ">
		<div class="imgBx">
			<img src="{{asset('storage/'.$product->pic)}}">
		</div>
	</div>
	<div class=" col-lg-5 " id="formDetail">
		<div class="text-center">
			<h2 class="mt-4 ">{{$product->tittle}}</h2>
			<h3 class="mb-4 ">${{$product->price}}</h3>
			<h3>Descripcion:</h3>
			<p>{{$product->description}}</p>
		</div>

		{{-- <h3 class="mt-2">Categorias</h3> --}}
		<div class="mb-3">

			@if(isset($categorys))
			@for($i = count($categorys) - 1 ; $i >= 0 ; $i--)
				<a href="{{route('categori.show',$categorys[$i])}}" class="badge badge-primary">{{$categorys[$i]}}</a>
			@endfor
			@else
				<a href="{{route('categori.show',$category)}}" class="badge badge-primary">{{$category}}</a>
			@endif
		</div>

		<form action="{{route('product.add')}}" method="post" class="d-flex text-center flex-column " style="min-height: 200px;"> 
			
			<div class="form-inline">
				<label for="cant">Cantidad</label>
				@if($product->quantity > 0)
					<input type="number" name="quantity" min="1" max="{{$product->quantity}}" value="1" class=" ml-2 form-control">	
					<span class="ml-auto" style="font-family: Karla,Sans serif;color: #111;font-size:18px;">
						stock <i class="fas fa-check mr-auto"></i>
					</span>
				@else
					<input type="number" name="quantity" min="1" max="{{$product->quantity}}" disabled value="1" class=" ml-2 form-control">
					<div class="ml-auto">
						<span style="font-family: Karla,Sans serif;color: #111;font-size:18px;" >stock:</span>
						<span style="font-family: Karla,Sans serif;color: #f11;font-size:20px;">Agotado</span>	
					</div>
					
				@endif
				
			</div>
			

			<div class="mt-auto mb-2">
			@if($product->quantity > 0)
				@csrf
				<input type="hidden" name="id" value="{{$product->id}}">
				<input type="submit" name="sub" class="btn btn-cyan btn-block rounded-pill"  value="Añadir al carrito">	
			@else
				<input type="submit" name="sub" class="btn btn-cyan btn-block rounded-pill" disabled value="Añadir al carrito">	
			@endif
			</div>
		</form>
		
	</div>
</div>
<div class="mt-5">
	<h2 class="text-head">Descripcion:</h2>
	<p class="pl-4">{{$product->description}}</p>
</div>

<div class="mt-5">
	<h2 class="text-head mb-3">Productos Relacionados</h2>
	@include('layouts.carrusel-category')
</div>