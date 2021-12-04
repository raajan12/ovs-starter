<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>OVS</title>
  </head>
  <body>
    <div
      class="
        min-h-full
        flex
        items-center
        justify-center
        py-12
        px-4
        sm:px-6
        lg:px-8
      "
    >
      <div class="max-w-md w-full space-y-8 ">
        <div class="bg-gray-50 p-2 rounded-xl shadow-sm">
            <div class="logo w-1/4  m-auto">
            <img src="https://cdn.cdnlogo.com/logos/a/59/aws-mobile-hub.svg">
            <h3 class="text-md text-center pt-2">@yield('title') | {{config('app.name')}}</h3>
            </div>
            @yield('content')
      </div>
    </div>
  </body>
</html>
