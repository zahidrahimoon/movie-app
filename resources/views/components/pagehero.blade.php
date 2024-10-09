@props(['title', 'subtitle', 'backgroundImage'])

<section class="relative h-[50vh] w-full overflow-hidden flex justify-center items-center bg-black">
    <!-- Background Image -->
    <div class="absolute inset-0 opacity-50 overflow-hidden">
        <img src="{{ $backgroundImage }}" alt="Hero Background" class="w-full h-full object-cover object-center">
    </div>
    
    <!-- Opacity Layer -->
    <div class="absolute inset-0 bg-primary opacity-70"></div>
    
    <!-- Overlay Content -->
    <div class="relative z-10 text-white text-center max-w-3xl mx-auto px-4">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">{{ $title }}</h1>
        @if ($subtitle)
            <p class="text-lg italic md:text-xl font-medium">
                {{ $subtitle }}
            </p>
        @endif
        
    </div>
</section>
