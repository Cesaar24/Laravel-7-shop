<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>AE| Nosotros</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/app.css">
         <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="https://kit.fontawesome.com/fd8d177af3.js" crossorigin="anonymous"></script>
 
  </head>
<body>  
    @include('layouts.header')
    <div class="container container-height" >
     
         
        <h1>Nosotros</h1>
        <div class="row mt-5">
            
            <div class="col">
                    <img src="https://www.clinchsoft.com/Images/about.png" style="width: 320px ; height: 335px" >
            </div>
            <div class="col alert alert-info">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </div>
         
    </div> 
 @include('layouts.footer')


<script type="text/javascript" src="js/app.js"></script>
</body>
</html>
