<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('images/ZARA_LOGO.png') }}" type="image/x-icon">
    @vite('resources/css/app.css')
    <!-- Include Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="bg-gray-50 dark:bg-gray-900 font-oswald">
    <section class="flex flex-col md:flex-row h-screen">
        <!-- Image Section -->
        <div class="w-full md:w-2/3 bg-gray-800 dark:bg-gray-900 flex items-center justify-center">
            <img src="https://media.gettyimages.com/id/526239055/photo/paramedics-taking-patient-on-stretcher-from-ambulance-to-hospital.jpg?s=612x612&w=0&k=20&c=c9pLkO97DiKc5abLs7C753mDqi5otupcm7ytLsZiY_I=" alt="logo" class="w-full h-full object-cover">
        </div>

        <!-- Form Section -->
        <div class="w-full md:w-1/3 flex items-center justify-center bg-gray-100 dark:bg-gray-800">
            <div class="w-full max-w-md p-6 space-y-4 bg-white rounded-lg shadow-md dark:bg-gray-900 dark:border dark:border-gray-700">
                <h1 class="text-xl text-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Sign in
                </h1>

                <form class="space-y-4 md:space-y-6" method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Display Validation Errors -->
                    @if ($errors->any())
                    <div class="bg-red-500 text-white p-3 rounded mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="relative">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg pl-10 focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="name@company.com" required>
                        <i class="fas fa-envelope absolute left-3 top-1/2 mt-4 transform -translate-y-1/2 text-gray-400 dark:text-gray-500"></i>
                    </div>

                    <div class="relative">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg pl-10 focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                        <i class="fas fa-lock absolute left-3 top-1/2 mt-3 transform -translate-y-1/2 text-gray-400 dark:text-gray-500"></i>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-start">
                            <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-500 dark:ring-offset-gray-800">
                            <label for="remember" class="ml-3 text-sm text-gray-500 dark:text-gray-300">Remember me</label>
                        </div>
                        <a href="#" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot password?</a>
                    </div>

                    <button type="submit" class="w-full text-white bg-green-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign in</button>

                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        Don’t have an account yet? <a href="{{ route('signup') }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</a>
                    </p>
                </form>
            </div>
        </div>
        <!-- Additional Buttons Section -->
        <div class="flex flex-col items-center justify-center min-h-srceen space-y-2 mt-6 bg-gray-100 pr-2">
            <a href="{{ route('login') }}" class="w-full text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                <i class="fas fa-user"></i> User
            </a>
        </div>
        </div>

    </section>
</body>

</html>