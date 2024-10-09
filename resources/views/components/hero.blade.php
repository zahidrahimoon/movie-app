@php
    $backgroundImage = asset('images/harry.jpg');
@endphp

<section class="relative h-[300px] md:h-[600px] w-full overflow-hidden flex justify-center items-center bg-black">
    <!-- Background Image -->
    <div class="absolute inset-0 opacity-50 overflow-hidden">
        <img src="{{ $backgroundImage }}" alt="Movie Background" class="w-full h-full object-cover object-center">
    </div>
    
    <!-- Opacity Layer -->
    <div class="absolute bottom-0 left-0 w-full h-64 bg-gradient-to-t from-[#04152d] to-transparent"></div>
    
    <!-- Overlay Content -->
    <div class="relative z-10 text-white text-center max-w-3xl mx-auto px-4">
        <h1 class="text-5xl md:text-7xl font-bold mb-4">Booking Your Ticket</h1>
        <p class="text-lg md:text-2xl font-medium mb-6">
            Book your tickets for the latest movies and TV shows!
        </p>
        <!-- Call-to-Action Button -->
        <a href="{{ route('booking.create') }}" class="flex items-center justify-center ml-[230px] mt-4 w-48 h-12 md:w-64 md:h-16 bg-gradient-to-r from-blue-500 to-teal-400 text-white rounded-full text-lg font-semibold text-center hover:from-blue-600 hover:to-teal-500 transition duration-300">
            Book Your Ticket
            <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
            </svg>
        </a>

    </div>
</section>
