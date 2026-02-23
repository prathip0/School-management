<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - School Fee Management</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navbar */
        .navbar {
            background: var(--white);
            border-bottom: 3px solid var(--crimson);
            padding: 15px 0;
        }

        .navbar .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .brand-wrap {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-logo {
            width: 48px;
            height: 48px;
            background: var(--crimson);
            border-radius: 50%;
            display: flex; 
            align-items: center; 
            justify-content: center;
        }

        .brand-logo i { color: white; font-size: 22px; }

        .brand-text strong {
            display: block;
            font-family: 'Playfair Display', serif;
            font-size: 18px;
            color: var(--text-dark);
            line-height: 1.1;
        }

        .brand-text small {
            font-size: 12px;
            color: var(--text-light);
            letter-spacing: .5px;
        }

        .nav-links {
            display: flex;
            gap: 30px;
        }

        .nav-links a {
            color: var(--text-mid);
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: color .2s;
        }

        .nav-links a:hover {
            color: var(--crimson);
        }

        /* Login Area */
        .login-wrap {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 48px 16px;
        }

        .login-card {
            width: 100%;
            max-width: 460px;
            background: var(--white);
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            overflow: hidden;
            border: 1px solid var(--border);
        }

        .login-card-header {
            background: var(--crimson);
            padding: 35px 40px 30px;
            color: white;
        }

        .school-badge {
            display: flex; 
            align-items: center; 
            gap: 15px;
            margin-bottom: 20px;
        }

        .badge-icon {
            width: 60px;
            height: 60px;
            background: rgba(255,255,255,.15);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .badge-icon i { font-size: 28px; color: white; }

        .badge-title {
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            font-weight: 700;
            margin: 0 0 2px;
            line-height: 1.1;
        }

        .badge-sub {
            font-size: 13px;
            opacity: .9;
            margin: 0;
        }

        .login-subtitle {
            font-size: 16px;
            opacity: .9;
            margin: 0;
            padding-left: 75px;
        }

        .login-body {
            padding: 40px;
        }

        .form-label {
            font-size: 14px;
            font-weight: 700;
            color: var(--text-mid);
            margin-bottom: 8px;
        }

        .input-group {
            position: relative;
            margin-bottom: 20px;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
            z-index: 10;
        }

        .form-control {
            width: 100%;
            padding: 14px 14px 14px 45px;
            border: 2px solid var(--border);
            border-radius: 8px;
            font-size: 15px;
            transition: all .2s;
        }

        .form-control:focus {
            border-color: var(--crimson);
            box-shadow: 0 0 0 4px rgba(196,30,58,.1);
            outline: none;
        }

        .form-control.is-invalid {
            border-color: #dc3545;
        }

        .invalid-feedback {
            font-size: 13px;
            margin-top: 5px;
            color: #dc3545;
        }

        .btn-login {
            width: 100%;
            background: var(--crimson);
            border: none;
            color: white;
            font-size: 16px;
            font-weight: 700;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all .2s;
            cursor: pointer;
        }

        .btn-login:hover {
            background: var(--crimson-dark);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(196,30,58,.3);
        }

        .login-footer {
            border-top: 2px solid var(--border);
            margin-top: 30px;
            padding-top: 20px;
            text-align: center;
            font-size: 13px;
            color: var(--text-light);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .demo-box {
            background: var(--crimson-light);
            border-left: 4px solid var(--crimson);
            padding: 15px 20px;
            border-radius: 5px;
            margin-top: 25px;
        }

        .demo-box h5 {
            color: var(--crimson);
            font-size: 13px;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .demo-box p {
            color: var(--text-mid);
            margin: 5px 0;
            font-family: 'Courier New', monospace;
            font-size: 13px;
        }

        @media (max-width: 480px) {
            .login-card-header { padding: 25px 25px 20px; }
            .login-body { padding: 25px; }
            .badge-title { font-size: 20px; }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <div class="brand-wrap">
                <div class="brand-logo">
                    <i class="bi bi-mortarboard-fill"></i>
                </div>
                <div class="brand-text">
                    <strong>Dulwich College</strong>
                    <small>Fee Management System</small>
                </div>
            </div>
            <div class="nav-links">
                <a href="#">About</a>
                <a href="#">Contact</a>
                <a href="#">Help</a>
            </div>
        </div>
    </nav>

    <!-- Login -->
    <div class="login-wrap">
        <div class="login-card">
            <div class="login-card-header">
                <div class="school-badge">
                    <div class="badge-icon">
                        <i class="bi bi-shield-lock-fill"></i>
                    </div>
                    <div>
                        <p class="badge-title">Welcome Back</p>
                        <p class="badge-sub">Secure Admin Portal</p>
                    </div>
                </div>
                <p class="login-subtitle">Sign in to access the fee management system</p>
            </div>

            <div class="login-body">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show py-3 px-3 mb-4" style="font-size:14px; background: #fff2f2; border-left: 4px solid #dc3545; border-radius: 5px;" role="alert">
                        @foreach ($errors->all() as $error)
                            <div><i class="bi bi-exclamation-circle me-2"></i>{{ $error }}</div>
                        @endforeach
                        <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show py-3 px-3 mb-4" style="font-size:14px; background: var(--crimson-light); border-left: 4px solid var(--crimson); border-radius: 5px;" role="alert">
                        <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" novalidate>
                    @csrf

                    <div class="input-group">
                        <i class="bi bi-envelope input-icon"></i>
                        <input
                            type="email"
                            class="form-control @error('email') is-invalid @enderror"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Email Address"
                            required
                            autofocus
                        >
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-group">
                        <i class="bi bi-lock input-icon"></i>
                        <input
                            type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            id="password"
                            name="password"
                            placeholder="Password"
                            required
                        >
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn-login">
                        <i class="bi bi-box-arrow-in-right"></i>
                        Sign In to Dashboard
                    </button>
                </form>

                <!-- <div class="demo-box">
                    <h5><i class="bi bi-info-circle me-2"></i>Demo Credentials</h5>
                    <p><strong>Admin:</strong> admin@example.com / admin123</p>
                    <p><strong>User:</strong> user@example.com / password123</p>
                </div> -->

                <div class="login-footer">
                    <i class="bi bi-shield-check"></i>
                    Secure SSL Encrypted Connection
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>