

<div class="row detail mt-5">
	<div class="col-md-6">
		<div class="imgBx">
			<img src="{{asset($product->pic)}}">
		</div>
	</div>
	<div class="col-md-6 text-center " id="formDetail">

		<h2 class="mt-4 mb-4">{{$product->tittle}}</h2>
		<h3 class="mb-4">{{$product->price}}$</h3>
		<h3>Descripcion:</h3>
		<p>{{$product->description}}</p>
		
		
		<form class="d-flex text-center flex-column " style="height: 225px;"> 
		
			<div class="form-inline">
				<label for="cant">Cantidad</label>
				<input type="number" name="cant" class=" ml-2 form-control">	
				<span class="ml-auto">en estock 20</span>
			</div>
			

			<div class="mt-auto mb-2">
				<input type="submit" name="" class="btn btn-cyan btn-block "  value="Añadir al carrito">	
			</div>
			
			
			
		</form>
		


	</div>
</div>