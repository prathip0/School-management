<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management - Admin</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f7fa;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            background: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 3px solid #667eea;
        }

        .navbar h2 {
            color: #667eea;
            font-size: 22px;
        }

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-info .name {
            color: #333;
            font-weight: 600;
        }

        .user-info .role {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            color: white;
            background: #e74c3c;
        }

        .logout-btn {
            padding: 8px 15px;
            background: #e74c3c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            transition: background 0.3s;
        }

        .logout-btn:hover {
            background: #c0392b;
        }

        .main-content {
            display: flex;
            flex: 1;
        }

        .sidebar {
            background: #2c3e50;
            width: 250px;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
        }

        .sidebar-title {
            color: white;
            font-size: 14px;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 15px;
            opacity: 0.7;
        }

        .nav-menu {
            list-style: none;
            margin-bottom: 30px;
        }

        .nav-item {
            margin-bottom: 5px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            color: #ecf0f1;
            text-decoration: none;
            border-radius: 5px;
            transition: all 0.3s;
            font-size: 14px;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .nav-link.active {
            background: #667eea;
            color: white;
            font-weight: 600;
        }

        .nav-link .icon {
            margin-right: 10px;
            font-size: 16px;
        }

        .container {
            flex: 1;
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
            width: 100%;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .page-header h1 {
            color: #333;
            font-size: 24px;
        }

        .btn-add {
            background: #27ae60;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
            text-decoration: none;
            transition: background 0.3s;
        }

        .btn-add:hover {
            background: #229954;
        }

        .alert {
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            display: none;
        }

        .alert.show {
            display: block;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .users-table {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table thead {
            background: #667eea;
            color: white;
        }

        .table th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
            font-size: 14px;
        }

        .table td {
            padding: 15px;
            border-bottom: 1px solid #eee;
            font-size: 14px;
        }

        .table tbody tr:hover {
            background: #f9f9f9;
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        .user-name {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 500;
            color: #333;
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            background: #667eea;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 16px;
        }

        .badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-admin {
            background: #ffe5e5;
            color: #e74c3c;
        }

        .badge-user {
            background: #e3f2fd;
            color: #3498db;
        }

        .badge-active {
            background: #e8f5e9;
            color: #27ae60;
        }

        .badge-inactive {
            background: #f3e5f5;
            color: #9c27b0;
        }

        .role-dropdown {
            padding: 6px 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 13px;
            cursor: pointer;
        }

        .actions {
            display: flex;
            gap: 8px;
        }

        .btn-sm {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }

        .btn-edit {
            background: #3498db;
            color: white;
        }

        .btn-edit:hover {
            background: #2980b9;
        }

        .btn-delete {
            background: #e74c3c;
            color: white;
        }

        .btn-delete:hover {
            background: #c0392b;
        }

        .btn-disabled {
            background: #ccc;
            color: #666;
            cursor: not-allowed;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #999;
        }

        .empty-state-icon {
            font-size: 64px;
            margin-bottom: 20px;
        }

        .empty-state h2 {
            color: #333;
            margin-bottom: 10px;
        }

        .member-since {
            color: #999;
            font-size: 13px;
        }

        @media (max-width: 768px) {
            .main-content {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                display: flex;
                flex-direction: row;
                overflow-x: auto;
                overflow-y: visible;
            }

            .nav-menu {
                display: flex;
                margin-bottom: 0;
                gap: 10px;
            }

            .page-header {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

            .table {
                font-size: 12px;
            }

            .table th,
            .table td {
                padding: 10px;
            }

            .actions {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h2>📚 School System</h2>
        <div class="navbar-right">
            <div class="user-info">
                <span class="name">{{ auth()->user()->name }}</span>
                <span class="role">ADMIN</span>
            </div>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </div>

    <div class="main-content">
        <!-- Sidebar Navigation -->
        <div class="sidebar">
            <div class="sidebar-title">Menu</div>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <span class="icon">🏠</span> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('fees.index') }}" class="nav-link">
                        <span class="icon">💰</span> View Fees
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('fees.calculator') }}" class="nav-link">
                        <span class="icon">🧮</span> Fee Calculator
                    </a>
                </li>
            </ul>

            <div class="sidebar-title">Admin Panel</div>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="{{ route('fees.manage') }}" class="nav-link">
                        <span class="icon">⚙️</span> Manage Fees
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link active">
                        <span class="icon">👥</span> Users
                    </a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="container">
            <div class="page-header">
                <h1>👥 User Management</h1>
            </div>

            @if(session('success'))
                <div class="alert alert-success show">
                    ✓ {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-error show">
                    @foreach($errors->all() as $error)
                        <div>✗ {{ $error }}</div>
                    @endforeach
                </div>
            @endif

            @if($users->isEmpty())
                <div class="users-table">
                    <div class="empty-state">
                        <div class="empty-state-icon">👤</div>
                        <h2>No Users Yet</h2>
                        <p>No users found in the system.</p>
                    </div>
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
                                        <div class="user-name">
                                            <div class="user-avatar">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
                                            <span>{{ $user->name }}</span>
                                        </div>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <form action="{{ route('users.updateRole', $user->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            <select name="role" class="role-dropdown" onchange="this.form.submit()" {{ $user->id === auth()->id() ? 'disabled' : '' }}>
                                                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>
                                                    Admin
                                                </option>
                                                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>
                                                    User
                                                </option>
                                            </select>
                                        </form>
                                    </td>
                                    <td>
                                        <span>{{ $user->created_at->format('M d, Y') }}</span>
                                        <div class="member-since">{{ $user->created_at->diffForHumans() }}</div>
                                    </td>
                                    <td>
                                        <div class="actions">
                                            @if($user->id !== auth()->id())
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-sm btn-delete">
                                                        🗑 Delete
                                                    </button>
                                                </form>
                                            @else
                                                <span style="color: #999; font-size: 12px;">Current User</span>
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
</body>
</html>
