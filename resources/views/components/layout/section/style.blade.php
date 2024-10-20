<link rel="preload" href="{{ asset('fonts/geist-font/fonts/GeistVariableVF.woff2') }}" as="font" type="font/woff2"
    crossorigin />
<link rel="preload" href="{{ asset('fonts/geist-font/fonts/GeistMonoVariableVF.woff2') }}" as="font" type="font/woff2"
    crossorigin />
<link rel="stylesheet" href="{{ asset('fonts/geist-font/style.css') }}" />
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/perfect-scrollbar/1.5.5/css/perfect-scrollbar.min.css">
@vite(['resources/css/app.css', 'resources/css/plugins/notification.css', 'resources/css/override.css'])
@stack('component-style')
{{ $slot }}
