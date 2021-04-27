<!-- Navbar-->

<nav class="navbar navcenter navbar-expand-lg  fixed-top">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fas fa-bars navbar-toggler-icon"></i>
  </button>
        <a class="navbar-brand " href="/">
        <img
          src="{{asset('logo/cooltext1.png')}}"
          height="30"
          alt=""
          loading="lazy"
         
        />
      </a>


  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class=" navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item me-5 me-lg-1">
        <a class="nav-link" href="/">
          Inicio
        </a>
      </li>

      <li class="nav-item me-3 me-lg-1">
        <a class="nav-link" href="/sobre-nosostros">
          Quienes somos
        </a>
      </li>

      <li class="nav-item me-3 me-lg-1">
        <a class="nav-link" href="/categoria">
          Productos
        </a>
      </li>

{{--       <li class="nav-item me-3 me-lg-1">
        <a class="nav-link" href="#">
          Como comprar
        </a>
      </li> --}}

      <li class="nav-item me-3 me-lg-1">
        <a class="nav-link" href="/contacto">
          Contacto
        </a>
      </li>
      <li>
        <a class="nav-link" href="/check-order">
          Ver pedido
        </a>
      </li>
      <li class="nav-link-cart">
        <a class="nav-link " href="/cart">
          Carrito de compra 
          @if(!Cart::isEmpty())
            <span class="badge badge-pill badge-success">{{count(Cart::getContent())}}</span>
          @endif
        </a>
      </li>
    </ul>


    <form class="form-inline mr-3 nav-search" action="{{route('search')}}" method="GET">
      @csrf
        <!--dropdown-->
        
        <ul class="navbar-nav ">
          <li class="nav-item dropdown">
            <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

            <div class="dropdown-menu dropdown-default" >
              <div class="dropdown-item mb-2" >
                <img src="default.png" width="30px" height="30px">
                <span > name01</span>
                <span class="">$99.99</span>
        
              </div>
              <div class="dropdown-item">
                <img src="default.png" width="30px" height="30px">
                <span > fsfo name01</span>
                <span class="">$99.99</span>
              </div>


            </div>
          </li>
        </ul>
        <!--end dropdown-->
      <button type="submit" class="search-button"><i class="fas fa-search fa-1x"></i></button>
    </form>
   

    <div class="cart-icon mr-2">
      <a data-toggle="collapse" href="#sidecart" role="button" aria-expanded="false" aria-controls="sidecart">
        <img src="{{asset('icon/sin.png')}}" >
      </a>
      @if(!Cart::isEmpty())
        <span class="badge badge-pill badge-success">{{count(Cart::getContent())}}</span>
      @endif
    </div>

 
  </div>




  

</nav>
@include('cart.resume')
<!-- Navbar -->