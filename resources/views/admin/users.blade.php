<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Users</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <div class="admin-container">
        <!-- Sidebar -->
        <aside class="admin-sidebar">
            <div class="brand-title">🐾 Admin Panel</div>
            <ul class="nav-menu">
                <li class="nav-item"><a href="{{ route('admin.users') }}" class="nav-link active">Users</a></li>
                <li class="nav-item"><a href="{{ route('admin.pets') }}" class="nav-link">Pets Requests</a></li>
                <li class="nav-item"><a href="{{ route('admin.adoptions') }}" class="nav-link">Adoption Requests</a></li>
            </ul>
        </aside>

        <!-- Content Area -->
        <main class="admin-content">
            <div class="page-header">
                <h1 class="page-title">Registered Users</h1>
            </div>

            <div class="table-card">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Joined Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>#{{ $user->id }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->created_at ? $user->created_at->format('d M, Y') : 'N/A' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>