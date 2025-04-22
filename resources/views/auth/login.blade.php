<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Banking System</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://unpkg.com/@phosphor-icons/web@2.0.3/src/bold/style.css">
    <style>
        /* Glass morphism effect */
        .glass-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        /* Input focus effect */
        .input-focus:focus {
            box-shadow: 0 0 0 3px rgba(58, 125, 255, 0.2);
        }

        /* Smooth transitions */
        .transition-smooth {
            transition: all 0.3s ease-in-out;
        }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-blue-600 to-indigo-800 flex items-center justify-center p-4">
    <!-- Login Form Container -->
    <div class="w-full max-w-md">
        <div class="bg-white rounded-2xl overflow-hidden shadow-2xl transition-smooth hover:shadow-xl">
            <!-- Form Header -->
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 p-6 text-center">
                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="ph-bold ph-lock-key text-white text-2xl"></i>
                </div>
                <h2 class="text-2xl font-bold text-white">Secure Login</h2>
                <p class="text-blue-100 mt-1">Enter your credentials to continue</p>
            </div>

            <!-- Form Content -->
            <div class="bg-white p-6 sm:p-8">
                <!-- Error Message -->
                @if($errors->any())
                    <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded mb-6">
                        <div class="flex items-center">
                            <i class="ph-bold ph-warning-circle text-red-500 text-xl mr-3"></i>
                            <div class="text-red-700">{{ $errors->first() }}</div>
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ url('/login') }}" class="space-y-5">
                    @csrf

                    <!-- Username Field -->
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                            <i class="ph-bold ph-user text-gray-500 mr-2"></i>
                            Username
                        </label>
                        <div class="relative">
                            <input type="text" id="username" name="username" placeholder="Enter your username" required
                                class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-lg input-focus focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-smooth">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <i class="ph-bold ph-user text-gray-400"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                            <i class="ph-bold ph-lock text-gray-500 mr-2"></i>
                            Password
                        </label>
                        <div class="relative">
                            <input type="password" id="password" name="password" placeholder="Enter your password"
                                required
                                class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-lg input-focus focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-smooth">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <i class="ph-bold ph-lock text-gray-400"></i>
                            </div>
                            <button type="button" onclick="togglePasswordVisibility()"
                                class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-gray-600 focus:outline-none">
                                <i id="eye-icon" class="ph-bold ph-eye"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember" name="remember" type="checkbox"
                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded transition-smooth">
                            <label for="remember" class="ml-2 block text-sm text-gray-700">
                                Remember me
                            </label>
                        </div>
                        <a href="#" class="text-sm text-blue-600 hover:underline transition-smooth">
                            Forgot password?
                        </a>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full py-3 px-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold rounded-lg hover:from-blue-700 hover:to-indigo-700 transition-smooth shadow-md flex items-center justify-center">
                        <i class="ph-bold ph-arrow-right mr-2"></i> Sign In
                    </button>
                </form>

                <!-- Footer Links -->
                <div class="mt-6 text-center text-sm text-gray-500">
                    Don't have an account? <a href="#"
                        class="text-blue-600 font-medium hover:underline transition-smooth">Contact support</a>
                </div>
            </div>
        </div>

        <!-- Security Badge -->
        <div class="flex items-center justify-center mt-6 text-white/80 text-sm">
            <i class="ph-bold ph-shield-check mr-2"></i>
            <span>256-bit SSL Encryption</span>
        </div>
    </div>

    <script>
        // Password visibility toggle
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('ph-eye');
                eyeIcon.classList.add('ph-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('ph-eye-slash');
                eyeIcon.classList.add('ph-eye');
            }
        }
    </script>
</body>

</html>