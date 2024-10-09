<div x-show="showPopup" @click.away="showPopup = false" class="fixed inset-0 z-50 flex items-center justify-center">
    <div class="bg-black bg-opacity-75 absolute inset-0"></div>
    <div class="bg-gray-900 p-8 rounded-lg shadow-lg z-10 relative">
        <button @click="showPopup = false" class="absolute top-2 right-2 text-gray-500 hover:text-white">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
        <!-- Add your popup content here -->
        <h2 class="text-2xl font-bold text-white mb-4">{{ $movie->title }} Trailer</h2>
        <!-- You can add an iframe for the movie trailer here -->
        <div class="aspect-w-16 aspect-h-9">
            <!-- Replace with actual trailer embed code -->
            <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </div>
    </div>
</div>