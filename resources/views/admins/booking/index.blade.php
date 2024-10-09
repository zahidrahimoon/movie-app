<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ 'images/cinemaze-logo-favi.ico' }}" type="image/x-icon">
    <title>Cinemaze | Admin | Movies</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            color: #e5e7eb; /* Light text */
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            font-size: 2rem;
            color: #fff;
        }

        .alert {
            background-color: #4caf50; /* Success green */
            color: white;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .table {
            width: 80%;
            border-collapse: collapse;
            overflow: hidden;
            margin-left: 270px;

        }

        th, td {
            border: 1px solid #4b5563; /* Table cell border */
            padding: 12px;
            text-align: left;
            white-space: nowrap; /* Prevent text wrapping */
            overflow: hidden; /* Hide overflow */
            text-overflow: ellipsis; /* Show ellipsis for overflow text */
        }

        th {
            background-color: #2563eb; /* bg-primary */
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #3f4c7a; /* Alternate row color */
        }

        .btn {
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            font-weight: 500;
            transition: background-color 0.3s ease-in-out;
            border: none;
            cursor: pointer;
        }

        .btn-red {
            background-color: #ef4444; /* Tailwind's 'red-500' */
            color: #fff;
        }

        .btn-red:hover {
            background-color: #dc2626; /* Tailwind's 'red-600' */
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .flex {
                flex-direction: column;
            }
            .w-[30%], .w-[70%] {
                width: 100%;
            }
            .mt-[100px] {
                margin-top: 20px;
            }
            .mr-[20px] {
                margin-right: 0;
            }
            .px-4 {
                padding: 0 1rem;
            }
            .py-8 {
                padding: 3rem 0;
            }
        }

        /* Full width and height for the container */
        .full-height {
            height: calc(100vh - 80px); /* Adjust based on header/footer height */
            display: flex;
            flex-direction: column;
        }
    </style>
    @vite('resources/css/app.css')
</head>
<body class="bg-primary">
    @include('components.adminheader')

    <div class="flex full-height">
        <div class="w-[30%]">
            @include('components.adminsidebar')
        </div>
        <div class="w-[90%] mt-[100px]">
            <div class="container flex-grow">
                <h2 class="text-3xl p-4 font-playfair font-bold">All User Bookings</h2>
                
                <div class="overflow-hidden">
                    @if(session('success'))
                        <div class="alert">{{ session('success') }}</div>
                    @endif
                    <table class="table bg-secondary hover:bg-primary">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Movie</th>
                                <th>Theater</th>
                                <th>Location</th>
                                <th>Date</th>
                                <th>Seats</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookings as $booking)
                            <tr>
                                <td>{{ $booking->user->name }}</td>
                                <td>{{ $booking->name }}</td>
                                <td>{{ $booking->phone }}</td>
                                <td>{{ $booking->movie_cards->title ?? 'N/A' }}</td>
                                <td>{{ $booking->theater->theater_name ?? 'N/A' }}</td>
                                <td>{{ $booking->geoLocation->location_name ?? 'N/A' }}</td>
                                <td>{{ $booking->date }}</td>
                                <td>{{ $booking->seats }}</td>
                                <td>
                                    <button onclick="confirmDelete({{ $booking->id }})" class="btn btn-red">
                                        <i class="fas fa-trash-alt mr-1"></i> Delete
                                    </button>
                                    <script>
                                    function confirmDelete(bookingId) {
                                        if (confirm('Do you want to delete this booking?')) {
                                            var form = document.createElement('form');
                                            form.method = 'POST';
                                            form.action = '{{ route('admins.booking.destroy', '') }}/' + bookingId;
                                            form.innerHTML = '@csrf @method('DELETE')';
                                            document.body.appendChild(form);
                                            form.submit();
                                        }
                                    }
                                    </script>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('components.adminfooter')

    @vite('resources/js/app.js')
</body>
</html>
