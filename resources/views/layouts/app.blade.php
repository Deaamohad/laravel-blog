<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel Blog')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
    <style type="text/tailwindcss">
        @layer components {
            .btn {
                @apply inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg shadow-sm transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2;
            }
            .btn-primary {
                @apply btn bg-blue-600 text-white hover:bg-blue-700 focus:ring-blue-500;
            }
            .btn-secondary {
                @apply btn bg-gray-600 text-white hover:bg-gray-700 focus:ring-gray-500;
            }
            .btn-danger {
                @apply btn bg-red-600 text-white hover:bg-red-700 focus:ring-red-500;
            }
            .btn-success {
                @apply btn bg-green-600 text-white hover:bg-green-700 focus:ring-green-500;
            }
            .btn-outline {
                @apply btn bg-white text-gray-700 border-gray-300 hover:bg-gray-50 focus:ring-blue-500;
            }
            
            .card {
                @apply bg-white shadow-lg rounded-xl border border-gray-100 overflow-hidden;
            }
            .card-header {
                @apply px-6 py-4 border-b border-gray-100 bg-gray-50;
            }
            .card-body {
                @apply p-6;
            }
            
            .form-input {
                @apply block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out;
            }
            .form-label {
                @apply block text-sm font-semibold text-gray-700 mb-2;
            }
            .form-textarea {
                @apply form-input min-h-32 resize-y;
            }
            
            .alert {
                @apply p-4 rounded-lg border-l-4 mb-6;
            }
            .alert-success {
                @apply alert bg-green-50 border-green-400 text-green-800;
            }
            .alert-error {
                @apply alert bg-red-50 border-red-400 text-red-800;
            }
            
            .navbar {
                @apply bg-white shadow-sm border-b border-gray-200 sticky top-0 z-50;
            }
            .navbar-brand {
                @apply text-xl font-bold text-gray-900 hover:text-blue-600 transition duration-150;
            }
            
            .post-card {
                @apply card hover:shadow-xl transition duration-300 ease-in-out transform hover:-translate-y-1;
            }
            .post-title {
                @apply text-xl font-semibold text-gray-900 hover:text-blue-600 transition duration-150;
                word-wrap: break-word;
                overflow-wrap: break-word;
                word-break: break-word;
                hyphens: auto;
            }
            .post-meta {
                @apply text-sm text-gray-500 flex items-center gap-4;
            }
            .post-content {
                @apply text-gray-700 leading-relaxed;
                word-wrap: break-word;
                overflow-wrap: break-word;
                word-break: break-word;
                hyphens: auto;
            }
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">
    <!-- Navigation -->
    <nav class="navbar">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <a href="{{ route('posts.index') }}" class="navbar-brand">
                    Laravel Blog
                </a>
                
                <div class="flex items-center space-x-4">
                    @auth
                        <span class="text-sm text-gray-600">
                            Welcome, <span class="font-medium">{{ auth()->user()->name }}</span>!
                        </span>
                        <form action="{{ route('auth.logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="btn-danger">
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn-outline">
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="btn-primary">
                            Register
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="w-full max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8 flex-grow">
        <!-- Flash Messages -->
        @if(session('success'))
            <div class="alert-success">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="font-medium">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif
        @if(session('error'))
            <div class="alert-error">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10A8 8 0 11 2 10a8 8 0 0116 0zm-9-4a1 1 0 112 0v4a1 1 0 11-2 0V6zm1 8a1.25 1.25 0 100-2.5 1.25 1.25 0 000 2.5z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="font-medium">{{ session('error') }}</p>
                    </div>
                </div>
            </div>
        @endif


        <!-- Page Header -->
        @hasSection('header')
            <div class="mb-8">
                @yield('header')
            </div>
        @endif

        <!-- Page Content -->
        <div class="space-y-6">
            @yield('main')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-auto">
        <div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8 text-center text-gray-500">
            <p>&copy; {{ date('Y') }} Laravel Blog. </p>
        </div>
    </footer>
</body>
</html>