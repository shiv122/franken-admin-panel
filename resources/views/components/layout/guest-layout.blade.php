<!DOCTYPE html>
<html lang="en" class="dark uk-theme-zinc">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>
    {{ $meta }}
    <x-layout.section.style>
        {{ $style }}
    </x-layout.section.style>

</head>

<body class=" bg-background font-geist-sans text-foreground antialiased">
    <div class="flex h-screen overflow-hidden">
        <div id="page-loader" class=" h-screen w-full flex justify-center items-center absolute !z-[100] bg-background">
            <svg class="spin" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                    <path d="M22 12a1 1 0 0 1-10 0a1 1 0 0 0-10 0" />
                    <path d="M7 20.7a1 1 0 1 1 5-8.7a1 1 0 1 0 5-8.6" />
                    <path d="M7 3.3a1 1 0 1 1 5 8.6a1 1 0 1 0 5 8.6" />
                    <circle cx="12" cy="12" r="10" />
                </g>
            </svg>
        </div>

        <div class="flex-1 flex flex-col overflow-hidden">
            <main id="main-container" class="flex-1 overflow-hidden " uk-scrollable>
                <div class="container mx-auto px-6 py-8">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>



    <x-layout.section.script>
        {{ $script }}
    </x-layout.section.script>


</html>
