<div class="relative bg-primary text-white min-h-screen">
    <!-- Backdrop Image with Opacity -->
    <div class="absolute inset-0 opacity-10">
        <img src="{{ $movie->image ?? 'https://via.placeholder.com/1920x1080' }}" 
             alt="{{ $movie->title ?? 'Movie Title' }} backdrop" 
             class="w-full h-full object-cover">
    </div>  
    
    <!-- Gradient Overlay -->
    <div class="absolute bottom-0 left-0 w-full h-64 bg-gradient-to-t from-primary to-transparent"></div>

    <div class="relative z-10 container mx-auto px-4 md:px-8 lg:px-16 py-16 md:py-24">
        <div class="flex flex-col md:flex-row md:space-x-8">
            <!-- Poster Image -->
            <div class="flex-shrink-0 mt-10 mb-6 md:mb-0">
                <img src="{{ $movie->image ?? 'https://via.placeholder.com/300x450' }}" 
                     alt="{{ $movie->title ?? 'Movie Title' }}" 
                     class="w-80 md:w-96 h-auto object-cover rounded-lg shadow-lg">
            </div>

            <!-- Movie Details -->
            <div class="flex-grow md:pl-8">
                <h1 class="text-4xl font-bold mb-2">{{ $movie->title ?? 'Movie Title' }}</h1>
                <p class="text-xl italic text-gray-400 mb-6">{{ $movie->tagline ?? 'No tagline available' }}</p>

                <!-- Genres -->
                <div class="flex flex-wrap gap-4 mb-8">
                    <span class="px-4 py-2 bg-accent rounded-full text-sm font-semibold">Action</span>
                    <span class="px-4 py-2 bg-accent rounded-full text-sm font-semibold">Fantasy</span>
                    <span class="px-4 py-2 bg-accent rounded-full text-sm font-semibold">Horror</span>
                </div

                <!-- Rating, Favorite, and Trailer -->
                <div class="flex items-center space-x-6 mb-10">
                    <!-- Rating Circle -->
                    <div class="w-20 h-20 bg-gray-900 rounded-full flex items-center justify-center relative">
                        <svg class="w-full h-full -rotate-90" viewBox="0 0 36 36">
                            <circle cx="18" cy="18" r="16" fill="none" stroke="#3d3d3d" stroke-width="2"></circle>
                            <circle cx="18" cy="18" r="16" fill="none" 
                                    stroke="#d2d531" 
                                    stroke-width="2" 
                                    stroke-dasharray="100" 
                                    stroke-dashoffset="{{ 100 - ($movie->vote_average * 10) }}">
                            </circle>
                        </svg>
                        <span class="absolute text-white text-xl font-bold">{{ $movie->vote_average ?? 'N/A' }}</span>
                    </div>
                    
                    <!-- Favorite Button -->
                    <button class="p-4 rounded-full hover:bg-opacity-80 transition-colors">
                        <svg class="w-20 h-20 text-pink-500" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </button>
                    
                    <!-- Trailer Button -->
                    <div x-data="{ showPopup: false }" class="relative">
                        <button @click="showPopup = true" class="flex items-center space-x-2 justify-center text-white font-bold py-4 px-6 rounded-full group">
                            <svg
                            version="1.1"
                            xmlns="http://www.w3.org/2000/svg"
                            xmlnsXlink="http://www.w3.org/1999/xlink"
                            x="0px"
                            y="0px"
                            width="80px"
                            height="80px"
                            viewBox="0 0 213.7 213.7"
                            enableBackground="new 0 0 213.7 213.7"
                            xmlSpace="preserve"
                            class="md:w-20 md:h-20 transition-all duration-300"
                        >
                            <polygon
                                class="triangle stroke-white group-hover:stroke-pink-500 transition-all duration-300"
                                fill="none"
                                stroke-width="7"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-miterlimit="10"
                                points="73.5,62.5 148.5,105.8 73.5,149.1"
                            ></polygon>
                            <circle
                                class="circle stroke-white group-hover:stroke-pink-500 transition-all duration-300"
                                fill="none"
                                stroke-width="7"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-miterlimit="10"
                                cx="106.8"
                                cy="106.8"
                                r="103.3"
                            ></circle>
                        </svg>
                        <span class="text-2xl text-white group-hover:text-pink-500 transition-all duration-300">Play Trailer</span>
                        </button>

                        <!-- Trailer Popup -->
                        <div x-show="showPopup" @click.away="showPopup = false" class="fixed inset-0 z-50 flex items-center justify-center">
                            <div class="bg-black bg-opacity-75 absolute inset-0"></div>
                            <div class="bg-gray-900 rounded-lg shadow-lg z-10 relative w-4/5 h-4/5">
                                <button @click="showPopup = false" class="absolute top-2 right-2 text-gray-500 hover:text-white">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                                <h2 class="text-2xl font-bold text-white p-4">{{ $movie->title ?? 'Movie Title' }} Trailer</h2>
                                <div class="w-full h-[calc(100%-4rem)]">
                                    <iframe 
                                        class="w-full h-full"
                                        src="{{ $movie->trailer_url ?? 'https://www.youtube.com/embed/dQw4w9WgXcQ' }}" 
                                        frameborder="0" 
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                        allowfullscreen>
                                    </iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Overview -->
                <div class="mb-10">
                    <h2 class="text-2xl font-bold mb-4">Overview</h2>
                    <p class="text-gray-300 leading-relaxed">
                        {{ $movie->overview ?? 'In a world where dreams and reality intertwine, a young artist discovers a hidden realm that challenges her perception of life. As she navigates through breathtaking landscapes and encounters enigmatic characters, she must confront her deepest fears. With time running out, she learns that the power of imagination can reshape her destiny.' }}
                    </p>
                </div>

                <!-- Movie Info -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="flex border-b border-gray-700 py-4">
                        <span class="font-bold mr-2 w-32">Status:</span>
                        <span>{{ $movie->status ?? 'Unknown' }}</span>
                    </div>
                    <div class="flex border-b border-gray-700 py-4">
                        <span class="font-bold mr-2 w-32">Release Date:</span>
                        <span>{{ $movie->release_date ?? 'TBA' }}</span>
                    </div>
                    <div class="flex border-b border-gray-700 py-4">
                        <span class="font-bold mr-2 w-32">Runtime:</span>
                        <span>{{ $movie->runtime ?? 'N/A' }} mins</span>
                    </div>
                    <div class="flex border-b border-gray-700 py-4">
                        <span class="font-bold mr-2 w-32">Director:</span>
                        <span>{{ $movie->director ?? 'Unknown' }}</span>
                    </div>
                    <div class="flex border-b border-gray-700 py-4 col-span-2">
                        <span class="font-bold mr-2 w-32">Writer:</span>
                        <span>{{ implode(', ', $movie->writers ?? ['Unknown']) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
