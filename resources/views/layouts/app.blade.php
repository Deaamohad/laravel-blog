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
                @apply bg-gray-400 text-white px-4 py-2 rounded-md hover:bg-gray-300 transition-colors;
            }
            .btn.bg-blue-500 {
                @apply bg-blue-500 hover:bg-blue-600;
            }
            .btn.bg-red-500 {
                @apply bg-red-500 hover:bg-red-600;
            }
            .btn.bg-green-500 {
                @apply bg-green-500 hover:bg-green-600;
            }
            label {
                @apply mb-4;
            }
            input[type="text"], input[type="password"], input[type="email"], textarea {
                @apply block rounded border mb-2 w-full flex-1 border-slate-400 px-3 py-2;
            }
            .link {
                @apply mb-5 text-lg font-semibold text-gray-700 hover:text-blue-600;
            }
            .success {
                @apply rounded border p-3 mb-8 text-green-700 bg-green-100;
            }
            .error {
                @apply rounded border p-3 mb-8 text-red-700 bg-red-100;
            }
        }
    </style>
</head>
<body class="container mx-auto mt-10 mb-10 max-w-xl">
    <header>
        <div class="flex justify-end items-center mb-6 p-4 border rounded-lg bg-gray-50">
            <div class="flex items-center gap-3">
                @auth
                    <span class="text-sm text-gray-600">
                        Welcome, {{ auth()->user()->name }}!
                    </span>
                    <form action="{{ route('auth.logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="btn bg-red-500 hover:bg-red-600">
                            Logout
                        </button>
                    </form>
                @endauth
                
                @guest
                    <a href="{{ route('login') }}" class="btn bg-blue-500 hover:bg-blue-600">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="btn bg-green-500 hover:bg-green-600">
                        Register
                    </a>
                @endguest
            </div>
        </div>
    </header>
    <h1 class="text-3xl mb-4">@yield('title')</h1>
    <div>
        @if(session('success'))
            <div class="success">
                <p class="text-lg">Success!</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif
        @yield('main')
    </div>
</body>
</html>