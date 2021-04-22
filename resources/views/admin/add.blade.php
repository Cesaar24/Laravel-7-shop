<form action="{{route('admin.add.product')}}" method="post" enctype = "multipart/form-data">
  @csrf

  <div class="form-group row">
    <label for="tittle" class="col-sm-2 col-form-label">titulo</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="tittle" name="tittle">
    </div>
  </div>

  <div class="form-group row">
    <label for="descripcion" class="col-sm-2 col-form-label">descripcion</label>
    <div class="col-sm-10">
     <textarea class="form-control" name="descripcion"></textarea>
    </div>
  </div>

  <div class="form-group row">
    <label for="price" class="col-sm-2 col-form-label">precio $</label>
    <div class="col-sm-10">
      <input type="number" class="  form-control" id="price" name="price" step="any" >
    </div>
  </div>

    <div class="form-group row">
    <label for="quantity" class="col-sm-2 col-form-label">Cantidad </label>
    <div class="col-sm-10">
      <input type="number" class="  form-control" id="quantity" name="quantity" step="any" >
    </div>
  </div>




  <div class="form-group row">
    <label for="pic" class="col-sm-2 col-form-label">Imagen </label>
    <div class="col-sm-10">
      <input type="file" class="  form-control" id="pic" name="pic" >
    </div>
  </div>


  <div class="form-group row">
    <label for="category" class="col-sm-2 col-form-label">categoria </label>
    <div class="col-sm-10">
      <select class="form-control" name="category">
        @include('admin.category-show',array('ParentsCategory' => $ParentsCategory))
      </select>
      
    </div>
  </div>

  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-cyan">Añadir Producto</button>
    </div>
  </div>
</form>