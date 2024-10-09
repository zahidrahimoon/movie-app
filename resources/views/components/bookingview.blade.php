@auth
    @if($bookings->count() > 0)
        <div class="container mx-auto px-4 py-8">
            <h2 class="text-2xl font-bold mb-4 text-white text-center">Your Bookings</h2>
            <div class="overflow-x-auto">
                @if(session('success'))
                    <div class="alert alert-success mb-4">{{ session('success') }}</div>
                @endif
                <div class="flex justify-center">
                    <div x-data="{ loading: true }" x-init="setTimeout(() => loading = false, 1000)">
                        <div x-show="loading" class="flex justify-center items-center">
                            <div class="animate-spin rounded-full h-32 w-32 border-t-2 border-b-2 border-white"></div>
                        </div>
                        <table x-show="!loading" class="table-auto border-collapse border border-white text-white">
                            <thead>
                                <tr>
                                    <th class="border border-white px-4 py-2">Name</th>
                                    <th class="border border-white px-4 py-2">Phone</th>
                                    <th class="border border-white px-4 py-2">Movie</th>
                                    <th class="border border-white px-4 py-2">Theater</th>
                                    <th class="border border-white px-4 py-2">Location</th>
                                    <th class="border border-white px-4 py-2">Date</th>
                                    <th class="border border-white px-4 py-2">Seats</th>
                                    <th class="border border-white px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bookings as $booking)
                                <tr>
                                    <td class="border border-white px-4 py-2">{{ $booking->name }}</td>
                                    <td class="border border-white px-4 py-2">{{ $booking->phone }}</td>
                                    <td class="border border-white px-4 py-2">{{ $booking->movie_cards->title ?? 'N/A' }}</td>
                                    <td class="border border-white px-4 py-2">{{ $booking->theater->name ?? 'N/A' }}</td>
                                    <td class="border border-white px-4 py-2">{{ $booking->geoLocation->city ?? 'N/A' }}</td>
                                    <td class="border border-white px-4 py-2">{{ $booking->date ?? 'N/A' }}</td>
                                    <td class="border border-white px-4 py-2">{{ $booking->seats ?? 'N/A' }}</td>
                                    <td class="border border-white px-4 py-2">
                                        <div class="flex justify-center space-x-2">
                                            <button onclick="confirmDelete({{ $booking->id }})" class="btn bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded">
                                                <i class="fas fa-trash-alt mr-1"></i> Delete
                                            </button>

                                            <script>
                                            function confirmDelete(bookingId) {
                                                if (confirm('Do you want to delete this booking?')) {
                                                    var form = document.createElement('form');
                                                    form.method = 'POST';
                                                    form.action = '{{ route('booking.destroy', '') }}/' + bookingId;
                                                    form.innerHTML = '@csrf @method('DELETE')';
                                                    document.body.appendChild(form);
                                                    form.submit();
                                                }
                                            }
                                            </script>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container mx-auto px-4 py-8">
            <p class="text-lg text-center text-white">You have no bookings yet.</p>
        </div>
    @endif
@else
    <div class="container mx-auto px-4 py-8">
        <p class="text-lg text-center text-white">Please log in to view your bookings.</p>
    </div>
@endauth
