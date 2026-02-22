<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fee Calculator - {{ $currentYear }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f7fa;
            color: #333;
        }

        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px;
            text-align: center;
        }

        .header h1 {
            font-size: 36px;
            margin-bottom: 10px;
        }

        .header p {
            font-size: 16px;
            opacity: 0.9;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .calculator-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
        }

        .calc-title {
            color: #333;
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .calc-subtitle {
            color: #666;
            font-size: 14px;
            margin-bottom: 30px;
        }

        .child-section {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 2px solid transparent;
            transition: border-color 0.3s;
        }

        .child-section.active {
            border-color: #667eea;
        }

        .child-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 2px solid #ddd;
        }

        .child-title {
            font-size: 16px;
            font-weight: 600;
            color: #333;
        }

        .remove-child {
            background: #e74c3c;
            color: white;
            border: none;
            padding: 6px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
            transition: background 0.3s;
        }

        .remove-child:hover {
            background: #c0392b;
        }

        .form-group {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-bottom: 15px;
        }

        .form-group.full {
            grid-template-columns: 1fr;
        }

        .input-field {
            display: flex;
            flex-direction: column;
        }

        label {
            color: #555;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 8px;
        }

        select {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            font-family: inherit;
            background: white;
            cursor: pointer;
            transition: border-color 0.3s;
        }

        select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .amount-display {
            background: white;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            color: #667eea;
            font-weight: 600;
            font-size: 14px;
        }

        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 30px;
            justify-content: center;
        }

        .btn {
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            min-width: 150px;
        }

        .btn-primary {
            background: #667eea;
            color: white;
        }

        .btn-primary:hover {
            background: #5568d3;
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: #ddd;
            color: #333;
        }

        .btn-secondary:hover {
            background: #ccc;
        }

        .btn-add {
            background: #27ae60;
            color: white;
            width: 100%;
            margin: 20px 0;
        }

        .btn-add:hover {
            background: #229954;
        }

        .result-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            border-radius: 8px;
            margin-top: 30px;
            text-align: center;
            display: none;
        }

        .result-section.show {
            display: block;
        }

        .result-label {
            font-size: 14px;
            opacity: 0.9;
            margin-bottom: 10px;
        }

        .result-total {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .result-breakdown {
            text-align: left;
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 5px;
            margin-top: 20px;
        }

        .breakdown-item {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            font-size: 14px;
        }

        .breakdown-item:last-child {
            border-bottom: none;
            font-weight: 600;
            font-size: 16px;
            padding-top: 15px;
            margin-top: 10px;
            padding-bottom: 0;
        }

        .back-link {
            display: inline-block;
            margin-top: 30px;
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .no-children {
            background: #fff3cd;
            border: 1px solid #ffc107;
            color: #856404;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .info-box {
            background: #e8f4f8;
            border-left: 4px solid #3498db;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 14px;
            color: #2c5aa0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Fee Calculator</h1>
        <p>Calculate your personalized school fees for {{ $currentYear }}</p>
    </div>

    <div class="container">
        <div class="calculator-card">
            <h2 class="calc-title">Calculate Your Fees</h2>
            <p class="calc-subtitle">Select your children and their age groups to see the total cost.</p>

            <div class="info-box">
                ℹ️ Select the number of children and their age groups, then choose your payment preference (annual or termly).
            </div>

            <div id="childrenContainer"></div>

            <button class="btn btn-add" onclick="addChild()">+ Add Another Child</button>

            <div class="button-group">
                <button class="btn btn-primary" onclick="calculateFees()">Calculate Total</button>
                <button class="btn btn-secondary" onclick="resetCalculator()">Clear All</button>
            </div>

            <div id="resultSection" class="result-section">
                <div class="result-label">Your Total Tuition Cost</div>
                <div class="result-total" id="resultTotal">RM 0.00</div>
                <div class="result-breakdown" id="resultBreakdown"></div>
            </div>

            <a href="{{ route('fees.index') }}" class="back-link">← Back to Fees</a>
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
                        ${childCount > 1 ? `<button class="remove-child" onclick="removeChild(${childCount})">Remove</button>` : ''}
                    </div>
                    <div class="form-group">
                        <div class="input-field">
                            <label>Age Group</label>
                            <select class="age-select" onchange="updateAmount(${childCount})">
                                <option value="">Select age group...</option>
                                ${options}
                            </select>
                        </div>
                        <div class="input-field">
                            <label>Payment Type</label>
                            <select class="payment-select" onchange="updateAmount(${childCount})">
                                <option value="annual">Annual Payment</option>
                                <option value="term">Termly Payment (3 Terms)</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group full">
                        <div class="input-field">
                            <label>Amount</label>
                            <div class="amount-display" id="amount-${childCount}">RM 0.00</div>
                        </div>
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
                            <span>${category.name} - ${paymentSelect.options[paymentSelect.selectedIndex].text}</span>
                            <span>RM ${parseFloat(amount).toFixed(2)}</span>
                        </div>
                    `;
                }
            });

            if (total > 0) {
                breakdown += `
                    <div class="breakdown-item">
                        <span>Total</span>
                        <span>RM ${total.toFixed(2)}</span>
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
