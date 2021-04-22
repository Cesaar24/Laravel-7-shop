<h1 class="tex-head mb-2"> Añadir Nueva Categoria</h1>
<form action="{{route('add.categoria')}}" method="POST" enctype = "multipart/form-data">
	@csrf

	<div class="form-group row">
		<label for="category" class="col-sm-2 col-form-label">Nombre  categoria </label>
		<div class="col-sm-10">
			<input type="text" name="name" class="form-control">
		</div>
	</div>
	<div class="form-group row">
		<label for="category" class="col-sm-2 col-form-label">Categoria superior </label>
		<div class="col-sm-10">
		<select class="form-control" name="categorie">
			<option value="null">Sin categoria superior</option>
			@include('admin.category-show',array('ParentsCategory' => $ParentsCategory))
		</select>
		
		</div>
	</div>
	<div class="form-group row" >
		<label for="pic" class="col-sm-2 col-form-label">Image(Solo categoria superior)</label>
		<div class="col-sm-10">
			<input type="file" name="pic" class="form-control" id="pic">
		</div>
	</div>
	<div class="d-flex mt-4">
		<input type="submit" name="bb" class="btn btn-cyan rounded-pil mr-auto" >

	</div>

</form>
{{-- <h2 class="tex-head mt-2"> Eliminar categoria</h2>
<form method="get" action="{{route('r.categoria')}}" class="mt-4">
	@csrf
	<select class="form-control" name="categorie">
		@include('admin.category-show',array('ParentsCategory' => $ParentsCategory))
	</select>

	<input type="submit" name="c" value="Eliminar categoria" class="btn btn-danger mt-3">
</form> --}}