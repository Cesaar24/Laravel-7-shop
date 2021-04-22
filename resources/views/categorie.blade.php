<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>AE| Categorias</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/app.css">
         <link rel="stylesheet" type="text/css" href="css/style.css">
      <script src="https://kit.fontawesome.com/fd8d177af3.js" crossorigin="anonymous"></script>
 
  </head>
<body>  
   @include('layouts.header')

    <div class="container container-height" >
 		 @include('category.parentcategorie')
    </div>	

    
 @include('layouts.footer')


<script type="text/javascript" src="js/app.js"></script>
</body>
</html>
