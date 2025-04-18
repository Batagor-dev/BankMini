<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-semibold text-center text-gray-700 mb-6">Login</h2>

        @if($errors->any())
            <p class="text-red-500 text-sm text-center">{{ $errors->first() }}</p>
        @endif

        <form method="POST" action="{{ url('/login') }}">
            @csrf

            <div class="mb-4">
                <input type="text" name="username" placeholder="Username" required 
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div class="mb-6">
                <input type="password" name="password" placeholder="Password" required 
                       class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <button type="submit" 
                    class="w-full py-2 px-4 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Login
            </button>
        </form>
    </div>
</body>

</html>
