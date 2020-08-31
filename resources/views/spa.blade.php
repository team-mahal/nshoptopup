@php
$config = [
    'appName' => "nSHOPTOPUP",
    'locale' => $locale = app()->getLocale(),
    'locales' => config('app.locales'),
    'githubAuth' => config('services.github.client_id'),
];
@endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="{{ asset('febicon/favicon.ico') }}" type="image/x-icon">
  <link rel="shortcut icon" href="{{ asset('febicon/favicon-32x32.png') }}" type="image/x-icon">
  <link rel="shortcut icon" href="{{ asset('febicon/favicon-16x16.png') }}" type="image/x-icon">
  <link rel="shortcut icon" href="{{ asset('febicon/apple-touch-icon.png') }}" type="image/x-icon">
  <title>{{ config('app.name') }}</title>

  <link rel="stylesheet" href="{{ mix('dist/css/main.css') }}">
</head>
<body>
  <div id="app"></div>

  {{-- Global configuration object --}}
  <script>
    window.config = @json($config);
  </script> 

  {{-- Load the application scripts --}}
  <script src="{{ mix('dist/js/app.js') }}"></script>
</body>
</html>
