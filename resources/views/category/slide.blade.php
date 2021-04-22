
<nav class="sidebar">
  <div class="d-flex text"><span class="ml-1">Categorias</span> <a data-toggle="collapse" href="#index" class="parent ml-auto mr-2" id="head"> - </a></div>
  <div class="collapse"  id="index">
  	<ul >
    	{{-- @include('category.menu') --}}
    	@each('category.example',$ParentsCategory,'ParentCategory')
  	</ul>	
  </div>
  
</nav>

