<section class="bg-primary py-16" x-data="{ termsAccepted: false, showTerms: false }">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-stretch">
            <div class="hidden lg:block h-full">
                <div class="h-full w-full rounded-lg shadow-lg overflow-hidden">
                    <img src="https://img.freepik.com/premium-photo/cartoon-girl-holding-sign-that-says-de_869640-213214.jpg?size=626&ext=jpg" 
                         alt="Movie Theater" 
                         class="w-full h-full object-cover object-center">
                </div>
            </div>
            <div class="bg-secondary p-8 rounded-lg shadow-lg">
                <h2 class="text-3xl font-bold mb-6 text-white flex items-center">
                    <svg class="w-8 h-8 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"></path>
                    </svg>
                    Booking Form
                </h2>
                <form action="{{ route('booking.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-300 text-sm font-bold mb-2">Name</label>
                        <input type="text" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label for="phone" class="block text-gray-300 text-sm font-bold mb-2">Phone</label>
                        <input type="tel" id="phone" name="phone" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label for="movie" class="block text-gray-300 text-sm font-bold mb-2">Movie</label>
                        <select id="movie" name="movie" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            <option value="">Select a Movie</option>
                            @foreach($movie_cards as $movie)
                                <option value="{{ $movie->id }}">{{ $movie->title }}</option>
                            @endforeach
                        </select>   
                    </div>
                    <div class="mb-4">
                        <label for="theater" class="block text-gray-300 text-sm font-bold mb-2">Theater</label>
                        <select id="theater" name="theater" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            <option value="">Select a Theater</option>
                            @foreach($theaters as $theater)
                                <option value="{{ $theater->id }}">{{ $theater->theater_name }}</option>
                            @endforeach
                        </select>   
                    </div>
                    <div class="mb-4">
                        <label for="location" class="block text-gray-300 text-sm font-bold mb-2">Location</label>
                        <select id="location" name="location" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            <option value="">Select a Location</option>
                            @foreach($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->location_name }}</option>
                            @endforeach
                        </select>   
                    </div>
                    
                    <div class="mb-4">
                        <label for="date" class="block text-gray-300 text-sm font-bold mb-2">Date</label>
                        <input type="date" id="date" name="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label for="time" class="block text-gray-300 text-sm font-bold mb-2">Time</label>
                        <input type="time" id="time" name="time" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>             
                    <div class="mb-4">
                        <label for="seats" class="block text-gray-300 text-sm font-bold mb-2">Seats</label>
                        <input type="number" id="seats" name="seats" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label for="terms" class="flex items-center text-gray-300 text-sm font-bold">
                            <input type="checkbox" id="terms" name="terms" class="mr-2 leading-tight" x-model="termsAccepted" required>
                            <span>
                                I agree to the <button type="button" @click="showTerms = true" class="text-blue-500 hover:text-blue-600">Terms and Conditions</button>
                            </span>
                        </label>
                    </div>
                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" :disabled="!termsAccepted">Book Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Terms and Conditions Popup -->
    <div x-show="showTerms" x-cloak @click.away="showTerms = false" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white p-8 rounded-lg max-w-lg max-h-[80vh] overflow-y-auto" @click.stop>
            <h3 class="text-2xl font-bold mb-4">Terms and Conditions</h3>
            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nunc id aliquam tincidunt, nisl nunc tincidunt nunc, vitae aliquam nunc nunc vitae nunc. Sed euismod, nunc id aliquam tincidunt, nisl nunc tincidunt nunc, vitae aliquam nunc nunc vitae nunc.</p>
            <button @click="showTerms = false" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Close</button>
        </div>
    </div>
</section>