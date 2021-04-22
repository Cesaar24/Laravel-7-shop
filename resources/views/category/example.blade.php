<li>
	<div class="d-flex bd-highlight">
		<div class="mr-auto p-2 bd-highlight categori">
			<a href="{{route('categori.show',$ParentCategory->Name)}}">{{$ParentCategory->Name}}</a>
		</div>
	
	

@if($ParentCategory->children != null)
	
		<div class="p-2 bd-highlight">
			<a class="parent " data-toggle="collapse" href="#{{$ParentCategory->Name}}" role="button" aria-expanded="false" aria-controls="{{$ParentCategory->Name}}">
				+
			</a>	
		</div>
	</div>

	<div class="collapse" id="{{$ParentCategory->Name}}">
		<ul class="child">
			@each('category.example',$ParentCategory->children,'ParentCategory')
		</ul>
	</div>
</li>

@else
</div>
</li>

@endif