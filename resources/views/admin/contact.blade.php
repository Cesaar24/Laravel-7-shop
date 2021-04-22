<div>
@if(isset($contacts))
	<ul>
	@foreach($contacts as $contact)
		<li><span>{{$contact->name}} --> </span><span> {{$contact->email}}</span>
			<ul>
				<li>{{$contact->msg}}</li>
			</ul>
		</li>
			
		
	@endforeach
	</ul>
	
@endif
</div>