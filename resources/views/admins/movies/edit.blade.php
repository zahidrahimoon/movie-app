<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ 'images/cinemaze-logo-favi.ico' }}" type="image/x-icon">
    <title>Cinemaze | Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
        }
    </style>
    @vite('resources/css/app.css')
</head>

<body class="bg-cover bg-center bg-no-repeat bg-primary text-white">
    @include('components.adminheader')

    <div class="flex justify-between">
        <!-- Sidebar -->
        <div class="w-[30%]">
            @include('components.adminsidebar')
        </div>

        <!-- Main Content -->
        <div class="w-[70%] mt-[100px] mr-[100px]">
            <div class="container mx-auto px-6 py-10 bg-secondary rounded-lg shadow-lg mb-8">
                <h1 class="text-3xl p-4 font-bold mb-8 flex items-center text-white">
                    <i class="bx bx-film mr-3 text-blue-500"></i> Edit Movie
                </h1>

                <!-- Edit Movie Form -->
                <form action="{{ route('admins.movies.update', $movie) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Title Field -->
                    <div class="flex items-center mb-4 gap-2">
                        <i class="fas fa-heading text-lg mr-3 text-gray-400"></i>
                        <label class="block text-sm font-medium">Title</label>
                        <input type="text" name="title" value="{{ $movie->title }}" required class="ml-auto w-3/4 bg-gray-800 border border-gray-700 rounded-md py-2 px-4 focus:ring-blue-500 focus:border-blue-500 text-white" placeholder="Enter movie title">
                    </div>

                    <!-- Release Date Field -->
                    <div class="flex items-center mb-4 gap-2">
                        <i class="fas fa-calendar-alt text-lg mr-3 text-gray-400"></i>
                        <label class="block text-sm font-medium">Release Date</label>
                        <input type="date" name="release_date" value="{{ $movie->release_date }}" required class="ml-auto w-3/4 bg-gray-800 border border-gray-700 rounded-md py-2 px-4 focus:ring-blue-500 focus:border-blue-500 text-white">
                    </div>

                    <!-- Vote Average Field -->
                    <div class="flex items-center mb-4 gap-2">
                        <i class="fas fa-star text-lg mr-3 text-gray-400"></i>
                        <label class="block text-sm font-medium">Vote Average</label>
                        <input type="number" step="0.1" name="vote_average" value="{{ $movie->vote_average }}" required class="ml-auto w-3/4 bg-gray-800 border border-gray-700 rounded-md py-2 px-4 focus:ring-blue-500 focus:border-blue-500 text-white" placeholder="Enter vote average">
                    </div>

                    <!-- Category Field -->
                    <div class="flex items-center mb-4 gap-2">
                        <i class="fas fa-tags text-lg mr-3 text-gray-400"></i>
                        <label class="block text-sm font-medium">Category</label>
                        <input type="text" name="category" value="{{ $movie->category }}" required class="ml-auto w-3/4 bg-gray-800 border border-gray-700 rounded-md py-2 px-4 focus:ring-blue-500 focus:border-blue-500 text-white" placeholder="Enter category">
                    </div>

                    <!-- Video Field -->
                    <div class="flex items-center mb-4 gap-2">
                        <i class="fab fa-youtube text-lg mr-3 text-gray-400"></i>
                        <label class="block text-sm font-medium">Video (YouTube ID)</label>
                        <input type="text" name="video" value="{{ $movie->video }}" required class="ml-auto w-3/4 bg-gray-800 border border-gray-700 rounded-md py-2 px-4 focus:ring-blue-500 focus:border-blue-500 text-white" placeholder="Enter YouTube video ID">
                    </div>

                    <!-- Image URL Field -->
                    <div class="flex items-center mb-4 gap-2">
                        <i class="fas fa-image text-lg mr-3 text-gray-400"></i>
                        <label class="block text-sm font-medium">Image (URL)</label>
                        <input type="url" name="image" value="{{ $movie->image }}" required class="ml-auto w-3/4 bg-gray-800 border border-gray-700 rounded-md py-2 px-4 focus:ring-blue-500 focus:border-blue-500 text-white" placeholder="Enter the Image ID">
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-500 transition-colors text-white font-bold py-2 px-4 rounded-md shadow-lg">
                        <i class="fas fa-save mr-2"></i> Update Movie
                    </button>
                </form>
            </div>
        </div>
    </div>

    @include('components.adminfooter')

    @vite('resources/js/app.js')
</body>

</html>
