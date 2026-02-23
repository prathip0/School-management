<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Fees - School Fee Management</title>
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

        .page-title {
            background: var(--white);
            border-radius: 10px;
            padding: 25px 30px;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border: 1px solid var(--border);
        }

        .page-title h1 {
            font-family: 'Playfair Display', serif;
            color: var(--text-dark);
            font-size: 28px;
            margin-bottom: 5px;
        }

        .page-title p {
            color: var(--text-light);
            font-size: 14px;
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

        .category-card {
            background: var(--white);
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border: 1px solid var(--border);
        }

        .category-header {
            background: var(--crimson);
            color: white;
            padding: 20px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .category-info h3 {
            font-size: 20px;
            font-family: 'Playfair Display', serif;
            margin-bottom: 5px;
        }

        .category-info p {
            font-size: 14px;
            opacity: 0.9;
            margin: 0;
        }

        .category-body {
            padding: 25px;
        }

        .fee-row {
            background: #fafafa;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 15px;
            border: 1px solid var(--border);
        }

        .fee-row-header {
            background: var(--crimson-light);
            color: var(--crimson);
            font-weight: 700;
            font-size: 14px;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr auto;
            gap: 15px;
            padding: 15px 20px;
            margin-bottom: 15px;
            border: none;
        }

        .fee-field {
            display: flex;
            flex-direction: column;
        }

        .fee-field label {
            font-size: 12px;
            color: var(--text-light);
            margin-bottom: 4px;
            font-weight: 600;
        }

        .fee-field input {
            padding: 10px 12px;
            border: 1.5px solid var(--border);
            border-radius: 5px;
            font-size: 14px;
            font-family: inherit;
            transition: all .2s;
        }

        .fee-field input:focus {
            outline: none;
            border-color: var(--crimson);
            box-shadow: 0 0 0 3px rgba(196, 30, 58, 0.1);
        }

        .fee-display {
            padding: 10px 12px;
            background: white;
            border-radius: 5px;
            border: 1.5px solid var(--border);
            font-weight: 600;
            color: var(--crimson);
        }

        .action-buttons {
            display: flex;
            gap: 8px;
            align-items: flex-end;
        }

        .btn-save, .btn-delete {
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            font-size: 13px;
            font-weight: 600;
            transition: all .2s;
        }

        .btn-save {
            background: #27ae60;
            color: white;
        }

        .btn-save:hover {
            background: #229954;
        }

        .btn-delete {
            background: #e74c3c;
            color: white;
        }

        .btn-delete:hover {
            background: #c0392b;
        }

        .add-fee-form {
            background: var(--crimson-light);
            border-radius: 8px;
            padding: 25px;
            margin-top: 20px;
            border: 2px dashed var(--crimson);
        }

        .add-fee-form h4 {
            color: var(--crimson);
            font-family: 'Playfair Display', serif;
            font-size: 18px;
            margin-bottom: 20px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 15px;
            margin-bottom: 20px;
        }

        .form-field {
            display: flex;
            flex-direction: column;
        }

        .form-field label {
            font-weight: 700;
            font-size: 13px;
            color: var(--text-mid);
            margin-bottom: 6px;
        }

        .form-field input {
            padding: 10px 12px;
            border: 1.5px solid var(--border);
            border-radius: 5px;
            font-size: 14px;
            transition: all .2s;
        }

        .form-field input:focus {
            outline: none;
            border-color: var(--crimson);
            box-shadow: 0 0 0 3px rgba(196, 30, 58, 0.1);
        }

        .btn-primary {
            background: var(--crimson);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 5px;
            font-weight: 700;
            font-size: 14px;
            transition: all .2s;
        }

        .btn-primary:hover {
            background: var(--crimson-dark);
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: var(--white);
            border-radius: 10px;
        }

        .no-fees {
            background: var(--crimson-light);
            padding: 30px;
            border-radius: 8px;
            text-align: center;
            color: var(--crimson);
            font-size: 14px;
            margin-bottom: 20px;
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
                        <a class="nav-link active" href="{{ route('fees.manage') }}">
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
            <div class="page-title">
                <h1><i class="bi bi-gear-fill me-2" style="color: var(--crimson);"></i>Manage School Fees</h1>
                <p>Create and manage fee categories and amounts for different age groups</p>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    {{ session('success') }}
                </div>
            @endif

            @foreach($categories as $category)
                <div class="category-card">
                    <div class="category-header">
                        <div class="category-info">
                            <h3>{{ $category->name }}</h3>
                            <p>{{ $category->age_range }}</p>
                        </div>
                    </div>

                    <div class="category-body">
                        @if($category->fees->isEmpty())
                            <div class="no-fees">
                                <i class="bi bi-info-circle me-2"></i>
                                No fees defined for this category yet.
                            </div>
                        @else
                            <div class="fee-row-header">
                                <span>Academic Year</span>
                                <span>Annual (RM)</span>
                                <span>Term 1 (RM)</span>
                                <span>Term 2 (RM)</span>
                                <span>Term 3 (RM)</span>
                                <span>Actions</span>
                            </div>

                            @foreach($category->fees as $fee)
                                <form action="{{ route('fees.update', $fee->id) }}" method="POST" class="fee-row">
                                    @csrf
                                    @method('PUT')

                                    <div class="fee-field">
                                        <label>Academic Year</label>
                                        <div class="fee-display">{{ $fee->academic_year }}</div>
                                    </div>

                                    <div class="fee-field">
                                        <label>Annual Payment</label>
                                        <input type="number" name="annual_payment" value="{{ $fee->annual_payment }}" step="0.01" required>
                                    </div>

                                    <div class="fee-field">
                                        <label>Term 1</label>
                                        <input type="number" name="term1_payment" value="{{ $fee->term1_payment }}" step="0.01" required>
                                    </div>

                                    <div class="fee-field">
                                        <label>Term 2</label>
                                        <input type="number" name="term2_payment" value="{{ $fee->term2_payment }}" step="0.01" required>
                                    </div>

                                    <div class="fee-field">
                                        <label>Term 3</label>
                                        <input type="number" name="term3_payment" value="{{ $fee->term3_payment }}" step="0.01" required>
                                    </div>

                                    <div class="action-buttons">
                                        <button type="submit" class="btn-save">
                                            <i class="bi bi-check-lg me-1"></i> Save
                                        </button>
                                        <form action="{{ route('fees.destroy', $fee->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete this fee?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-delete">
                                                <i class="bi bi-trash me-1"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </form>
                            @endforeach
                        @endif

                        <div class="add-fee-form">
                            <h4><i class="bi bi-plus-circle me-2"></i>Add New Fee</h4>
                            <form action="{{ route('fees.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="fee_category_id" value="{{ $category->id }}">

                                <div class="form-grid">
                                    <div class="form-field">
                                        <label>Academic Year</label>
                                        <input type="text" name="academic_year" placeholder="e.g. 2025-2026" required>
                                    </div>
                                    <div class="form-field">
                                        <label>Annual (RM)</label>
                                        <input type="number" name="annual_payment" step="0.01" placeholder="0.00" required>
                                    </div>
                                    <div class="form-field">
                                        <label>Term 1 (RM)</label>
                                        <input type="number" name="term1_payment" step="0.01" placeholder="0.00" required>
                                    </div>
                                    <div class="form-field">
                                        <label>Term 2 (RM)</label>
                                        <input type="number" name="term2_payment" step="0.01" placeholder="0.00" required>
                                    </div>
                                    <div class="form-field">
                                        <label>Term 3 (RM)</label>
                                        <input type="number" name="term3_payment" step="0.01" placeholder="0.00" required>
                                    </div>
                                </div>

                                <div class="form-field mb-3">
                                    <label>Notes (Optional)</label>
                                    <input type="text" name="notes" placeholder="Add any notes about this fee">
                                </div>

                                <button type="submit" class="btn-primary">
                                    <i class="bi bi-plus-lg me-1"></i> Add Fee
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

            @if($categories->isEmpty())
                <div class="empty-state">
                    <i class="bi bi-exclamation-circle" style="font-size: 48px; color: var(--crimson); opacity: 0.5;"></i>
                    <h3 style="margin-top: 15px;">No Fee Categories Found</h3>
                    <p class="text-muted">Please create fee categories first.</p>
                </div>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>