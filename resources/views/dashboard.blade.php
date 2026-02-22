<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
        }

        .user-info .role.admin {
            background: #e74c3c;
        }

        .user-info .role.user {
            background: #3498db;
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

        .nav-link i, .nav-link .icon {
            margin-right: 10px;
            font-size: 16px;
        }

        .container {
            flex: 1;
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 20px;
            width: 100%;
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

        .welcome-card p {
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
            margin-bottom: 10px;
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
            margin-bottom: 20px;
            font-size: 20px;
            border-bottom: 2px solid #667eea;
            padding-bottom: 10px;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 15px;
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
        }

        .menu-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
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
        }

        .menu-card.fees {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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

            .container {
                margin: 20px auto;
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
                <span class="role {{ auth()->user()->role }}">{{ strtoupper(auth()->user()->role) }}</span>
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
                    <a href="{{ route('dashboard') }}" class="nav-link active">
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

            @if(auth()->user()->role === 'admin')
                <div class="sidebar-title">Admin Panel</div>
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="{{ route('fees.manage') }}" class="nav-link">
                            <span class="icon">⚙️</span> Manage Fees
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link">
                            <span class="icon">👥</span> Users
                        </a>
                    </li>
                </ul>
            @endif
        </div>

        <!-- Main Content -->
        <div class="container">
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
                    <div class="menu-grid">
                        <a href="{{ route('fees.index') }}" class="menu-card fees">
                            <div>
                                <div class="menu-card-icon">💰</div>
                                <h3>View All Fees</h3>
                                <p>View school fees for all age groups</p>
                            </div>
                        </a>

                        <a href="{{ route('fees.manage') }}" class="menu-card manage">
                            <div>
                                <div class="menu-card-icon">⚙️</div>
                                <h3>Manage Fees</h3>
                                <p>Create and update fee categories and amounts</p>
                            </div>
                        </a>

                        <a href="{{ route('fees.calculator') }}" class="menu-card calculator">
                            <div>
                                <div class="menu-card-icon">🧮</div>
                                <h3>Fee Calculator</h3>
                                <p>Calculate fees for multiple students</p>
                            </div>
                        </a>

                        <a href="{{ route('users.index') }}" class="menu-card users-card">
                            <div>
                                <div class="menu-card-icon">👥</div>
                                <h3>Manage Users</h3>
                                <p>Create, view and manage user accounts</p>
                            </div>
                        </a>
                    </div>
                </div>
            @else
                <div class="admin-menu">
                    <h2>Quick Access</h2>
                    <div class="menu-grid">
                        <a href="{{ route('fees.index') }}" class="menu-card fees">
                            <div>
                                <div class="menu-card-icon">💰</div>
                                <h3>School Fees</h3>
                                <p>View school fees structure</p>
                            </div>
                        </a>

                        <a href="{{ route('fees.calculator') }}" class="menu-card calculator">
                            <div>
                                <div class="menu-card-icon">🧮</div>
                                <h3>Calculate My Fees</h3>
                                <p>Calculate your child's fees</p>
                            </div>
                        </a>
                    </div>
                </div>
            @endif
