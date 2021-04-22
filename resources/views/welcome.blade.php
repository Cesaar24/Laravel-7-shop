@extends('layouts.main')
@section('title')
 AE| HOME
@endsection

@section('carrusel')
@include('layouts.carrusel-advertising  ')
@endsection

@section('content')
<div class=" mt-5 pt-5 " id="app">
  <h2 class="text-head">Productos Recientes:{{-- {{$id}} --}}</h2>
  
  @include('product.indexshow')
  <div class="mt-5">
    <h2 class="text-head">Productos por Categoria</h2>
    @include('category.parentcategorie',array('parents' => $parents))
  </div>
</div>
@endsection

@section('modal')
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade " id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modo Prueba</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        !Esta web esta en modo prueba! :D
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@endsection



@section('toast')
@if(session('status'))
  <div class="toast toast-status position-fixed bottom-0 right-0 " role="alert" aria-live="assertive" aria-atomic="true" data-delay="7000" >
    <div class="toast-header ">
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

@if(session('warning'))
  <div class="toast toast-warning position-fixed bottom-0 right-0 " role="alert" aria-live="assertive" aria-atomic="true" data-delay="7000" >
    <div class="toast-header ">
      <button type="button" class="ml-auto mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="toast-body">
     {{session('warning')}}<br>Ingrese <a href="/check-order"><strong>Aqui</strong></a> para ver su pedido
    </div>
  </div>
@endif


@endsection

