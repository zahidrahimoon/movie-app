<header x-data="{ open: false, isLoggedIn: @json(Auth::check()) }" class="fixed top-0 left-0 w-full px-4 sm:px-6 lg:px-8 py-2 bg-gradient-to-t from-primary to-transparent bg-opacity-10 backdrop-blur-md z-50 group overflow-hidden">
        <div class="absolute inset-0 transform -translate-x-full group-hover:translate-x-full transition-transform duration-500 bg-gradient-to-r from-transparent via-white to-transparent opacity-40"></div>
        <div class="max-w-7xl mx-auto flex justify-between items-center relative z-10">
            <a href="#" class="text-white text-2xl font-semibold">
                <img src="{{ asset('images/cinemaze-logo.png') }}" width="200" height="200" alt="Cinemaze Logo">
            </a>

            <div class="flex items-center">
                <nav class="hidden lg:flex space-x-8 mr-4">
                    <a href="{{ route('movies.index') }}" class="text-white font-semibold mt-2 text-center hover:text-red-500 transition duration-300">Movie</a>
                    <a href="{{ route('booking.create') }}" class="text-white mt-2 font-semibold text-center hover:text-red-500 transition duration-300">Booking</a>
                </nav>

                <template x-if="isLoggedIn">
                    <div class="relative" x-data="{ userMenuOpen: false }">
                        <button @click="userMenuOpen = !userMenuOpen" class="flex items-center text-white hover:text-red-500 transition duration-300">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div x-show="userMenuOpen" @click.away="userMenuOpen = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                            <a href="{{ route('profile.update') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                            <a href="{{ route('booking.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Booking</a>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button>
                            </form>
                        </div>
                    </div>
                </template>

                <template x-if="!isLoggedIn">
                    <a href="{{ route('login') }}" class="flex items-center bg-gradient-to-r from-blue-500 to-teal-400 hover:from-blue-600 hover:to-teal-500 transition duration-300 text-white font-bold py-2 px-4 rounded-lg">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                        Login
                    </a>
                </template>

                <button @click="open = !open" class="text-white text-3xl lg:hidden ml-4">
                    <i class='bx' :class="open ? 'bx-x' : 'bx-menu'"></i>
                </button>
            </div>
        </div>

        <nav x-show="open" x-transition class="lg:hidden mt-4 py-2 bg-white bg-opacity-10 backdrop-blur-md border-b-2 border-white border-opacity-20">
            <a href="{{ route('movies.index') }}" class="block px-4 py-2 text-white hover:text-red-500 transition duration-300">Movie</a>
            <a href="{{ route('booking.create') }}" class="block px-4 py-2 text-white hover:text-red-500 transition duration-300">Booking</a>
        </nav>
    </header>