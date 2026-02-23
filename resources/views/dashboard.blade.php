<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - School Fee Management</title>
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

        .navbar-top {
            background: var(--white);
            border-bottom: 1px solid var(--border);
            padding: 8px 0;
        }

        .navbar-top .top-links a {
            font-size: 13px;
            color: var(--text-mid);
            text-decoration: none;
            margin-left: 20px;
            transition: color .2s;
        }

        .navbar-top .top-links a:hover { color: var(--crimson); }

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

        .nav-main {
            margin-left: auto;
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

        .welcome-card {
            background: var(--white);
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            border: 1px solid var(--border);
        }

        .welcome-card h1 {
            font-family: 'Playfair Display', serif;
            color: var(--text-dark);
            margin-bottom: 15px;
            font-size: 28px;
        }

        .welcome-card > p {
            color: var(--text-mid);
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .user-details {
            background: var(--crimson-light);
            border-left: 4px solid var(--crimson);
            padding: 20px;
            border-radius: 5px;
            margin-top: 20px;
        }

        .user-details h3 {
            color: var(--crimson);
            margin-bottom: 15px;
            font-size: 16px;
            font-weight: 700;
        }

        .detail-item {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid rgba(196, 30, 58, 0.15);
        }

        .detail-item:last-child {
            border-bottom: none;
        }

        .detail-label {
            color: var(--text-mid);
            font-weight: 600;
        }

        .detail-value {
            color: var(--text-dark);
            font-weight: 500;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            color: var(--text-dark);
            font-size: 22px;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--crimson);
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .menu-card {
            background: linear-gradient(135deg, var(--crimson) 0%, var(--crimson-dark) 100%);
            color: white;
            padding: 25px;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.3s;
            display: flex;
            flex-direction: column;
            border: none;
            position: relative;
            overflow: hidden;
        }

        .menu-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(196, 30, 58, 0.3);
            color: white;
        }

        .menu-card.alt {
            background: linear-gradient(135deg, #2c3e50 0%, #1a2632 100%);
        }

        .menu-card.alt:hover {
            box-shadow: 0 15px 30px rgba(44, 62, 80, 0.3);
        }

        .menu-card-icon {
            font-size: 40px;
            margin-bottom: 15px;
        }

        .menu-card h3 {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 8px;
            font-family: 'Playfair Display', serif;
        }

        .menu-card p {
            font-size: 13px;
            opacity: 0.9;
            margin-bottom: 0;
            line-height: 1.5;
        }

        .btn-view {
            position: absolute;
            bottom: 20px;
            right: 20px;
            color: white;
            opacity: 0.7;
            transition: opacity .2s;
        }

        .menu-card:hover .btn-view {
            opacity: 1;
        }

        @media (max-width: 991px) {
            .navbar-brand-wrap {
                padding: 10px 0;
            }
            
            .nav-main .nav-link {
                padding: 15px 12px !important;
            }
            
            .user-menu {
                padding-left: 10px;
                margin-left: 10px;
            }
        }

        @media (max-width: 768px) {
            .navbar-brand-wrap {
                flex-direction: column;
                align-items: flex-start;
                gap: 5px;
            }
            
            .user-menu {
                border-left: none;
                padding-left: 0;
                margin-left: 0;
            }
            
            .menu-grid {
                grid-template-columns: 1fr;
            }
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
                <ul class="navbar-nav nav-main">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('dashboard') }}">
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
                        <a class="nav-link" href="{{ route('users.index') }}">
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
            <div class="welcome-card">
                <h1>Welcome back, {{ auth()->user()->name }}! 👋</h1>
                <p>You have successfully logged in to the School Fee Management Fee Management System.</p>
                
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
                <h2 class="section-title">Administration</h2>
                <div class="menu-grid">
                    <a href="{{ route('fees.index') }}" class="menu-card">
                        <div class="menu-card-icon">💰</div>
                        <h3>Fee Structure</h3>
                        <p>View all school fees across different age groups and categories</p>
                        <span class="btn-view"><i class="bi bi-arrow-right"></i></span>
                    </a>

                    <a href="{{ route('fees.manage') }}" class="menu-card">
                        <div class="menu-card-icon">⚙️</div>
                        <h3>Manage Fees</h3>
                        <p>Create, update and manage fee categories and payment amounts</p>
                        <span class="btn-view"><i class="bi bi-arrow-right"></i></span>
                    </a>

                    <a href="{{ route('fees.calculator') }}" class="menu-card alt">
                        <div class="menu-card-icon">🧮</div>
                        <h3>Fee Calculator</h3>
                        <p>Calculate total fees for multiple children with payment options</p>
                        <span class="btn-view"><i class="bi bi-arrow-right"></i></span>
                    </a>

                    <a href="{{ route('users.index') }}" class="menu-card alt">
                        <div class="menu-card-icon">👥</div>
                        <h3>User Management</h3>
                        <p>Manage system users, roles and permissions</p>
                        <span class="btn-view"><i class="bi bi-arrow-right"></i></span>
                    </a>
                </div>
            @else
                <h2 class="section-title">Quick Access</h2>
                <div class="menu-grid">
                    <a href="{{ route('fees.index') }}" class="menu-card">
                        <div class="menu-card-icon">💰</div>
                        <h3>Fee Structure</h3>
                        <p>View complete school fee structure and payment options</p>
                        <span class="btn-view"><i class="bi bi-arrow-right"></i></span>
                    </a>

                    <a href="{{ route('fees.calculator') }}" class="menu-card alt">
                        <div class="menu-card-icon">🧮</div>
                        <h3>Fee Calculator</h3>
                        <p>Calculate fees for your children with annual or termly options</p>
                        <span class="btn-view"><i class="bi bi-arrow-right"></i></span>
                    </a>
                </div>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>