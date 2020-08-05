<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>@yield('title')</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        @include('Layouts.head')
    </head>
<body>
    <div id="wrapper">
         @include('Layouts.header')
         @include('Layouts.sidebar')
         <div class="content-page">  
            <div class="content">
                <div class="container-fluid">
                   @include('Layouts.settings')
                   @yield('content')
                </div> 
            </div> 
        </div> 
        @include('Layouts.footer')  
        @include('Layouts.footer-script')  
    </div> 
    </body>
</html>