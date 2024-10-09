<div>
    <div class="cursor-pointer text-pink-500 hover:text-pink-600 transition-colors duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 md:h-20 md:w-20 lg:h-24 lg:w-24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
        </svg>
    </div>

    <!-- Modal placeholder (you can implement this later with Alpine.js or a Laravel package) -->
    <div class="hidden">
        <!-- Modal content will go here -->
    </div>
</div>

<div>
    <svg class="w-20 h-20 md:w-24 md:h-24 text-white hover:text-pink-500 transition-colors duration-300 cursor-pointer" viewBox="0 0 213.7 213.7" xmlns="http://www.w3.org/2000/svg">
        <polygon class="triangle fill-none stroke-current stroke-7 rounded" points="73.5,62.5 148.5,105.8 73.5,149.1" />
        <circle class="circle fill-none stroke-current stroke-7 rounded" cx="106.8" cy="106.8" r="103.3" />
    </svg>
</div>

<div class="bg-gray-900 text-white pb-12 md:pb-0 md:min-h-screen relative">
    <div class="absolute inset-0 opacity-10 overflow-hidden">
        <div class="w-full h-full bg-cover bg-center" style="background-image: url('path/to/backdrop-image.jpg');"></div>
    </div>
    <div class="absolute bottom-0 left-0 w-full h-64 bg-gradient-to-t from-gray-900 to-transparent"></div>

    <div class="relative container mx-auto px-4 pt-24 md:pt-32 flex flex-col md:flex-row gap-8 md:gap-12">
        <div class="flex-shrink-0">
            <img src="path/to/poster-image.jpg" alt="Movie Title" class="w-full md:max-w-sm rounded-lg shadow-lg">
        </div>
        <div class="text-white">
            <h1 class="text-4xl md:text-5xl font-bold mb-2">Movie Title</h1>
            <p class="text-xl md:text-2xl italic opacity-75 mb-4">Tagline goes here</p>
            <div class="flex flex-wrap gap-2 mb-6">
                <span class="px-3 py-1 bg-red-600 rounded-full text-sm font-semibold">Action</span>
                <span class="px-3 py-1 bg-blue-600 rounded-full text-sm font-semibold">Adventure</span>
                <span class="px-3 py-1 bg-green-600 rounded-full text-sm font-semibold">Sci-Fi</span>
            </div>
            <div class="flex items-center gap-6 mb-8">
                <!-- Rating circle (you can implement this with a package or custom CSS) -->
                <div class="w-16 h-16 bg-gray-800 rounded-full flex items-center justify-center text-2xl font-bold">8.5</div>
                <!-- Heart icon (from above) -->
                <!-- Play button (from above) -->
            </div>
            <div class="mb-8">
                <h2 class="text-2xl font-bold mb-2">Overview</h2>
                <p class="text-gray-300 leading-relaxed">Movie overview text goes here...</p>
            </div>
            <div class="space-y-4">
                <div class="flex">
                    <span class="font-bold mr-2">Status:</span>
                    <span>Released</span>
                </div>
                <div class="flex">
                    <span class="font-bold mr-2">Release Date:</span>
                    <span>June 1, 2023</span>
                </div>
                <div class="flex">
                    <span class="font-bold mr-2">Runtime:</span>
                    <span>2h 30m</span>
                </div>
            </div>
        </div>
    </div>
</div>