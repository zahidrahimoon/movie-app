<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href={{'images/cinemaze-logo-favi.ico'}} type="image/x-icon">
    <title>Cinemaze | Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
    </style>
    @vite('resources/css/app.css')
</head>
<body class="bg-cover bg-center bg-no-repeat  bg-primary">
    @include('components.adminheader')
    <div class="flex justify-between">
        <div class="w-[30%]">
            @include('components.adminsidebar')
        </div>
        <div class="w-[80%] mt-[70px] mr-[100px]">
            <section class="py-10 h-screen w-[100%] mx-auto">
                <div class="container mx-auto">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-12">
                        <!-- Users Card -->
                        <div class="bg-secondary p-6 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300 overflow-hidden group w-[90%] mx-auto">
                            <div class="relative flex justify-center">
                                <svg class="w-16 h-16 text-blue-500 mb-4 group-hover:animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                            <h2 class="text-2xl font-semibold text-white mb-2 text-center group-hover:text-blue-300 transition-colors duration-300">Users</h2>
                            <p class="text-3xl font-bold text-blue-500 text-center">{{ $userCount }}</p>
                        </div>
            
                        <!-- Theaters Card -->
                        <div class="bg-secondary p-6 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300 overflow-hidden group w-[90%] mx-auto">
                            <div class="relative flex justify-center">
                                <svg class="w-16 h-16 text-green-500 mb-4 group-hover:animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                            <h2 class="text-2xl font-semibold text-white mb-2 text-center group-hover:text-green-300 transition-colors duration-300">Theaters</h2>
                            <p class="text-3xl font-bold text-green-500 text-center">{{ $theaterCount }}</p>
                        </div>
            
                        <!-- Movies Card -->
                        <div class="bg-secondary p-6 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300 overflow-hidden group w-[90%] mx-auto">
                            <div class="relative flex justify-center">
                                <svg class="w-16 h-16 text-red-500 mb-4 group-hover:animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"></path>
                                </svg>
                            </div>
                            <h2 class="text-2xl font-semibold text-white mb-2 text-center group-hover:text-red-300 transition-colors duration-300">Movies</h2>
                            <p class="text-3xl font-bold text-red-500 text-center">{{ $movieCount }}</p>
                        </div>
            
                        <!-- Bookings Card -->
                        <div class="bg-secondary p-6 rounded-lg shadow-lg transform hover:scale-105 transition-transform duration-300 overflow-hidden group w-[90%] mx-auto">
                            <div class="relative flex justify-center">
                                <svg class="w-16 h-16 text-purple-500 mb-4 group-hover:animate-wiggle" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                                </svg>
                            </div>
                            <h2 class="text-2xl font-semibold text-white mb-2 text-center group-hover:text-purple-300 transition-colors duration-300">Bookings</h2>
                            <p class="text-3xl font-bold text-purple-500 text-center">{{ $bookingCount }}</p>
                        </div>
                    </div>
                </div>
            </section>

            
        </div>
    </div>
    @include('components.adminfooter')
 
    @vite('resources/js/app.js')
</body>
</html>