<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - School System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f5f7fa;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .navbar-custom {
            background: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-bottom: 3px solid #667eea;
        }

        .navbar-brand {
            color: #667eea !important;
            font-size: 22px;
            font-weight: 700;
        }

        .role-badge.admin {
            background: #e74c3c !important;
        }

        .role-badge.user {
            background: #3498db !important;
        }

        .sidebar {
            background: #2c3e50;
            min-height: calc(100vh - 70px);
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar-title {
            color: white;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 15px;
            opacity: 0.7;
            padding: 0 15px;
        }

        .nav-menu {
            list-style: none;
            margin-bottom: 30px;
            padding-left: 0;
        }

        .nav-item {
            margin-bottom: 5px;
        }

        .nav-link-custom {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            color: #ecf0f1;
            text-decoration: none;
            border-radius: 5px;
            transition: all 0.3s;
            font-size: 14px;
        }

        .nav-link-custom:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .nav-link-custom.active {
            background: #667eea;
            color: white;
            font-weight: 600;
        }

        .nav-link-custom .icon {
            margin-right: 10px;
            font-size: 16px;
        }

        .main-wrapper {
            flex: 1;
            display: flex;
            flex-direction: row;
        }

        .content-area {
            flex: 1;
            padding: 40px 20px;
            overflow-y: auto;
        }

        .welcome-card {
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .welcome-card h1 {
            color: #333;
            margin-bottom: 15px;
        }

        .welcome-card > p {
            color: #666;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .user-details {
            background: #f0f4ff;
            border-left: 4px solid #667eea;
            padding: 20px;
            border-radius: 5px;
            margin-top: 20px;
        }

        .user-details h3 {
            color: #667eea;
            margin-bottom: 15px;
            font-size: 16px;
        }

        .detail-item {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #ddd;
        }

        .detail-item:last-child {
            border-bottom: none;
        }

        .detail-label {
            color: #666;
            font-weight: 600;
        }

        .detail-value {
            color: #333;
            font-weight: 500;
        }

        .admin-menu {
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .admin-menu h2 {
            color: #333;
            margin-bottom: 25px;
            font-size: 20px;
            border-bottom: 2px solid #667eea;
            padding-bottom: 10px;
        }

        .menu-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.3s;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 150px;
            height: 100%;
        }

        .menu-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            color: white;
            text-decoration: none;
        }

        .menu-card-icon {
            font-size: 36px;
            margin-bottom: 10px;
        }

        .menu-card h3 {
            font-size: 18px;
            margin-bottom: 8px;
        }

        .menu-card p {
            font-size: 13px;
            opacity: 0.9;
            margin-bottom: 0;
        }

        .menu-card.manage {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }

        .menu-card.calculator {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }

        .menu-card.users-card {
            background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
        }

        @media (max-width: 768px) {
            .main-wrapper {
                flex-direction: column;
            }

            .sidebar {
                padding: 15px;
                min-height: auto;
                overflow-x: auto;
            }

            .nav-menu {
                display: flex;
                gap: 10px;
                margin-bottom: 15px;
                flex-wrap: wrap;
            }

            .nav-link-custom {
                white-space: nowrap;
            }

            .content-area {
                padding: 20px 15px;
            }

            .welcome-card {
                padding: 20px;
            }

            .admin-menu {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid px-4">
            <a class="navbar-brand" href="{{ route('dashboard') }}">📚 School System</a>
            <div class="d-flex align-items-center gap-3">
                <div class="d-flex align-items-center gap-2">
                    <span class="fw-semibold">{{ auth()->user()->name }}</span>
                    <span class="badge role-badge {{ auth()->user()->role }}">{{ strtoupper(auth()->user()->role) }}</span>
                </div>
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="main-wrapper">
        <!-- Sidebar Navigation -->
        <div class="sidebar">
            <div class="sidebar-title">Menu</div>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link-custom active">
                        <span class="icon">🏠</span> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('fees.index') }}" class="nav-link-custom">
                        <span class="icon">💰</span> View Fees
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('fees.calculator') }}" class="nav-link-custom">
                        <span class="icon">🧮</span> Fee Calculator
                    </a>
                </li>
            </ul>

            @if(auth()->user()->role === 'admin')
                <div class="sidebar-title">Admin Panel</div>
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="{{ route('fees.manage') }}" class="nav-link-custom">
                            <span class="icon">⚙️</span> Manage Fees
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link-custom">
                            <span class="icon">👥</span> Users
                        </a>
                    </li>
                </ul>
            @endif
        </div>

        <!-- Main Content -->
        <div class="content-area">
            <div class="container-fluid">
                <div class="welcome-card">
                    <h1>Welcome, {{ auth()->user()->name }}! 👋</h1>
                    <p>You have successfully logged in to the School Management System.</p>
                    
                    <div class="user-details">
                        <h3>Your Account Information</h3>
                        <div class="detail-item">
                            <span class="detail-label">Name:</span>
                            <span class="detail-value">{{ auth()->user()->name }}</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Email:</span>
                            <span class="detail-value">{{ auth()->user()->email }}</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Role:</span>
                            <span class="detail-value">{{ ucfirst(auth()->user()->role) }}</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Member Since:</span>
                            <span class="detail-value">{{ auth()->user()->created_at->format('d M, Y') }}</span>
                        </div>
                    </div>
                </div>

                @if(auth()->user()->role === 'admin')
                    <div class="admin-menu">
                        <h2>⚙️ Admin Management</h2>
                        <div class="row g-3">
                            <div class="col-12 col-sm-6 col-lg-3">
                                <a href="{{ route('fees.index') }}" class="menu-card">
                                    <div>
                                        <div class="menu-card-icon">💰</div>
                                        <h3>View All Fees</h3>
                                        <p>View school fees for all age groups</p>
                                    </div>
                                </a>
                            </div>

                            <div class="col-12 col-sm-6 col-lg-3">
                                <a href="{{ route('fees.manage') }}" class="menu-card manage">
                                    <div>
                                        <div class="menu-card-icon">⚙️</div>
                                        <h3>Manage Fees</h3>
                                        <p>Create and update fee categories and amounts</p>
                                    </div>
                                </a>
                            </div>

                            <div class="col-12 col-sm-6 col-lg-3">
                                <a href="{{ route('fees.calculator') }}" class="menu-card calculator">
                                    <div>
                                        <div class="menu-card-icon">🧮</div>
                                        <h3>Fee Calculator</h3>
                                        <p>Calculate fees for multiple students</p>
                                    </div>
                                </a>
                            </div>

                            <div class="col-12 col-sm-6 col-lg-3">
                                <a href="{{ route('users.index') }}" class="menu-card users-card">
                                    <div>
                                        <div class="menu-card-icon">👥</div>
                                        <h3>Manage Users</h3>
                                        <p>Create, view and manage user accounts</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="admin-menu">
                        <h2>Quick Access</h2>
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <a href="{{ route('fees.index') }}" class="menu-card">
                                    <div>
                                        <div class="menu-card-icon">💰</div>
                                        <h3>School Fees</h3>
                                        <p>View school fees structure</p>
                                    </div>
                                </a>
                            </div>

                            <div class="col-12 col-sm-6">
                                <a href="{{ route('fees.calculator') }}" class="menu-card calculator">
                                    <div>
                                        <div class="menu-card-icon">🧮</div>
                                        <h3>Calculate My Fees</h3>
                                        <p>Calculate your child's fees</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
