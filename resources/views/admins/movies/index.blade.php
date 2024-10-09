<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ 'images/cinemaze-logo-favi.ico' }}" type="image/x-icon">
    <title>Cinemaze|Admin|Movies</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .btn {
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.3s ease-in-out;
        }

        .btn-blue {
            background-color: #2563eb; /* Tailwind's 'blue-600' */
            color: #fff;
        }

        .btn-blue:hover {
            background-color: #1d4ed8; /* Tailwind's 'blue-700' */
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
            .w-[30%] {
                width: 100%;
            }
            .w-[70%] {
                width: 100%;
            }
            .mt-[100px] {
                margin-top: 50px;
            }
            .mr-[20px] {
                margin-right: 0;
            }
            .px-4 {
                padding: 0 2rem;
            }
            .py-12 {
                padding: 6rem 0;
            }
        }
    </style>
    @vite('resources/css/app.css')
</head>
<body class="bg-primary text-gray-200">
    @include('components.adminheader')
    
    <div class="flex justify-between">
        <div class="w-[30%]">
            @include('components.adminsidebar')
        </div>
        <div class="w-[70%] mt-[100px] mr-[20px]">
            <div class="container px-4">
                <div class="flex item-center justify-evenly gap-8">
                    <h1 class="text-3xl text-white font-bold mb-8">Manage Movies</h1>
                    
                    <a href="{{ route('admins.movies.create') }}" class="btn btn-blue bg-secondary mb-6 inline-block">Add New Movie <i class="fas fa-plus-circle"></i></a>
                </div>
                
                @if(session('success'))
                    <div class="bg-green-500 text-white p-4 rounded mb-6">
                        {{ session('success') }}
                    </div>
                @endif
            
            
                <table class="min-w-full bg-secondary text-white border border-gray-700 rounded-lg mb-4">
                    <thead>
                        <tr class="bg-secondary text-white">
                            <th class="py-3 px-4 border-b border-gray-700 text-left">Title</th>
                            <th class="py-3 px-4 border-b border-gray-700 text-left">Release Date</th>
                            <th class="py-3 px-4 border-b border-gray-700 text-left">Vote Average</th>
                            <th class="py-3 px-4 border-b border-gray-700 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($movie_cards as $movie)
                            <tr class="hover:bg-gray-700">
                                <td class="py-3 px-4 border-b border-gray-700">{{ $movie->title }}</td>
                                <td class="py-3 px-4 border-b border-gray-700">{{ \Carbon\Carbon::parse($movie->release_date)->format('M d, Y') }}</td>
                                <td class="py-3 px-4 border-b border-gray-700">{{ number_format($movie->vote_average, 1) }}</td>
                                <td class="py-3 px-4 border-b border-gray-700 flex gap-2">
                                    <a href="{{ route('admins.movies.edit', $movie) }}" class="btn btn-blue">Edit <i class="fas fa-edit"></i></a>
                                    <form action="{{ route('admins.movies.destroy', $movie) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-red">Delete <i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('components.adminfooter')

    @vite('resources/js/app.js')
</body>
</html>
