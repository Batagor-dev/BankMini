<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Layout</title>
    @vite('resources/css/app.css')
  
</head>
<body class="flex bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-white min-h-screen">
    <aside class="w-64 h-screen bg-white dark:bg-gray-800 shadow-lg flex flex-col justify-between">
        <div class="p-6">
            <h2 class="text-xl font-bold text-blue-600 dark:text-white mb-8">Bank Mini</h2>
            <nav class="space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 hover:bg-blue-100 dark:hover:bg-gray-700 rounded">Dashboard</a>
                <div class="relative group">
                    <button type="button" class="w-full text-left px-4 py-2 hover:bg-blue-100 dark:hover:bg-gray-700 rounded inline-flex justify-between items-center">
                        Manajemen Akun
                        <svg class="w-4 h-4 ml-2 transform group-hover:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="hidden group-hover:block ml-4 mt-2 space-y-1">
                        <a href="{{ route('admin.users.index') }}" class="block px-4 py-2 text-sm hover:bg-blue-50 dark:hover:bg-gray-700 rounded">Nasabah</a>
                        <a href="{{ route('admin.tellers.index') }}" class="block px-4 py-2 text-sm hover:bg-blue-50 dark:hover:bg-gray-700 rounded">Teller</a>
                        <a href="{{ route('admin.admins.index') }}" class="block px-4 py-2 text-sm hover:bg-blue-50 dark:hover:bg-gray-700 rounded">Admin</a>
                    </div>
                </div>
                <a href="#" class="block px-4 py-2 hover:bg-blue-100 dark:hover:bg-gray-700 rounded">Pantau Transaksi</a>
                <a href="#" class="block px-4 py-2 hover:bg-blue-100 dark:hover:bg-gray-700 rounded">Keluhan Nasabah</a>
                <button onclick="toggleDarkMode()" class="w-full text-left px-4 py-2 hover:bg-blue-100 dark:hover:bg-gray-700 rounded">Toggle Dark Mode</button>
            </nav>
        </div>
        <div class="p-4">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="w-full px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded">Logout</button>
            </form>
        </div>
    </aside>

    <main class="flex-1 p-6">
        @yield('content')
    </main>
</body>
</html>
