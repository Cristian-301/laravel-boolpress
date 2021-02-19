<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel-relations</title>
        
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
      <header>
        <div class="container mt-5 text-center">
          @yield('header')
        </div>
        
      </header>

      <main>
        <div class="container mt-5">
          @yield('content')
        </div>
        
      </main>

      <footer class="container">
        @yield('footer')
      </footer>
       
      
    </body>
</html>