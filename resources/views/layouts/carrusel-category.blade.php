<div id="carouselExampleControls" class="carousel slide carousel-relateds" data-ride="carousel">
  <div class="carousel-inner">



  @foreach($relateds as $related)  
    @if($loop->first)
      <div class="carousel-item active">
        <div class="row">
          <div class="col-sm-12 text-center product-slide">
            <a href="{{route('product.show',Str::slug($related->tittle,'-') )}}">
            <img src="{{asset('storage/'.$related->pic)}}"  alt="default.png">
            <p >{{$related->tittle}}</p>
            <span>{{$related->price}}$</span>
            </a>
          </div>
        </div>
      </div>
    @else 
      <div class="carousel-item">
        <div class="row">
          <div class="col-sm-12 text-center product-slide">
            <a href="{{route('product.show',Str::slug($related->tittle,'-') )}}">
            <img src="{{asset('storage/'.$related->pic)}}"  alt="default.png">
            <p >{{$related->tittle}}</p>
            <span>{{$related->price}}$</span>
            </a>
          </div>
        </div>
      </div>
    @endif
  @endforeach        

  </div>

  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>