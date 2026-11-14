<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Pets</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <div class="admin-container">
        <aside class="admin-sidebar">
            <div class="brand-title">🐾 Admin Panel</div>
            <ul class="nav-menu">
                <li class="nav-item"><a href="{{ route('admin.users') }}" class="nav-link">Users</a></li>
                <li class="nav-item"><a href="{{ route('admin.pets') }}" class="nav-link active">Pets Requests</a></li>
                <li class="nav-item"><a href="{{ route('admin.adoptions') }}" class="nav-link">Adoption Requests</a></li>
            </ul>
        </aside>

        <main class="admin-content">
            <div class="page-header">
                <h1 class="page-title">Pet Listing Requests</h1>
            </div>

            <div class="table-card">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Pet</th>
                            <th>Category</th>
                            <th>Asking Price</th>
                            <th>Owner Contact</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pets as $pet)
                        <tr>
                            <td>
                                <div style="display: flex; align-items: center; gap: 12px;">
                                    <!-- pet_image এবং সরাসরি asset পাথ ব্যবহার করা হলো -->
                                    <img src="{{ asset($pet->pet_image) }}" class="pet-thumb" alt="pet" style="width: 50px; height: 50px; object-fit: cover; border-radius: 6px;">
                                    <span>{{ $pet->pet_name }}</span>
                                </div>
                            </td>
                            <td>{{ $pet->category }}</td>
                            <td>৳ {{ $pet->asking_price }}</td>
                            <td>{{ $pet->phone }}</td>
                            <td><span class="badge badge-{{ $pet->status }}">{{ $pet->status }}</span></td>
                            <td>
                                @if($pet->status == 'pending')
                                    <a href="{{ route('admin.pet.approve', $pet->id) }}" class="btn-action btn-approve">Approve</a>
                                    <a href="{{ route('admin.pet.delete', $pet->id) }}" class="btn-action btn-reject">Reject</a>
                                @else
                                    <span>--</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>