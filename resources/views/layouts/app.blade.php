<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>@yield('title')</title>
    <style type="text/tailwindcss">
        @layer components {
            .btn {
                @apply bg-gray-400 text-white px-3.5 py-1.25 rounded hover:bg-gray-300;
            }
            label {
                @apply mb-4;
            }
            input[type="text"], textarea {
                @apply block rounded border mb-2 w-full flex-1 border-slate-400;
            }
            .link {
                @apply mb-5 text-lg font-semibold text-gray-700 hover:text-blue-600;
            }
        }
    </style>
</head>
<body class="container mx-auto mt-10 mb-10 max-w-xl">
    <h1 class="text-3xl mb-4">@yield('title')</h1>
    <div>
        @if(session('success'))
            <div class="rounded border p-3 mb-8 text-green-700 bg-green-100">
                <p class="text-lg">Success!</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif
        @yield('main')
    </div>
</body>
</html>