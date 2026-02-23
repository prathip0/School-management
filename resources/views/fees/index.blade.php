<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fee Structure - School Fee Management</title>
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

        /* Page Header */
        .page-header {
            background: var(--white);
            border-bottom: 3px solid var(--crimson);
            padding: 44px 0 32px;
        }

        .page-header h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(28px, 4vw, 42px);
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .page-header p {
            color: var(--text-mid);
            font-size: 15px;
            max-width: 520px;
            line-height: 1.6;
        }

        .btn-download {
            display: inline-flex; 
            align-items: center; 
            gap: 8px;
            margin-top: 20px;
            padding: 10px 22px;
            background: var(--white);
            border: 2px solid var(--crimson);
            color: var(--crimson);
            border-radius: 4px;
            font-weight: 700;
            font-size: 14px;
            text-decoration: none;
            transition: all .2s;
        }
        .btn-download:hover { 
            background: var(--crimson); 
            color: white; 
        }

        /* Main Content */
        .main-content { 
            flex: 1;
            padding: 48px 0 60px; 
        }

        .section-card {
            background: var(--white);
            border-radius: 6px;
            box-shadow: 0 1px 8px rgba(0,0,0,.07);
            overflow: hidden;
            border: 1px solid var(--border);
        }

        .section-card-header {
            padding: 26px 28px 20px;
            border-bottom: 2px solid var(--crimson);
        }

        .section-card-header h2 {
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            color: var(--text-dark);
            margin: 0;
        }

        .section-card-body { 
            padding: 20px 20px 24px; 
        }

        /* Accordion */
        .fee-accordion { 
            margin-bottom: 8px; 
            border: 1px solid var(--border); 
            border-radius: 5px; 
            overflow: hidden; 
        }

        .fee-accordion-btn {
            width: 100%;
            background: #fafafa;
            border: none;
            padding: 14px 16px;
            display: flex; 
            align-items: center; 
            gap: 10px;
            cursor: pointer;
            transition: background .2s;
            text-align: left;
        }

        .fee-accordion-btn:hover { 
            background: #f2f2f2; 
        }

        .fee-accordion-btn.active {
            background: var(--crimson);
            color: white;
        }

        .fee-accordion-btn .acc-title {
            flex: 1;
            font-weight: 700;
            font-size: 14px;
            line-height: 1.3;
        }

        .acc-badge {
            background: white;
            color: var(--crimson);
            font-size: 11px;
            font-weight: 700;
            padding: 3px 10px;
            border-radius: 20px;
            white-space: nowrap;
        }

        .fee-accordion-btn.active .acc-badge {
            background: rgba(255,255,255,.25);
            color: white;
        }

        .acc-chevron {
            font-size: 14px;
            color: var(--crimson);
            transition: transform .3s;
        }

        .fee-accordion-btn.active .acc-chevron {
            transform: rotate(180deg);
            color: white;
        }

        .acc-body {
            max-height: 0;
            overflow: hidden;
            transition: max-height .35s ease;
            background: white;
        }

        .acc-body.open { 
            max-height: 600px; 
        }

        .acc-inner { 
            padding: 16px; 
        }

        .fee-table {
            width: 100%;
            font-size: 14px;
        }

        .fee-table tr {
            display: flex;
            justify-content: space-between;
            padding: 7px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .fee-table tr:last-child { 
            border-bottom: none; 
        }
        .fee-table td:first-child { 
            color: var(--text-light); 
        }
        .fee-table td:last-child { 
            font-weight: 700; 
            color: var(--text-dark); 
        }

        /* Expand Sections */
        .expand-section {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 6px;
            margin-bottom: 10px;
            overflow: hidden;
        }

        .expand-btn {
            width: 100%;
            background: none;
            border: none;
            padding: 18px 22px;
            display: flex; 
            justify-content: space-between; 
            align-items: center;
            cursor: pointer;
            font-weight: 700;
            font-size: 15px;
            color: var(--text-dark);
            transition: background .2s;
        }
        .expand-btn:hover { 
            background: #fafafa; 
        }

        .expand-body {
            max-height: 0; 
            overflow: hidden;
            transition: max-height .35s ease;
            padding: 0 22px;
            border-top: 0;
        }
        .expand-body.open { 
            max-height: 400px; 
            padding: 18px 22px; 
            border-top: 1px solid var(--border); 
        }

        /* Terms Card */
        .terms-card {
            background: var(--crimson-light);
            border-radius: 8px;
            padding: 28px 28px;
            border: 1px solid rgba(196,30,58,.15);
        }

        .terms-card h3 {
            font-family: 'Playfair Display', serif;
            color: var(--crimson);
            font-size: 22px;
            margin-bottom: 8px;
        }

        .terms-card p { 
            font-size: 14px; 
            color: var(--text-mid); 
            margin-bottom: 16px; 
        }

        .btn-terms {
            display: inline-flex; 
            align-items: center; 
            gap: 8px;
            padding: 9px 18px;
            border: 2px solid var(--crimson);
            color: var(--crimson);
            background: white;
            border-radius: 4px;
            font-weight: 700;
            font-size: 14px;
            text-decoration: none;
            transition: all .2s;
        }
        .btn-terms:hover { 
            background: var(--crimson); 
            color: white; 
        }

        /* Calculator Card */
        .calc-card {
            background: var(--white);
            border-radius: 6px;
            box-shadow: 0 1px 8px rgba(0,0,0,.07);
            position: sticky;
            top: 24px;
            border: 1px solid var(--border);
        }

        .calc-card-header {
            padding: 26px 28px 20px;
            border-bottom: 2px solid var(--crimson);
        }

        .calc-card-header h2 {
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            color: var(--text-dark);
            margin: 0;
        }

        .calc-body { 
            padding: 22px 22px 26px; 
        }

        .intro-text {
            font-size: 14px;
            color: var(--text-light);
            margin-bottom: 20px;
            line-height: 1.5;
        }

        .children-counter {
            display: flex; 
            align-items: center; 
            gap: 12px;
            margin-bottom: 20px;
        }

        .counter-wrap {
            display: flex; 
            align-items: center;
            border: 1.5px solid var(--border);
            border-radius: 5px;
            overflow: hidden;
        }

        .counter-btn {
            background: #f5f5f5;
            border: none;
            width: 34px; 
            height: 34px;
            font-size: 18px;
            cursor: pointer;
            display: flex; 
            align-items: center; 
            justify-content: center;
            transition: background .2s;
        }

        .counter-btn:hover { 
            background: #e8e8e8; 
        }

        .counter-val {
            width: 36px;
            text-align: center;
            font-weight: 700;
            font-size: 15px;
            border: none;
            outline: none;
            background: white;
        }

        .child-card {
            background: #fafafa;
            border: 1px solid var(--border);
            border-radius: 6px;
            padding: 16px;
            margin-bottom: 12px;
        }

        .form-label-sm {
            font-size: 13px;
            font-weight: 600;
            color: var(--text-mid);
            margin-bottom: 5px;
            display: block;
        }

        .form-select-custom {
            width: 100%;
            padding: 9px 12px;
            border: 1.5px solid var(--border);
            border-radius: 5px;
            font-size: 14px;
            font-family: inherit;
            color: var(--text-dark);
            background: white;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath d='M6 8L1 3h10z' fill='%23999'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            cursor: pointer;
            transition: border-color .2s;
        }

        .form-select-custom:focus {
            outline: none;
            border-color: var(--crimson);
            box-shadow: 0 0 0 3px rgba(196,30,58,.1);
        }

        .payment-toggle {
            display: flex;
            background: #f0f0f0;
            border-radius: 5px;
            padding: 3px;
            gap: 3px;
        }

        .pay-opt {
            flex: 1;
            text-align: center;
            padding: 7px 10px;
            border-radius: 4px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all .2s;
            color: var(--text-mid);
        }

        .pay-opt.selected {
            background: white;
            color: var(--crimson);
            box-shadow: 0 1px 4px rgba(0,0,0,.1);
        }

        .save-badge {
            background: #27ae60;
            color: white;
            font-size: 10px;
            padding: 2px 6px;
            border-radius: 10px;
            margin-left: 4px;
            font-weight: 700;
        }

        .btn-add-child {
            width: 100%;
            background: none;
            border: 1.5px dashed var(--border);
            border-radius: 5px;
            padding: 10px;
            font-size: 13px;
            font-weight: 700;
            color: var(--text-light);
            cursor: pointer;
            transition: all .2s;
            margin-bottom: 16px;
        }
        .btn-add-child:hover { 
            border-color: var(--crimson); 
            color: var(--crimson); 
        }

        .calc-actions { 
            display: flex; 
            gap: 10px; 
            margin-top: 18px; 
        }

        .btn-calc {
            flex: 1; 
            padding: 11px;
            border: none; 
            border-radius: 5px;
            font-size: 14px; 
            font-weight: 700;
            cursor: pointer; 
            transition: all .2s;
        }

        .btn-calc-primary { 
            background: var(--crimson); 
            color: white; 
        }
        .btn-calc-primary:hover { 
            background: var(--crimson-dark); 
        }

        .btn-calc-secondary { 
            background: #eee; 
            color: var(--text-mid); 
        }
        .btn-calc-secondary:hover { 
            background: #ddd; 
        }

        .result-box {
            background: var(--crimson-light);
            border: 2px solid var(--crimson);
            border-radius: 6px;
            padding: 18px;
            margin-top: 16px;
            display: none;
            animation: fadeSlide .3s ease;
        }

        .result-box.show { 
            display: block; 
        }

        @keyframes fadeSlide {
            from { opacity: 0; transform: translateY(-8px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .nav-full-calc {
            display: inline-flex; 
            align-items: center; 
            gap: 8px;
            padding: 10px 22px;
            background: var(--crimson);
            color: white;
            border-radius: 5px;
            font-weight: 700;
            font-size: 14px;
            text-decoration: none;
            transition: background .2s;
            margin-top: 24px;
        }
        .nav-full-calc:hover { 
            background: var(--crimson-dark); 
            color: white; 
        }

        @media (max-width: 991px) {
            .calc-card { position: static; }
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
                        <a class="nav-link active" href="{{ route('fees.index') }}">
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

    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <h1>Understanding our Fee Structure</h1>
            <p>Our fees cover comprehensive education including examination costs. Additional items like uniforms, lunches, and optional trips are separate.</p>
            <a href="#" class="btn-download"><i class="bi bi-download"></i> Download Fee Schedule (PDF)</a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            @if($categories->isEmpty())
                <div class="section-card p-5 text-center">
                    <p class="text-muted">No fee categories available at the moment.</p>
                </div>
            @else
            <div class="row g-4">
                <!-- LEFT: Fee Structure -->
                <div class="col-lg-7">
                    <div class="section-card">
                        <div class="section-card-header">
                            <h2><i class="bi bi-table me-2" style="color: var(--crimson);"></i>Tuition Fees (Annual &amp; Termly Options)</h2>
                        </div>
                        <div class="section-card-body">
                            @foreach($categories as $category)
                                @if($category->fees->count() > 0)
                                <div class="fee-accordion">
                                    <button class="fee-accordion-btn" onclick="toggleAccordion(this)">
                                        <span class="acc-title">{{ $category->name }}</span>
                                        <span class="acc-badge">{{ $category->age_range }}</span>
                                        <i class="bi bi-chevron-down acc-chevron"></i>
                                    </button>
                                    <div class="acc-body">
                                        <div class="acc-inner">
                                            @foreach($category->fees as $fee)
                                            <p class="text-muted mb-3" style="font-size:12.5px;"><i class="bi bi-info-circle me-1"></i>You can pay termly or annually. Fees are reviewed each year in line with inflation.</p>
                                            <table class="fee-table">
                                                <tr>
                                                    <td>Annual Payment</td>
                                                    <td>RM{{ number_format($fee->annual_payment, 2) }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Term 1</td>
                                                    <td>RM{{ number_format($fee->term1_payment, 2) }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Term 2</td>
                                                    <td>RM{{ number_format($fee->term2_payment, 2) }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Term 3</td>
                                                    <td>RM{{ number_format($fee->term3_payment, 2) }}</td>
                                                </tr>
                                            </table>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <!-- Expandable Sections -->
                    <div class="mt-4">
                        <div class="expand-section">
                            <button class="expand-btn" onclick="toggleExpand(this)">
                                One-Time Fees (RM 33,500 per child)
                                <i class="bi bi-chevron-down"></i>
                            </button>
                            <div class="expand-body">
                                <p class="text-muted" style="font-size:14px;">A one-time registration fee of RM 33,500 is payable upon enrolment. This fee is non-refundable and covers administrative costs associated with your child's initial enrollment.</p>
                            </div>
                        </div>

                        <div class="expand-section">
                            <button class="expand-btn" onclick="toggleExpand(this)">
                                Other costs to budget for
                                <i class="bi bi-chevron-down"></i>
                            </button>
                            <div class="expand-body">
                                <p class="text-muted" style="font-size:14px;">Additional costs include school uniforms, lunch, optional enrichment activities, school trips, and learning materials. These are billed separately and vary by year group.</p>
                            </div>
                        </div>

                        <div class="expand-section">
                            <button class="expand-btn" onclick="toggleExpand(this)">
                                Payment Options &amp; Information
                                <i class="bi bi-chevron-down"></i>
                            </button>
                            <div class="expand-body">
                                <p class="text-muted" style="font-size:14px;">Fees can be paid annually or in three termly instalments. Annual payments may be eligible for a discount. Accepted payment methods include bank transfer and select credit cards.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Terms Card -->
                    <div class="terms-card mt-4">
                        <h3><i class="bi bi-file-text me-2"></i>Terms and Conditions</h3>
                        <p>Full enrolment and admissions terms and conditions for School Fee Management</p>
                        <a href="#" class="btn-terms"><i class="bi bi-download"></i> Download Terms &amp; Conditions</a>
                    </div>

                    <a href="{{ route('fees.calculator') }}" class="nav-full-calc">
                        <i class="bi bi-calculator"></i> Go to Full Calculator 
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>

                <!-- RIGHT: Calculator -->
                <div class="col-lg-5">
                    <div class="calc-card">
                        <div class="calc-card-header">
                            <h2><i class="bi bi-calculator me-2" style="color: var(--crimson);"></i>Calculate your fees</h2>
                        </div>
                        <div class="calc-body">
                            <p class="intro-text"><i class="bi bi-info-circle me-1"></i>Select your children's age groups to see personalised tuition costs and payment options.</p>

                            <!-- Number of Children -->
                            <div class="children-counter">
                                <label>Number of children</label>
                                <div class="counter-wrap">
                                    <button class="counter-btn" onclick="adjustCount(-1)">−</button>
                                    <input type="text" class="counter-val" id="childCountDisplay" value="1" readonly>
                                    <button class="counter-btn" onclick="adjustCount(1)">+</button>
                                </div>
                            </div>

                            <div id="childrenContainer"></div>

                            <button class="btn-add-child" onclick="addChild()"><i class="bi bi-plus-circle me-2"></i>Add Another Child</button>

                            <!-- Empty State -->
                            <div class="empty-state d-none" id="emptyState">
                                <div class="empty-icon"><i class="bi bi-people"></i></div>
                                <p>Select age groups to begin.<br>We'll calculate fees based on your children's ages and payment preference.</p>
                            </div>

                            <div class="calc-actions">
                                <button class="btn-calc btn-calc-primary" onclick="calculateFees()"><i class="bi bi-calculator me-2"></i>Calculate</button>
                                <button class="btn-calc btn-calc-secondary" onclick="resetCalculator()"><i class="bi bi-arrow-counterclockwise me-2"></i>Clear</button>
                            </div>

                            <div id="resultBox" class="result-box">
                                <div class="result-label">Total Tuition Cost</div>
                                <div class="result-amount" id="resultTotal">—</div>
                                <div id="breakdown"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /row -->
            @endif
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        let childCount = 0;
        let totalChildren = 1;

        function toggleAccordion(btn) {
            btn.classList.toggle('active');
            const body = btn.nextElementSibling;
            body.classList.toggle('open');
        }

        function toggleExpand(btn) {
            const body = btn.nextElementSibling;
            body.classList.toggle('open');
            const icon = btn.querySelector('i');
            icon.style.transform = body.classList.contains('open') ? 'rotate(180deg)' : '';
        }

        function selectPayment(el, childId) {
            const parent = el.closest('.payment-toggle');
            parent.querySelectorAll('.pay-opt').forEach(o => o.classList.remove('selected'));
            el.classList.add('selected');
            updateCalculation(childId);
        }

        function adjustCount(delta) {
            const newCount = Math.max(1, totalChildren + delta);
            if (newCount > totalChildren) {
                addChild();
            } else if (newCount < totalChildren) {
                const ids = [...document.querySelectorAll('.child-card')].map(el => el.id.replace('child-',''));
                if (ids.length > 1) removeChild(ids[ids.length - 1]);
            }
        }

        function syncCounter() {
            totalChildren = document.querySelectorAll('.child-card').length;
            document.getElementById('childCountDisplay').value = totalChildren;
        }

        function addChild() {
            childCount++;
            const categories = @json($categories);
            const opts = categories.map(cat => {
                if (cat.fees && cat.fees.length > 0) {
                    return `<option value="${cat.id}"
                        data-annual="${cat.fees[0].annual_payment}"
                        data-term1="${cat.fees[0].term1_payment}"
                        data-term2="${cat.fees[0].term2_payment}"
                        data-term3="${cat.fees[0].term3_payment}">
                        ${cat.name} (${cat.age_range})
                    </option>`;
                }
                return '';
            }).join('');

            const html = `
            <div class="child-card" id="child-${childCount}">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="fw-bold" style="color: var(--crimson);">Child ${childCount}</span>
                    ${childCount > 1 ? `<button class="btn-remove" onclick="removeChild('${childCount}')" style="background: none; border: none; color: var(--text-light);"><i class="bi bi-x-lg"></i></button>` : ''}
                </div>

                <div class="mb-3">
                    <label class="form-label-sm">Select Age</label>
                    <select class="form-select-custom category-select" onchange="updateCalculation(${childCount})">
                        <option value="">Choose age group…</option>
                        ${opts}
                    </select>
                </div>

                <div>
                    <label class="form-label-sm">Payment preference</label>
                    <div class="payment-toggle">
                        <div class="pay-opt" onclick="selectPayment(this, ${childCount})" data-type="term">Pay Termly</div>
                        <div class="pay-opt selected" onclick="selectPayment(this, ${childCount})" data-type="annual">Pay Annually <span class="save-badge">Save ~5%</span></div>
                    </div>
                </div>
            </div>`;

            document.getElementById('childrenContainer').insertAdjacentHTML('beforeend', html);
            syncCounter();
        }

        function removeChild(id) {
            const el = document.getElementById(`child-${id}`);
            if (el) { el.remove(); syncCounter(); }
        }

        function updateCalculation(childId) {
            if (document.getElementById('resultBox').classList.contains('show')) {
                calculateFees();
            }
        }

        function calculateFees() {
            const cards = document.querySelectorAll('.child-card');
            const children = [];
            let hasError = false;

            cards.forEach((card, idx) => {
                const catSel = card.querySelector('.category-select');
                const payOpt = card.querySelector('.pay-opt.selected');
                const catId  = catSel.value;
                const payType = payOpt ? payOpt.dataset.type : 'annual';

                if (!catId) {
                    alert(`Please select age group for Child ${idx + 1}`);
                    hasError = true;
                    return;
                }

                const opt = catSel.options[catSel.selectedIndex];
                children.push({
                    category_id: parseInt(catId),
                    payment_type: payType,
                    annual: parseFloat(opt.dataset.annual),
                    term1:  parseFloat(opt.dataset.term1),
                    term2:  parseFloat(opt.dataset.term2),
                    term3:  parseFloat(opt.dataset.term3),
                    name: opt.text.trim()
                });
            });

            if (hasError || children.length === 0) return;

            const categories = @json($categories);
            let grandTotal = 0;
            let breakdown  = '';

            children.forEach((child, idx) => {
                const amount = child.payment_type === 'annual'
                    ? child.annual
                    : (child.term1 + child.term2 + child.term3);
                grandTotal += amount;

                const cat  = categories.find(c => c.id === child.category_id);
                const name = cat ? cat.name : 'Unknown';

                if (child.payment_type === 'annual') {
                    breakdown += `
                    <div class="breakdown-row d-flex justify-content-between py-2 border-bottom">
                        <span>Child ${idx+1}: ${name} (Annual)</span>
                        <span class="fw-bold">RM${amount.toFixed(2)}</span>
                    </div>`;
                } else {
                    breakdown += `
                    <div class="mb-2 border-bottom pb-2">
                        <div class="fw-bold mb-1">Child ${idx+1}: ${name} (Termly)</div>
                        <div style="font-size:12px;color:var(--text-light);">Term 1: RM${child.term1.toFixed(2)} | Term 2: RM${child.term2.toFixed(2)} | Term 3: RM${child.term3.toFixed(2)}</div>
                    </div>`;
                }
            });

            breakdown += `
            <div class="d-flex justify-content-between pt-3 mt-2" style="border-top: 2px solid var(--crimson);">
                <span class="fw-bold">TOTAL</span>
                <span class="fw-bold" style="color: var(--crimson);">RM${grandTotal.toFixed(2)}</span>
            </div>`;

            document.getElementById('resultTotal').innerHTML = 'RM' + grandTotal.toFixed(2);
            document.getElementById('breakdown').innerHTML = breakdown;
            document.getElementById('resultBox').classList.add('show');
        }

        function resetCalculator() {
            childCount = 0;
            document.getElementById('childrenContainer').innerHTML = '';
            document.getElementById('resultBox').classList.remove('show');
            addChild();
        }

        window.addEventListener('load', () => addChild());
    </script>
</body>
</html>