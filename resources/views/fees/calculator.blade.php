<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fee Calculator - School Fee Management</title>
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

        .calculator-card {
            background: var(--white);
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            border: 1px solid var(--border);
            max-width: 900px;
            margin: 0 auto;
        }

        .calc-title {
            font-family: 'Playfair Display', serif;
            color: var(--text-dark);
            font-size: 28px;
            margin-bottom: 10px;
        }

        .calc-subtitle {
            color: var(--text-light);
            font-size: 15px;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid var(--crimson);
        }

        .info-box {
            background: var(--crimson-light);
            border-left: 4px solid var(--crimson);
            padding: 15px 20px;
            border-radius: 5px;
            margin-bottom: 25px;
            font-size: 14px;
            color: var(--text-mid);
        }

        .child-section {
            background: #fafafa;
            padding: 25px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 2px solid transparent;
            transition: border-color 0.3s;
            position: relative;
        }

        .child-section.active {
            border-color: var(--crimson);
        }

        .child-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--border);
        }

        .child-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--crimson);
            font-family: 'Playfair Display', serif;
        }

        .remove-child {
            background: none;
            border: 1.5px solid #dc3545;
            color: #dc3545;
            padding: 6px 15px;
            border-radius: 5px;
            font-weight: 600;
            font-size: 13px;
            transition: all .2s;
        }

        .remove-child:hover {
            background: #dc3545;
            color: white;
        }

        .form-group {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 15px;
        }

        .input-field {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: 700;
            font-size: 13px;
            color: var(--text-mid);
            margin-bottom: 6px;
        }

        select {
            padding: 12px;
            border: 1.5px solid var(--border);
            border-radius: 5px;
            font-size: 14px;
            font-family: inherit;
            background: white;
            cursor: pointer;
            transition: all .2s;
        }

        select:focus {
            outline: none;
            border-color: var(--crimson);
            box-shadow: 0 0 0 3px rgba(196, 30, 58, 0.1);
        }

        .amount-display {
            background: var(--crimson-light);
            padding: 12px;
            border-radius: 5px;
            border: 1.5px solid var(--crimson);
            color: var(--crimson);
            font-weight: 700;
            font-size: 16px;
            text-align: center;
        }

        .btn-add {
            background: none;
            border: 2px dashed var(--crimson);
            color: var(--crimson);
            padding: 15px;
            border-radius: 5px;
            font-weight: 700;
            font-size: 14px;
            width: 100%;
            margin: 20px 0;
            transition: all .2s;
        }

        .btn-add:hover {
            background: var(--crimson-light);
            border-style: solid;
        }

        .button-group {
            display: flex;
            gap: 15px;
            margin-top: 25px;
        }

        .btn-primary, .btn-secondary {
            flex: 1;
            padding: 14px;
            border: none;
            border-radius: 5px;
            font-weight: 700;
            font-size: 15px;
            transition: all .2s;
        }

        .btn-primary {
            background: var(--crimson);
            color: white;
        }

        .btn-primary:hover {
            background: var(--crimson-dark);
        }

        .btn-secondary {
            background: #f0f0f0;
            color: var(--text-mid);
        }

        .btn-secondary:hover {
            background: #e0e0e0;
        }

        .result-section {
            background: linear-gradient(135deg, var(--crimson) 0%, var(--crimson-dark) 100%);
            color: white;
            padding: 30px;
            border-radius: 8px;
            margin-top: 30px;
            display: none;
        }

        .result-section.show {
            display: block;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .result-label {
            font-size: 14px;
            opacity: 0.9;
            margin-bottom: 10px;
        }

        .result-total {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 25px;
            font-family: 'Playfair Display', serif;
        }

        .result-breakdown {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 5px;
        }

        .breakdown-item {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            font-size: 14px;
        }

        .breakdown-item:last-child {
            border-bottom: none;
            font-weight: 700;
            font-size: 16px;
            padding-top: 15px;
            margin-top: 10px;
            border-top: 2px solid rgba(255, 255, 255, 0.3);
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 30px;
            color: var(--crimson);
            text-decoration: none;
            font-weight: 600;
            transition: color .2s;
        }

        .back-link:hover {
            color: var(--crimson-dark);
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .calculator-card {
                padding: 25px;
            }
            
            .form-group {
                grid-template-columns: 1fr;
                gap: 15px;
            }
            
            .result-total {
                font-size: 36px;
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
                        <a class="nav-link active" href="{{ route('fees.calculator') }}">
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
        <div class="calculator-card">
            <h2 class="calc-title">Fee Calculator</h2>
            <p class="calc-subtitle">Calculate your personalized school fees for {{ $currentYear }}</p>

            <div class="info-box">
                <i class="bi bi-info-circle-fill me-2"></i>
                Select the number of children and their age groups, then choose your payment preference (annual or termly).
            </div>

            <div id="childrenContainer"></div>

            <button class="btn-add" onclick="addChild()">
                <i class="bi bi-plus-lg me-2"></i> Add Another Child
            </button>

            <div class="button-group">
                <button class="btn-primary" onclick="calculateFees()">
                    <i class="bi bi-calculator me-2"></i> Calculate Total
                </button>
                <button class="btn-secondary" onclick="resetCalculator()">
                    <i class="bi bi-arrow-counterclockwise me-2"></i> Clear All
                </button>
            </div>

            <div id="resultSection" class="result-section">
                <div class="result-label">Your Total Tuition Cost</div>
                <div class="result-total" id="resultTotal">RM 0.00</div>
                <div class="result-breakdown" id="resultBreakdown"></div>
            </div>

            <a href="{{ route('fees.index') }}" class="back-link">
                <i class="bi bi-arrow-left"></i> Back to Fee Structure
            </a>
        </div>
    </div>

    <script>
        let childCount = 0;

        function addChild() {
            childCount++;
            const categories = @json($categories);
            const options = categories
                .filter(cat => cat.fees && cat.fees.length > 0)
                .map(cat => `<option value="${cat.id}">${cat.name} (${cat.age_range})</option>`)
                .join('');

            const childHtml = `
                <div class="child-section" id="child-${childCount}">
                    <div class="child-header">
                        <span class="child-title">Child ${childCount}</span>
                        ${childCount > 1 ? `<button class="remove-child" onclick="removeChild(${childCount})"><i class="bi bi-trash me-1"></i> Remove</button>` : ''}
                    </div>
                    <div class="form-group">
                        <div class="input-field">
                            <label><i class="bi bi-person-badge me-1"></i> Age Group</label>
                            <select class="age-select" onchange="updateAmount(${childCount})">
                                <option value="">Select age group...</option>
                                ${options}
                            </select>
                        </div>
                        <div class="input-field">
                            <label><i class="bi bi-calendar me-1"></i> Payment Type</label>
                            <select class="payment-select" onchange="updateAmount(${childCount})">
                                <option value="annual">Annual Payment</option>
                                <option value="term">Termly Payment (3 Terms)</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-field">
                        <label>Estimated Amount</label>
                        <div class="amount-display" id="amount-${childCount}">RM 0.00</div>
                    </div>
                </div>
            `;

            document.getElementById('childrenContainer').insertAdjacentHTML('beforeend', childHtml);
        }

        function removeChild(id) {
            document.getElementById(`child-${id}`).remove();
        }

        function updateAmount(childId) {
            const section = document.getElementById(`child-${childId}`);
            const ageSelect = section.querySelector('.age-select');
            const paymentSelect = section.querySelector('.payment-select');
            const amountDisplay = document.getElementById(`amount-${childId}`);

            const categoryId = ageSelect.value;
            if (!categoryId) {
                amountDisplay.textContent = 'RM 0.00';
                return;
            }

            const categories = @json($categories);
            const category = categories.find(c => c.id === parseInt(categoryId));
            if (category && category.fees && category.fees.length > 0) {
                const fee = category.fees[0];
                const amount = paymentSelect.value === 'annual' 
                    ? fee.annual_payment 
                    : (fee.term1_payment + fee.term2_payment + fee.term3_payment);
                amountDisplay.textContent = 'RM ' + parseFloat(amount).toFixed(2);
            }
        }

        function calculateFees() {
            const sections = document.querySelectorAll('.child-section');
            const children = [];
            let total = 0;
            let breakdown = '';

            sections.forEach((section, index) => {
                const ageSelect = section.querySelector('.age-select');
                const paymentSelect = section.querySelector('.payment-select');
                const categoryId = ageSelect.value;

                if (!categoryId) {
                    alert(`Please select age group for Child ${index + 1}`);
                    return;
                }

                const categories = @json($categories);
                const category = categories.find(c => c.id === parseInt(categoryId));
                if (category && category.fees && category.fees.length > 0) {
                    const fee = category.fees[0];
                    const amount = paymentSelect.value === 'annual'
                        ? fee.annual_payment
                        : (fee.term1_payment + fee.term2_payment + fee.term3_payment);
                    
                    total += parseFloat(amount);
                    breakdown += `
                        <div class="breakdown-item">
                            <span><i class="bi bi-person-circle me-2"></i>${category.name} - ${paymentSelect.options[paymentSelect.selectedIndex].text}</span>
                            <span>RM ${parseFloat(amount).toFixed(2)}</span>
                        </div>
                    `;
                }
            });

            if (total > 0) {
                breakdown += `
                    <div class="breakdown-item">
                        <span><strong>Total Amount</strong></span>
                        <span><strong>RM ${total.toFixed(2)}</strong></span>
                    </div>
                `;

                document.getElementById('resultTotal').textContent = 'RM ' + total.toFixed(2);
                document.getElementById('resultBreakdown').innerHTML = breakdown;
                document.getElementById('resultSection').classList.add('show');
                
                // Scroll to result
                document.getElementById('resultSection').scrollIntoView({ behavior: 'smooth' });
            }
        }

        function resetCalculator() {
            childCount = 0;
            document.getElementById('childrenContainer').innerHTML = '';
            document.getElementById('resultSection').classList.remove('show');
            addChild();
        }

        // Initialize
        addChild();
    </script>
</body>
</html>