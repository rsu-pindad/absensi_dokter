<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible"
          content="ie=edge">
    <title>{{ $title ?? 'Dokter' }}</title>
    @stack('customCss')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>

  <body>
    {{-- <section class="flex h-screen items-center justify-center bg-gray-50 dark:bg-gray-900"> --}}
    <div class="bg-gray-50 antialiased dark:bg-gray-900">
      <x-dokter.navbar />

      <x-dokter.sidebar />

      <main class="h-screen p-4 pt-20 md:ml-64">
        {{ $slot }}
      </main>
    </div>
    {{-- </section> --}}

    @stack('customJs')

  </body>

</html>
