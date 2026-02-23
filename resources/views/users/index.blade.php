<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management - School Fee Management</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Source+Sans+3:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --crimson: #c41e3a;
            --crimson-dark: #a01530;
            --crimson-light: #f9e8eb;
            --text-dark: #1a1a1a;
            --text-mid: #444;
            --text-light: #777;
            --border: #e5e5e5;
            --bg-light: #f7f7f5;
            --white: #ffffff;
        }

        body {
            font-family: 'Source Sans 3', sans-serif;
            background: var(--bg-light);
            color: var(--text-dark);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navbar Styles */
        .navbar {
            background: var(--white);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 0;
            border-bottom: 3px solid var(--crimson);
        }

        .navbar-brand-wrap {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 0;
        }

        .brand-logo {
            width: 44px;
            height: 44px;
            background: var(--crimson);
            border-radius: 50%;
            display: flex; 
            align-items: center; 
            justify-content: center;
        }

        .brand-logo i { color: white; font-size: 20px; }

        .brand-text strong {
            display: block;
            font-family: 'Playfair Display', serif;
            font-size: 16px;
            color: var(--text-dark);
            line-height: 1.1;
        }

        .brand-text small {
            font-size: 11px;
            color: var(--text-light);
            letter-spacing: .5px;
        }

        .nav-main .nav-link {
            font-size: 14px;
            color: var(--text-mid);
            font-weight: 600;
            padding: 20px 16px !important;
            position: relative;
            transition: color .2s;
        }

        .nav-main .nav-link:hover,
        .nav-main .nav-link.active {
            color: var(--crimson);
        }

        .nav-main .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 16px;
            right: 16px;
            height: 3px;
            background: var(--crimson);
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 10px 0 10px 20px;
            border-left: 1px solid var(--border);
            margin-left: 15px;
        }

        .user-info {
            text-align: right;
        }

        .user-name {
            font-weight: 700;
            font-size: 14px;
            color: var(--text-dark);
            display: block;
            line-height: 1.2;
        }

        .user-role {
            font-size: 11px;
            color: var(--text-light);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .role-badge {
            width: 40px;
            height: 40px;
            background: var(--crimson-light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--crimson);
            font-weight: 700;
            font-size: 16px;
        }

        .btn-logout {
            background: none;
            border: 1.5px solid var(--border);
            color: var(--text-mid);
            font-size: 13px;
            font-weight: 600;
            padding: 6px 14px;
            border-radius: 4px;
            transition: all .2s;
        }

        .btn-logout:hover {
            border-color: var(--crimson);
            color: var(--crimson);
            background: var(--crimson-light);
        }

        /* Main Content */
        .main-content {
            flex: 1;
            padding: 40px 20px;
        }

        .page-header {
            background: var(--white);
            border-radius: 10px;
            padding: 25px 30px;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .page-header h1 {
            font-family: 'Playfair Display', serif;
            color: var(--text-dark);
            font-size: 28px;
            margin: 0;
        }

        .btn-add {
            background: var(--crimson);
            color: white;
            padding: 10px 22px;
            border: none;
            border-radius: 5px;
            font-weight: 600;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all .2s;
        }

        .btn-add:hover {
            background: var(--crimson-dark);
            transform: translateY(-2px);
            color: white;
        }

        .alert {
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            border: none;
        }

        .alert-success {
            background: var(--crimson-light);
            color: var(--crimson);
            border-left: 4px solid var(--crimson);
        }

        .alert-error {
            background: #fff2f2;
            color: #dc3545;
            border-left: 4px solid #dc3545;
        }

        .users-table {
            background: var(--white);
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border: 1px solid var(--border);
        }

        .table {
            margin: 0;
        }

        .table thead {
            background: var(--crimson);
            color: white;
        }

        .table th {
            padding: 16px;
            font-weight: 600;
            font-size: 14px;
            border: none;
        }

        .table td {
            padding: 16px;
            border-bottom: 1px solid var(--border);
            vertical-align: middle;
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        .table tbody tr:hover {
            background: var(--crimson-light);
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            background: var(--crimson);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 14px;
        }

        .role-badge-pill {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .role-badge-admin {
            background: var(--crimson-light);
            color: var(--crimson);
        }

        .role-badge-user {
            background: #e8f4fd;
            color: #3498db;
        }

        .role-dropdown {
            padding: 6px 12px;
            border: 1.5px solid var(--border);
            border-radius: 5px;
            font-size: 13px;
            font-weight: 600;
            color: var(--text-dark);
            cursor: pointer;
            transition: all .2s;
            background: white;
        }

        .role-dropdown:hover {
            border-color: var(--crimson);
        }

        .role-dropdown:focus {
            outline: none;
            border-color: var(--crimson);
            box-shadow: 0 0 0 3px rgba(196, 30, 58, 0.1);
        }

        .role-dropdown:disabled {
            background: #f5f5f5;
            cursor: not-allowed;
            opacity: 0.7;
        }

        .member-since {
            font-size: 12px;
            color: var(--text-light);
            margin-top: 2px;
        }

        .actions {
            display: flex;
            gap: 8px;
        }

        .btn-delete {
            background: none;
            border: 1.5px solid #dc3545;
            color: #dc3545;
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
            transition: all .2s;
        }

        .btn-delete:hover {
            background: #dc3545;
            color: white;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: var(--white);
            border-radius: 10px;
        }

        .empty-state-icon {
            font-size: 64px;
            color: var(--crimson);
            margin-bottom: 20px;
            opacity: 0.5;
        }

        .empty-state h2 {
            font-family: 'Playfair Display', serif;
            color: var(--text-dark);
            margin-bottom: 10px;
        }

        .empty-state p {
            color: var(--text-light);
        }

        /* Modal Styles */
        .modal-content {
            border: none;
            border-radius: 10px;
            overflow: hidden;
        }

        .modal-header {
            background: var(--crimson);
            color: white;
            border: none;
            padding: 20px 24px;
        }

        .modal-header .btn-close {
            filter: brightness(0) invert(1);
        }

        .modal-title {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
        }

        .modal-body {
            padding: 24px;
        }

        .modal-footer {
            border-top: 1px solid var(--border);
            padding: 16px 24px;
        }

        .form-label {
            font-weight: 700;
            font-size: 13px;
            color: var(--text-mid);
            margin-bottom: 6px;
        }

        .form-control, .form-select {
            border: 1.5px solid var(--border);
            border-radius: 5px;
            padding: 10px 12px;
            font-size: 14px;
            transition: all .2s;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--crimson);
            box-shadow: 0 0 0 3px rgba(196, 30, 58, 0.1);
            outline: none;
        }

        .btn-primary {
            background: var(--crimson);
            border: none;
            padding: 10px 20px;
            font-weight: 600;
        }

        .btn-primary:hover {
            background: var(--crimson-dark);
        }

        .btn-secondary {
            background: #f0f0f0;
            border: none;
            color: var(--text-mid);
            font-weight: 600;
        }

        .btn-secondary:hover {
            background: #e0e0e0;
        }
    </style>
</head>
<body>
    <!-- Top Navigation Bar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid px-4">
            <div class="navbar-brand-wrap">
                <div class="brand-logo">
                    <i class="bi bi-mortarboard-fill"></i>
                </div>
                <div class="brand-text">
                    <strong>School Fee Management</strong>
                    <small>Fee Management System</small>
                </div>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav nav-main ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <i class="bi bi-house-door me-1"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('fees.index') }}">
                            <i class="bi bi-cash-stack me-1"></i> Fee Structure
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('fees.calculator') }}">
                            <i class="bi bi-calculator me-1"></i> Calculator
                        </a>
                    </li>
                    @if(auth()->user()->role === 'admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('fees.manage') }}">
                            <i class="bi bi-gear me-1"></i> Manage Fees
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('users.index') }}">
                            <i class="bi bi-people me-1"></i> Users
                        </a>
                    </li>
                    @endif
                </ul>

                <div class="user-menu">
                    <div class="user-info">
                        <span class="user-name">{{ auth()->user()->name }}</span>
                        <span class="user-role">{{ auth()->user()->role }}</span>
                    </div>
                    <div class="role-badge">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn-logout">
                            <i class="bi bi-box-arrow-right me-1"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container-fluid px-4">
            <div class="page-header">
                <h1><i class="bi bi-people-fill me-2" style="color: var(--crimson);"></i>User Management</h1>
                <button class="btn-add" data-bs-toggle="modal" data-bs-target="#addUserModal">
                    <i class="bi bi-plus-lg"></i> Add New User
                </button>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-error">
                    <i class="bi bi-exclamation-circle-fill me-2"></i>
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            @if($users->isEmpty())
                <div class="empty-state">
                    <div class="empty-state-icon"><i class="bi bi-people"></i></div>
                    <h2>No Users Found</h2>
                    <p>Start by adding your first user to the system.</p>
                </div>
            @else
                <div class="users-table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Member Since</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="user-avatar">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
                                            <span class="fw-semibold">{{ $user->name }}</span>
                                        </div>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <form action="{{ route('users.updateRole', $user->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            <select name="role" class="role-dropdown" onchange="this.form.submit()" {{ $user->id === auth()->id() ? 'disabled' : '' }}>
                                                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td>
                                        <div>{{ $user->created_at->format('M d, Y') }}</div>
                                        <div class="member-since">{{ $user->created_at->diffForHumans() }}</div>
                                    </td>
                                    <td>
                                        <div class="actions">
                                            @if($user->id !== auth()->id())
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-delete">
                                                        <i class="bi bi-trash me-1"></i> Delete
                                                    </button>
                                                </form>
                                            @else
                                                <span class="badge bg-secondary px-3 py-2" style="background: var(--border) !important; color: var(--text-light);">Current User</span>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

    <!-- Add User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="bi bi-person-plus-fill me-2"></i>Create New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('users.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">User Role</label>
                            <select name="role" class="form-select">
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg me-1"></i> Create User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>