<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Fees - {{ $currentYear }}</title>
    <style>
        * {
            margin: 2px;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f7fa;
            color: #333;
        }

        .header {
            background: white;
            padding: 30px;
            border-bottom: 2px solid #c41e3a;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header h1 {
            color: #c41e3a;
            font-size: 32px;
            margin-bottom: 10px;
        }

        .header p {
            color: #666;
            font-size: 16px;
        }

        .download-btn {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background: white;
            border: 2px solid #c41e3a;
            color: #c41e3a;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .download-btn:hover {
            background: #c41e3a;
            color: white;
        }

        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .fees-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            margin-bottom: 60px;
        }

        @media (max-width: 768px) {
            .fees-grid {
                grid-template-columns: 1fr;
            }
        }

        .fees-section {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .section-title {
            color: #333;
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 25px;
            border-bottom: 3px solid #c41e3a;
            padding-bottom: 15px;
        }

        /* Accordion Styles */
        .accordion {
            margin-bottom: 20px;
            border: 1px solid #eee;
            border-radius: 5px;
            overflow: hidden;
        }

        .accordion-header {
            background: #f9f9f9;
            padding: 15px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.3s;
            border-bottom: 1px solid #eee;
        }

        .accordion-header:hover {
            background: #f0f0f0;
        }

        .accordion-header.active {
            background: #c41e3a;
            color: white;
            border-bottom: none;
        }

        .accordion-title {
            font-weight: 600;
            font-size: 15px;
            flex: 1;
        }

        .accordion-age-badge {
            background: white;
            color: #c41e3a;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            margin-right: 15px;
        }

        .accordion-header.active .accordion-age-badge {
            background: rgba(255, 255, 255, 0.3);
            color: white;
        }

        .accordion-toggle {
            font-size: 20px;
            transition: transform 0.3s;
            color: #c41e3a;
        }

        .accordion-header.active .accordion-toggle {
            transform: rotate(180deg);
            color: white;
        }

        .accordion-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
            padding: 0 15px;
            background: white;
        }

        .accordion-content.active {
            max-height: 500px;
            padding: 15px;
        }

        .payment-note {
            font-size: 12px;
            color: #999;
            margin-bottom: 10px;
            font-style: italic;
        }

        .fee-table {
            width: 100%;
            font-size: 14px;
            margin-top: 10px;
        }

        .fee-table tr {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #eee;
        }

        .fee-table tr:last-child {
            border-bottom: none;
        }

        .fee-table td:first-child {
            color: #666;
        }

        .fee-table td:last-child {
            font-weight: 600;
            color: #333;
            text-align: right;
        }

        .calculator-box {
            background: #f9f9f9;
            padding: 25px;
            border-radius: 8px;
            border-left: 4px solid #c41e3a;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group label {
            display: block;
            color: #333;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .input-group input[type="number"],
        .input-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            font-family: inherit;
        }

        .input-group input[type="number"]:focus,
        .input-group select:focus {
            outline: none;
            border-color: #c41e3a;
            box-shadow: 0 0 0 3px rgba(196, 30, 58, 0.1);
        }

        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            flex: 1;
        }

        .btn-primary {
            background: #c41e3a;
            color: white;
        }

        .btn-primary:hover {
            background: #a01530;
        }

        .btn-secondary {
            background: #ddd;
            color: #333;
        }

        .btn-secondary:hover {
            background: #ccc;
        }

        .result-box {
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin-top: 15px;
            border: 2px solid #c41e3a;
            display: none;
        }

        .result-box.show {
            display: block;
            animation: slideIn 0.3s ease;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .result-title {
            color: #666;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .result-total {
            font-size: 32px;
            font-weight: 700;
            color: #c41e3a;
            margin-bottom: 15px;
        }

        .breakdown-item {
            padding: 8px 0;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            font-size: 13px;
        }

        .breakdown-item:last-child {
            border-bottom: none;
            font-weight: 600;
            color: #333;
            font-size: 14px;
            padding-top: 10px;
            margin-top: 10px;
            border-top: 2px solid #eee;
        }

        .child-selector {
            margin-bottom: 15px;
            padding: 15px;
            background: white;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .child-selector-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .child-number {
            font-weight: 600;
            color: #333;
        }

        .remove-btn {
            background: #e74c3c;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
            font-size: 12px;
        }

        .remove-btn:hover {
            background: #c0392b;
        }

        .add-child-btn {
            background: #27ae60;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
            width: 100%;
            margin-bottom: 15px;
        }

        .add-child-btn:hover {
            background: #229954;
        }

        .nav-link {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 600;
            transition: background 0.3s;
        }

        .nav-link:hover {
            background: #2980b9;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Fees</h1>
        <p><strong>School Fees {{ $currentYear }}</strong></p>
        <p style="font-size: 14px; margin-top: 10px;">Our fees cover comprehensive education including examination costs. Additional items like uniforms, lunches, and optional trips are separate.</p>
        <button class="download-btn">📥 Download Fee Schedule (PDF)</button>
    </div>

    <div class="container">
        @if($categories->isEmpty())
            <div style="background: white; padding: 40px; border-radius: 8px; text-align: center;">
                <p style="color: #666; font-size: 16px;">No fee categories available at the moment.</p>
            </div>
        @else
            <div class="fees-grid">
                <!-- Understanding Fee Structure with Accordion -->
                <div class="fees-section">
                    <h2 class="section-title">Understanding our Fee Structure</h2>
                    
                    @foreach($categories as $category)
                        @if($category->fees->count() > 0)
                            <div class="accordion">
                                <div class="accordion-header" onclick="toggleAccordion(this)">
                                    <span class="accordion-title">{{ $category->name }} (Annual & Termly Options)</span>
                                    <span class="accordion-age-badge">{{ $category->age_range }}</span>
                                    <span class="accordion-toggle">▼</span>
                                </div>
                                
                                <div class="accordion-content">
                                    @foreach($category->fees as $fee)
                                        <p class="payment-note">You can pay termly or annually. Fees are reviewed each year in line with inflation, IGCSE and IB examination costs are included in tuition.</p>

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
                        @endif
                    @endforeach
                </div>

                <!-- Calculator -->
                <div class="fees-section">
                    <h2 class="section-title">Calculate your fees</h2>
                    <div class="calculator-box">
                        <p style="color: #666; font-size: 14px; margin-bottom: 20px;">Select your children's age groups to see personalized tuition costs and payment options.</p>
                        
                        <div id="childrenContainer"></div>
                        
                        <button class="add-child-btn" onclick="addChild()">+ Add Another Child</button>

                        <div class="button-group">
                            <button class="btn btn-primary" onclick="calculateFees()">Calculate</button>
                            <button class="btn btn-secondary" onclick="resetCalculator()">Clear</button>
                        </div>

                        <div id="resultBox" class="result-box">
                            <div class="result-title">Total Tuition Cost</div>
                            <div class="result-total" id="resultTotal">-</div>
                            <div id="breakdown"></div>
                        </div>
                    </div>
                </div>
            </div>

            <a href="{{ route('fees.calculator') }}" class="nav-link">Go to Full Calculator</a>
        @endif
    </div>

    <script>
        let childCount = 0;

        // Accordion Toggle
        function toggleAccordion(header) {
            header.classList.toggle('active');
            const content = header.nextElementSibling;
            content.classList.toggle('active');
        }

        function addChild() {
            childCount++;
            const categories = @json($categories);
            
            const childHtml = `
                <div class="child-selector" id="child-${childCount}">
                    <div class="child-selector-header">
                        <span class="child-number">Child ${childCount}</span>
                        ${childCount > 1 ? `<button class="remove-btn" onclick="removeChild(${childCount})">Remove</button>` : ''}
                    </div>
                    <div class="input-group">
                        <label>Select Age Group</label>
                        <select class="category-select" onchange="updateCalculation(${childCount})">
                            <option value="">Choose age group...</option>
                            ${categories.map(cat => {
                                if (cat.fees && cat.fees.length > 0) {
                                    return `<option value="${cat.id}" data-annual="${cat.fees[0].annual_payment}" data-term1="${cat.fees[0].term1_payment}" data-term2="${cat.fees[0].term2_payment}" data-term3="${cat.fees[0].term3_payment}">
                                        ${cat.name} (${cat.age_range})
                                    </option>`;
                                }
                                return '';
                            }).join('')}
                        </select>
                    </div>
                    <div class="input-group">
                        <label>Payment Preference</label>
                        <select class="payment-select" onchange="updateCalculation(${childCount})">
                            <option value="annual">Annual Payment</option>
                            <option value="term">Termly Payment (3 Terms)</option>
                        </select>
                    </div>
                </div>
            `;
            
            document.getElementById('childrenContainer').insertAdjacentHTML('beforeend', childHtml);
        }

        function removeChild(id) {
            const element = document.getElementById(`child-${id}`);
            if (element) {
                element.remove();
            }
        }

        function updateCalculation(childId) {
            // Auto-recalculate when selection changes
            const resultBox = document.getElementById('resultBox');
            if (resultBox.classList.contains('show')) {
                calculateFees();
            }
        }

        function calculateFees() {
            const children = [];
            const selectors = document.querySelectorAll('.child-selector');
            let hasError = false;

            selectors.forEach((selector, index) => {
                const categorySelect = selector.querySelector('.category-select');
                const paymentSelect = selector.querySelector('.payment-select');
                
                const categoryId = categorySelect.value;
                const paymentType = paymentSelect.value;

                if (!categoryId) {
                    alert(`Please select age group for Child ${index + 1}`);
                    hasError = true;
                    return;
                }

                children.push({
                    category_id: parseInt(categoryId),
                    payment_type: paymentType,
                    annual: parseFloat(categorySelect.options[categorySelect.selectedIndex].dataset.annual),
                    term1: parseFloat(categorySelect.options[categorySelect.selectedIndex].dataset.term1),
                    term2: parseFloat(categorySelect.options[categorySelect.selectedIndex].dataset.term2),
                    term3: parseFloat(categorySelect.options[categorySelect.selectedIndex].dataset.term3),
                });
            });

            if (hasError || children.length === 0) {
                return;
            }

            // Calculate totals
            let grandTotal = 0;
            let breakdown = '';

            children.forEach((child, index) => {
                const amount = child.payment_type === 'annual' 
                    ? child.annual 
                    : (child.term1 + child.term2 + child.term3);
                
                grandTotal += amount;

                const categories = @json($categories);
                const category = categories.find(c => c.id === child.category_id);
                const categoryName = category ? category.name : 'Unknown';

                if (child.payment_type === 'annual') {
                    breakdown += `
                        <div class="breakdown-item">
                            <span><strong>Child ${index + 1}:</strong> ${categoryName} (Annual)</span>
                            <span>RM${amount.toFixed(2)}</span>
                        </div>
                    `;
                } else {
                    breakdown += `
                        <div class="breakdown-item" style="padding: 5px 0; border-bottom: none; color: #666; font-size: 12px;">
                            <span style="margin-left: 20px;"><strong>Child ${index + 1}:</strong> ${categoryName} (Termly)</span>
                        </div>
                        <div class="breakdown-item" style="padding: 3px 0 3px 40px; border-bottom: none; color: #999; font-size: 12px;">
                            <span>Term 1: RM${child.term1.toFixed(2)}</span>
                        </div>
                        <div class="breakdown-item" style="padding: 3px 0 3px 40px; border-bottom: none; color: #999; font-size: 12px;">
                            <span>Term 2: RM${child.term2.toFixed(2)}</span>
                        </div>
                        <div class="breakdown-item" style="padding: 3px 0 3px 40px; border-bottom: none; color: #999; font-size: 12px;">
                            <span>Term 3: RM${child.term3.toFixed(2)}</span>
                        </div>
                        <div class="breakdown-item" style="padding: 5px 0; border-bottom: none; color: #666; font-size: 12px; margin: 5px 0;">
                            <span style="margin-left: 20px;">Subtotal: <strong>RM${amount.toFixed(2)}</strong></span>
                        </div>
                    `;
                }
            });

            breakdown += `
                <div class="breakdown-item">
                    <span>TOTAL</span>
                    <span>RM${grandTotal.toFixed(2)}</span>
                </div>
            `;

            document.getElementById('resultTotal').textContent = 'RM' + grandTotal.toFixed(2);
            document.getElementById('breakdown').innerHTML = breakdown;
            document.getElementById('resultBox').classList.add('show');
        }

        function resetCalculator() {
            childCount = 0;
            document.getElementById('childrenContainer').innerHTML = '';
            document.getElementById('resultBox').classList.remove('show');
            addChild();
        }

        // Initialize with first child
        window.addEventListener('load', function() {
            addChild();
        });
    </script>
</body>
</html>


