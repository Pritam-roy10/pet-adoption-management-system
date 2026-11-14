<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Adoption Requests</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <div class="admin-container">
        <aside class="admin-sidebar">
            <div class="brand-title">🐾 Admin Panel</div>
            <ul class="nav-menu">
                <li class="nav-item"><a href="{{ route('admin.users') }}" class="nav-link">Users</a></li>
                <li class="nav-item"><a href="{{ route('admin.pets') }}" class="nav-link">Pets Requests</a></li>
                <li class="nav-item"><a href="{{ route('admin.adoptions') }}" class="nav-link active">Adoption Requests</a></li>
            </ul>
        </aside>

        <main class="admin-content">
            <div class="page-header">
                <h1 class="page-title">Adoption Requests & Payments</h1>
            </div>

            <div class="table-card">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Applicant</th>
                            <th>Phone</th>
                            <th>Payment Method</th>
                            <th>Pet ID</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($requests as $req)
                        <tr>
                            <!-- ডাটাবেজের adporter_name এবং phone কলামের সাথে ম্যাচ করা হলো -->
                            <td>{{ $req->adopter_name }}</td>
                            <td>{{ $req->phone }}</td>
                            <td><strong style="color: var(--accent-cyan);">{{ strtoupper($req->payment_method) }}</strong></td>
                            <td>#{{ $req->pet_id }}</td>
                            <td><span class="badge badge-{{ $req->status }}">{{ $req->status }}</span></td>
                            <td>
                                @if($req->status == 'pending')
                                    <!-- Accept ও Reject বাটন -->
                                    <a href="{{ route('admin.adoptions.accept', $req->id) }}" class="btn-action btn-approve">Accept</a>
                                    <a href="{{ route('admin.adoptions.reject', $req->id) }}" class="btn-action btn-reject">Reject</a>
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