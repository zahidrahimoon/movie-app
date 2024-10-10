<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('images/cinemaze-logo-favi.ico') }}" type="image/x-icon">
    <title>Cinemaze | Admin | Users</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite('resources/css/app.css')
</head>
<body class="bg-primary min-h-screen flex flex-col justify-center items-center font-playfair">

    @include('components.adminheader')

    <div class="w-full flex">

        <div class="w-1/3 text-white p-4">
            @include('components.adminsidebar')
        </div>

        <div class="w-2/3 py-6 mr-[100px] flex flex-col justify-center items-center">
            <h1 class="text-white text-3xl mb-6">User Management</h1>

            @if(session('success'))
                <div class="bg-green-500 text-white px-4 py-2 mb-4 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <div class="w-fullp-6 border border-white rounded-lg shadow-md">
                <table class="min-w-full bg-secondary text-white rounded-lg shadow-md">
                    <thead>
                        <tr class="bg-muted text-black text-lg">
                            <th class="py-4 px-6">ID</th>
                            <th class="py-4 px-6">Username</th>
                            <th class="py-4 px-6">Email</th>
                            <th class="py-4 px-6">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr class="hover:bg-gray-600 transition duration-200 ease-in-out">
                            <td class="py-4 px-6 text-center">{{ $user->id }}</td>
                            <td class="py-4 px-6 text-center">{{ $user->name }}</td>
                            <td class="py-4 px-6 text-center">{{ $user->email }}</td>
                            <td class="py-4 px-6 text-center">
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded-lg">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </button>
                                </form>

                                @if(!$user->is_admin)
                                    <form action="{{ route('user.grantAdmin', $user->id) }}" method="POST" class="inline-block">
                                        @csrf   
                                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded-lg">
                                            <i class="fas fa-user-shield"></i> Grant Admin
                                        </button>
                                    </form>
                                @else
                                    <span class="bg-green-700 text-white py-2 px-4 rounded-lg">Admin</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @vite('resources/js/app.js')
</body>
</html>
