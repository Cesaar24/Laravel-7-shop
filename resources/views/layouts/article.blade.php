
{{-- {{$products}} --}}
<div class="mt-5">

@foreach ($products as $product)


    @if($loop->first or $loop->index == 3)
    <div class = "card-deck mt-3">
    @endif
        <div class="card" >
            <div class="imgBx">
                <img src="{{$product->pic}}" >
            </div>
            <div class="contentBx">   
                <h3>{{$product->tittle}}</h3>
                <h2 class="price">{{$product->price}}</h2>
                <a href="{{route('product',$product->tittle)}}" class="buy">Ver mas</a>        
            </div>
        </div>
    @if($loop->index == 2 or $loop->last)
    </div>
    @endif

    
@endforeach
</div>          
