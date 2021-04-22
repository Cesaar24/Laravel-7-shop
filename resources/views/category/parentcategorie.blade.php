

@foreach($parents as $parent)
	@if($loop->first or ($loop->iteration % 3) == 1)
	<div class="row mt-5 p-5">
	@endif
		<div class="col-md-4 text-center p-2">
			<a href="{{route('categori.show',$parent->Name)}}" style="text-decoration: none;">
			
				<img src="{{asset('storage/'.$parent->pic)}}" width="240" height="200">

				<p style="text-transform: uppercase; font-family: Karla,sans-serif;"	>{{$parent->Name}}</p>
				
			</a>
		</div>

	@if( ($loop->iteration % 3) == 0)	
	</div>
	@endif
@endforeach

</div>