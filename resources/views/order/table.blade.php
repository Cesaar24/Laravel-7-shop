
    
<div>
	<table class="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col">#</th>
				<th scope="col">Nombre</th>
				<th scope="col">Cedula</th>
				<th scope="col">Phone</th>
				<th scope="col">Email</th>
				<th scope="col">Fecha</th>

			</tr>
		</thead>
		<tbody>
		@foreach($orders as $order)
			
			<tr>
				<th scope="row">{{$order->id}} </th>
				<td>{{$order->Name}}</td>
				<td>{{$order->Cedula}}</td>
				<td>{{$order->phone}}</td>
				<td>{{$order->email}}</td>
				<td>{{$order->created_at->format('d/m/Y')}}</td>
				<td><a href="{{route('order.show',$order->id)}}" class="btn btn-info">></a></td>
			</tr>
		
		@endforeach
		</tbody>
	</table>
	<div class="d-flex justify-content-center">
		{{-- <nav>
			<ul class="pagination">
				<li class="page-item"><a href="{{$orders->previousPageUrl()}}" class="page-link"><</a></li>

				@if($orders->currentPage() != 1)
				<li class="page-item">
					<a href="{{$orders->url($orders->currentPage() - 1)}}" class="page-link">{{$orders->currentPage() - 1}}</a>
				</li>
				@endif


				<li class="page-item active" aria-current="page">
					<span class="page-link">{{$orders->currentPage()}}</span>
				</li>


				@if($orders->currentPage() != $orders->lastPage())
				<li class="page-item">
					<a href="{{$orders->url($orders->currentPage() + 1)}}" class="page-link">{{$orders->currentPage() + 1}}</a>
				</li>
				@endif
				<li class="page-item"><a href="{{$orders->nextPageUrl()}}" class="page-link">></a></li>
				
			</ul>
		</nav> --}}
		{{$orders}}

	</div>
</div>


        
     
     
        


   
