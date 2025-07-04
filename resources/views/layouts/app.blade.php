<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('meta_title', 'Your Site Name - Best Apps & Downloads')</title>
    <meta name="description" content="@yield('meta_description', 'Discover the best apps, featured downloads, latest updates, and new releases on Your Site Name.')" />
    <link rel="icon" href="{{ asset('storage/site_images/site_favicon.ico') }}" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.24/dist/full.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/app/app.css') }}" />
    @yield('styles')
    @livewireStyles
    {!! $settings->header_code !!}
</head>
<body data-theme="{{ $settings->site_theme }}" class="bg-base-100  justify-center items-center min-h-screen">
<main class="container mx-auto max-w-[1080px] bg-base-100">


@include('includes.navbar')

<div class="px-2 lg:px-0">@yield('content')</div>


@include('includes.footer')



</main>
<script src="{{ asset('js/app/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js" integrity="sha512-b+nQTCdtTBIRIbraqNEwsjB6UvL3UEMkXnhzd8awtCYh0Kcsjl9uEgwVFVbhoj3uu1DO1ZMacNvLoyJJiNfcvg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@yield('scripts')
@livewireScripts
{!! $settings->footer_code !!}
<script>
    document.getElementById('search-form').addEventListener('submit', function (e) {
        e.preventDefault();

        const query = document.getElementById('search-input').value.trim();
        if (!query) return;

        const parts = [];

        // From Blade: values from current context
        const locale = @json($locale_slug ?? null);
        const platform = @json($platform_slug ?? null);
        const defaultLocale = @json($default_locale_slug);
        const defaultPlatform = @json($default_platform_slug);

        // Only push if NOT default
        if (locale && locale !== defaultLocale) parts.push(locale);
        if (platform && platform !== defaultPlatform) parts.push(platform);

        parts.push(encodeURIComponent(query)); // always add query

        const finalUrl = `/search/${parts.join('/')}`;
        window.location.href = finalUrl;
    });
</script>
</body>
</html>
