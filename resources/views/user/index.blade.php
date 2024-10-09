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
<body class="bg-cover bg-center bg-no-repeat bg-primary">
    @include('components.adminheader')
    @include('components.adminsidebar')
    
    <div class="container mt-5">
        <h1 class="text-white">User Management</h1>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <table class="table table-bordered table-dark">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                        </form>

                        @if(!$user->is_admin)
                            <form action="{{ route('user.grantAdmin', $user->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-user-shield"></i> Grant Admin
                                </button>
                            </form>
                        @else
                            <span class="badge badge-success">Admin</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @vite('resources/js/app.js')
</body>
</html>
