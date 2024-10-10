<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinamaze | Sign Up</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href={{'images/cinemaze-logo-favi.ico'}} type="image/x-icon">
    @vite('resources/css/app.css')
    <!-- Include Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="bg-primary dark:bg-gray-900 font-oswald">
    <section class="flex flex-col md:flex-row h-screen">
        <!-- Image Section -->
        <div class="w-full md:w-2/3 bg-gray-800 dark:bg-gray-900 flex items-center justify-center">
            <img src="{{asset('images/hero-bg.jpg')}}" alt="logo" class="w-full h-full object-cover">
        </div>

        <!-- Form Section -->
        <div class="w-full md:w-1/3 flex items-center justify-center dark:bg-gray-800">
            <div class="w-full max-w-md p-6 space-y-4 bg-white rounded-lg shadow-md dark:bg-gray-900 dark:border dark:border-gray-700">
                <h1 class="text-xl text-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Sign Up
                </h1>

                <form class="space-y-4 md:space-y-6" method="POST">
                    @csrf

                    <!-- Name Field -->
                    <div class="relative">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" class="bg-gray-50 border @error('name') border-red-500 @else border-gray-300 @enderror text-gray-900 rounded-lg pl-10 focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Name" required>
                        @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <i class="fas fa-user absolute left-3 top-1/2 mt-4 transform -translate-y-1/2 text-gray-400 dark:text-gray-500"></i>
                    </div>

                    <!-- Email Field -->
                    <div class="relative">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" class="bg-gray-50 border @error('email') border-red-500 @else border-gray-300 @enderror text-gray-900 rounded-lg pl-10 focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="name@company.com" required>
                        @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <i class="fas fa-envelope absolute left-3 top-1/2 mt-4 transform -translate-y-1/2 text-gray-400 dark:text-gray-500"></i>
                    </div>

                    <!-- Password Field -->
                    <div class="relative">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" name="password" id="password" class="bg-gray-50 border @error('password') border-red-500 @else border-gray-300 @enderror text-gray-900 rounded-lg pl-10 focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="••••••••" required>
                        @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <i class="fas fa-lock absolute left-3 top-1/2 mt-3 transform -translate-y-1/2 text-gray-400 dark:text-gray-500"></i>
                    </div>

                    <!-- Password Confirmation Field -->
                    <div class="relative">
                        <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="bg-gray-50 border @error('password_confirmation') border-red-500 @else border-gray-300 @enderror text-gray-900 rounded-lg pl-10 focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="••••••••" required>
                        @error('password_confirmation')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <i class="fas fa-lock absolute left-3 top-1/2 mt-3 transform -translate-y-1/2 text-gray-400 dark:text-gray-500"></i>
                    </div>



                    <button type="submit" class="w-full text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Sign Up</button>

                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        Do You Have an Account ? <a href="{{ route('login')}}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign In</a>
                    </p>
                </form>
            </div>
            <!-- Additional Buttons Section -->
            <div class="flex flex-col ml-5 space-y-2 mt-6">
                <a href={{route('login')}} class="w-full text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    <i class="fas fa-user"></i> User
                </a>
                <a href={{route('admin.login')}} class="w-full text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                    <i class="fas fa-user-shield"></i> Admin
                </a>
            </div>
        </div>
    </section>
</body>

</html>