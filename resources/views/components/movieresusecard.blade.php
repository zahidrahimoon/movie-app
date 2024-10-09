<!-- resources/views/components/movie-card.blade.php -->
<div class="w-full cursor-pointer group">
    <div class="relative aspect-[2/3] mb-3 overflow-hidden rounded-lg shadow-md">
        <img src="{{ $movie->image }}" alt="{{ $movie->title }}" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
        
        <!-- Hover Overlay and other features from your existing code -->
        <!-- ... -->
        
        <!-- Rating Circle (This part remains the same) -->
        <div class="absolute -bottom-7 left-3 w-12 h-12 sm:w-14 sm:h-14 md:w-16 md:h-16 bg-gray-900 rounded-full flex items-center justify-center text-xs sm:text-sm md:text-base font-bold z-10 transform -translate-y-1/2">
            <svg class="w-full h-full -rotate-90" viewBox="0 0 36 36">
                <circle cx="18" cy="18" r="16" fill="none" stroke="#3d3d3d" stroke-width="2"></circle>
                <circle cx="18" cy="18" r="16" fill="none" 
                        stroke="{{ $movie->vote_average >= 8 ? '#21d07a' : ($movie->vote_average >= 4 ? '#d2d531' : '#db2360') }}" 
                        stroke-width="2" 
                        stroke-dasharray="100" 
                        stroke-dashoffset="{{ 100 - ($movie->vote_average * 10) }}">
                </circle>
            </svg>
            <span class="absolute text-white text-xs sm:text-sm md:text-base">{{ number_format($movie->vote_average, 1) }}</span>
        </div>
    </div>
    <div class="text-white mt-4">
        <h3 class="text-lg font-medium mb-1 line-clamp-1">{{ $movie->title }}</h3>
        <p class="text-lg text-gray-400">{{ \Carbon\Carbon::parse($movie->release_date)->format('M d, Y') }}</p>
    </div>
</div>
