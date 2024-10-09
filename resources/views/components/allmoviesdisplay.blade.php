<div x-data="{ loading: true }" x-init="setTimeout(() => loading = false, 1000)" class="container mx-auto px-4 py-12 max-w-[10000px]">
    <!-- Loader -->
    <div x-show="loading" class="flex justify-center items-center h-64">
        <div class="animate-spin rounded-full h-32 w-32 border-t-2 border-b-2 border-blue-500"></div>
    </div>

    <!-- Movie Grid -->
    <div x-show="!loading" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-5 gap-5">
        @foreach($movie_cards as $movie)
            <a href="{{ route('movie.details', $movie->id) }}" class="w-full cursor-pointer group">
                <div class="relative aspect-[2/3] mb-3 overflow-hidden rounded-lg shadow-md">
                    <img src="{{ $movie->image }}" 
                         alt="{{ $movie->title }}" 
                         class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                    
                    <!-- Hover Overlay -->
                    <div class="absolute inset-0 bg-black bg-opacity-80 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div x-data="{ showPopup: false }" class="flex items-center gap-5 cursor-pointer group">
                            <svg
                                @click="showPopup = true"
                                version="1.1"
                                xmlns="http://www.w3.org/2000/svg"
                                xmlnsXlink="http://www.w3.org/1999/xlink"
                                x="0px"
                                y="0px"
                                width="60px"
                                height="60px"
                                viewBox="0 0 213.7 213.7"
                                enableBackground="new 0 0 213.7 213.7"
                                xmlSpace="preserve"
                                class="md:w-20 md:h-20"
                            >
                                <polygon
                                    class="triangle stroke-white group-hover:stroke-pink-500 transition-all duration-700 ease-in-out"
                                    fill="none"
                                    stroke-width="7"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-miterlimit="10"
                                    points="73.5,62.5 148.5,105.8 73.5,149.1"
                                    style="stroke-dasharray: 240; stroke-dashoffset: 480;"
                                ></polygon>
                                <circle
                                    class="circle stroke-white group-hover:stroke-pink-500 transition-all duration-500 ease-in-out"
                                    fill="none"
                                    stroke-width="7"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-miterlimit="10"
                                    cx="106.8"
                                    cy="106.8"
                                    r="103.3"
                                    style="stroke-dasharray: 650; stroke-dashoffset: 1300;"
                                ></circle>
                            </svg>
                            <span class="text-2xl transition-all duration-700 ease-in-out group-hover:text-pink-500">Play Trailer</span>

                            <!-- Popup component -->
                            <div x-show="showPopup" @click.away="showPopup = false" x-init="$watch('showPopup', value => { if (!value) $refs.youtubeIframe.src = $refs.youtubeIframe.src; })" class="fixed inset-0 z-50 flex items-center justify-center">
                                <div class="bg-black bg-opacity-75 absolute inset-0"></div>
                                <div class="bg-gray-900 rounded-lg shadow-lg z-10 relative w-4/5 h-4/5">
                                    <button @click="showPopup = false" class="absolute top-2 right-2 text-gray-500 hover:text-white">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                    <h2 class="text-2xl font-bold text-white p-4">{{ $movie->title }} Trailer</h2>
                                    <div class="w-full h-[calc(100%-4rem)]">
                                        <iframe 
                                            x-ref="youtubeIframe"
                                            class="w-full h-full"
                                            src="https://www.youtube.com/embed/{{ $movie->video }}" 
                                            frameborder="0" 
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                            allowfullscreen>
                                        </iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <style>
                            .group:hover .triangle {
                                stroke-dashoffset: 0;
                                opacity: 1;
                                animation: trailorPlay 0.7s ease-in-out;
                            }
                            .group:hover .circle {
                                stroke-dashoffset: 0;
                            }
                            @keyframes trailorPlay {
                                0% {
                                    stroke-dashoffset: 480;
                                }
                                100% {
                                    stroke-dashoffset: 0;
                                }
                            }
                        </style>
                    </div>

                    <!-- Rating Circle -->
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
            </a>
        @endforeach
    </div>
</div>
