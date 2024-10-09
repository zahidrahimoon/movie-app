@props(['movie'])

<div class="w-24 md:w-32 lg:w-40 flex-shrink-0 cursor-pointer">
    <div class="relative aspect-[2/3] mb-2">
        <img src="{{ $movie['poster_path'] ?? 'images/killer.jpg' }}" alt="{{ $movie['title'] }}" class="w-full h-full object-cover rounded-lg">
        <div class="absolute -bottom-3 left-2 w-8 h-8 md:w-10 md:h-10 bg-black bg-opacity-70 rounded-full flex items-center justify-center text-xs font-bold">
            <svg class="w-full h-full -rotate-90" viewBox="0 0 36 36">
                <circle cx="18" cy="18" r="16" fill="none" stroke="#3d3d3d" stroke-width="2"></circle>
                <circle cx="18" cy="18" r="16" fill="none" stroke="#21d07a" stroke-width="2" stroke-dasharray="100" stroke-dashoffset="{{ 100 - ($movie['vote_average'] * 10) }}"></circle>
            </svg>
            <span class="absolute text-white">{{ number_format($movie['vote_average'], 1) }}</span>
        </div>
    </div>
    <div class="text-white mt-4">
        <h3 class="text-sm md:text-base mb-1 line-clamp-1">{{ $movie['title'] }}</h3>
        <p class="text-xs opacity-50">{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</p>
    </div>
</div>