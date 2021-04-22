
{{-- {{$products}} --}}
<div class="mt-5">

@foreach ($products as $product)
   
    @if($loop->first or $loop->index == 3)
    <div class = "card-deck mt-3">
    @endif
        <div class="card" > 
            <div class="d-flex justify-content-end mr-2 mt-1 icon">
                @auth
                    <a href="{{route('admin.remove.product',$product->id)}}" class="btn btn-danger">x</a>
                @else
                {{-- {{   json_encode($product) }} --}}
                    <a href="{{ route('product.addi', $product->id) }}" data-toggle="tooltip" data-placement="top" title="añadir al carrito" class="addi">
                        <i class="fas fa-cart-plus fa-2x"></i>
                    </a>
                @endauth  
            </div>
            <div class="imgBx">
                 {{-- <a href="{{route('product.show',Str::slug($product->tittle,'-'))}}" > --}}
                    <img src="{{asset('storage/'.$product->pic)}}" >
                    {{-- <img src="default.png"> --}}
                {{-- </a> --}}
            </div>
            <div class="contentBx">
           
                <h3>{{$product->tittle}}</h3>
                <h2 class="price">${{$product->price}}</h2>
                <a href="{{route('product.show',  Str::slug($product->tittle,'-'))}}" class="buy">Ver mas</a>        
            </div>
        </div>
    @if($loop->index == 2 or $loop->last)
    </div>
    @endif

    
@endforeach
</div>          
