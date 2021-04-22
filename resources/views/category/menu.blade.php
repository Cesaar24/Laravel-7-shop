{{-- <ul > --}}
	@foreach($ParentsCategory as $ParentCategory)
		<li>
			{{$ParentCategory->Name}} 
			<a class="parent" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="	false" aria-controls="collapseExample">
				+
			</a>
		</li>

		@if($ParentCategory->children != null)
			<div class="collapse" id="collapseExample">
				<ul class="child">
					@include('category.menu',array('ParentsCategory'=>$ParentCategory->children))
				</ul>
			</div>
		@endif
	@endforeach
{{-- </ul> --}}