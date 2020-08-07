<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>@yield('title')</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        @include('Layouts.head')
        @yield('script')
    </head>
<body>
 

    <div id="wrapper">
        @if (Session::has('loggedAdmin'))
         @include('Layouts.header')
         @include('Layouts.sidebar')
        @endif
         <div class="content-page">  
            <div class="content">
                <div class="container-fluid">
                   @yield('content')
                </div> 
            </div> 
        </div> 
        @if (Session::has('loggedAdmin'))
        @include('Layouts.footer')  
        @include('Layouts.footer-script') 
        @endif 
    </div>
    
    

     
    </body>
</html>