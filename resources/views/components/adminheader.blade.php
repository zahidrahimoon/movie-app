<header x-data="{ open: false }" class="fixed top-0 left-0 w-full px-4 sm:px-6 lg:px-8 py-2 bg-gradient-to-t from-secondary to-transparent bg-opacity-10 backdrop-blur-md z-50 group overflow-hidden">
    <div class="absolute inset-0 transform -translate-x-full group-hover:translate-x-full transition-transform duration-500 bg-gradient-to-r from-transparent via-white to-transparent opacity-40"></div>
    <div class="max-w-7xl mx-auto flex justify-between items-center relative z-10">
        <a href="#" class="text-white text-2xl font-semibold">
            <img src="{{ asset('images/cinemaze-logo.png') }}" width="200" height="200" alt="Cinemaze Logo">
        </a>

        <div class="flex items-center">
            <div class="flex items-center space-x-4">
                <!-- Static user image -->
                
                <!-- Logout button -->
                <button onclick="window.location.href='{{ route('admin.login') }}'" class="flex items-center text-white hover:text-red-500 transition duration-300">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    Logout
                </button>
            </div>

            <button @click="open = !open" class="text-white text-3xl lg:hidden ml-4">
                <i class='bx' :class="open ? 'bx-x' : 'bx-menu'"></i>
            </button>
        </div>
    </div>
</header>