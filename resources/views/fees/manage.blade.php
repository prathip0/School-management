<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Fees - Admin</title>
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

        .navbar {
            background: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 3px solid #c41e3a;
        }

        .navbar h2 {
            color: #c41e3a;
            font-size: 22px;
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .page-title {
            background: white;
            padding: 25px 30px;
            border-radius: 8px;
            margin-bottom: 30px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .page-title h1 {
            color: #333;
            font-size: 28px;
            margin-bottom: 5px;
        }

        .page-title p {
            color: #666;
            font-size: 14px;
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

        .category-card {
            background: white;
            border-radius: 8px;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .category-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .category-info h3 {
            font-size: 20px;
            margin-bottom: 5px;
        }

        .category-info p {
            font-size: 14px;
            opacity: 0.9;
        }

        .category-body {
            padding: 20px;
        }

        .fee-row {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr auto;
            gap: 15px;
            padding: 15px;
            background: #f9f9f9;
            border-radius: 5px;
            margin-bottom: 10px;
            align-items: center;
            border: 1px solid #eee;
        }

        .fee-row-header {
            background: #667eea;
            color: white;
            font-weight: 600;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr auto;
        }

        .fee-field {
            display: flex;
            flex-direction: column;
        }

        .fee-field label {
            font-size: 12px;
            color: #999;
            margin-bottom: 5px;
            font-weight: 600;
        }

        .fee-field input {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            font-family: inherit;
        }

        .fee-field input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .fee-display {
            padding: 8px;
            background: white;
            border-radius: 4px;
            border: 1px solid #ddd;
            font-weight: 600;
            color: #667eea;
            text-align: center;
        }

        .action-buttons {
            display: flex;
            gap: 5px;
            justify-content: flex-end;
        }

        .btn {
            padding: 8px 15px;
            border: none;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
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

        .btn-secondary {
            background: #95a5a6;
            color: white;
        }

        .btn-secondary:hover {
            background: #7f8c8d;
        }

        .add-fee-form {
            background: #f0f4ff;
            padding: 20px;
            border-radius: 5px;
            margin-top: 20px;
            border: 2px dashed #667eea;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
            margin-bottom: 15px;
        }

        .form-field {
            display: flex;
            flex-direction: column;
        }

        .form-field label {
            color: #555;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .form-field input,
        .form-field select {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            font-family: inherit;
        }

        .form-field input:focus,
        .form-field select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-buttons {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
        }

        .btn-primary {
            background: #667eea;
            color: white;
            padding: 10px 25px;
        }

        .btn-primary:hover {
            background: #5568d3;
        }

        .empty-state {
            text-align: center;
            padding: 40px;
            color: #999;
        }

        .no-fees {
            background: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            color: #999;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h2>School Admin - Fees Management</h2>
        <a href="{{ route('dashboard') }}" style="text-decoration: none; color: #667eea; font-weight: 600;">← Back to Dashboard</a>
    </div>

    <div class="container">
        <div class="page-title">
            <h1>Manage School Fees</h1>
            <p>Create and manage fee categories and amounts for different age groups</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success show">
                ✓ {{ session('success') }}
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
                            No fees defined for this category yet.
                        </div>
                    @else
                        <div class="fee-row fee-row-header">
                            <span>Academic Year</span>
                            <span>Annual</span>
                            <span>Term 1</span>
                            <span>Term 2</span>
                            <span>Term 3</span>
                            <span>Actions</span>
                        </div>

                        @foreach($category->fees as $fee)
                            <form action="{{ route('fees.update', $fee->id) }}" method="POST" class="fee-row">
                                @csrf
                                @method('PUT')

                                <div class="fee-field" style="pointer-events: none;">
                                    <label>Year</label>
                                    <div class="fee-display">{{ $fee->academic_year }}</div>
                                </div>

                                <div class="fee-field">
                                    <label>Annual Payment (RM)</label>
                                    <input type="number" name="annual_payment" value="{{ $fee->annual_payment }}" step="0.01" required>
                                </div>

                                <div class="fee-field">
                                    <label>Term 1 (RM)</label>
                                    <input type="number" name="term1_payment" value="{{ $fee->term1_payment }}" step="0.01" required>
                                </div>

                                <div class="fee-field">
                                    <label>Term 2 (RM)</label>
                                    <input type="number" name="term2_payment" value="{{ $fee->term2_payment }}" step="0.01" required>
                                </div>

                                <div class="fee-field">
                                    <label>Term 3 (RM)</label>
                                    <input type="number" name="term3_payment" value="{{ $fee->term3_payment }}" step="0.01" required>
                                </div>

                                <div class="action-buttons">
                                    <button type="submit" class="btn btn-save">💾 Save</button>
                                    <form action="{{ route('fees.destroy', $fee->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete this fee?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-delete">🗑 Delete</button>
                                    </form>
                                </div>
                            </form>
                        @endforeach
                    @endif

                    <div class="add-fee-form">
                        <h4 style="margin-bottom: 15px;">Add New Fee</h4>
                        <form action="{{ route('fees.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="fee_category_id" value="{{ $category->id }}">

                            <div class="form-grid">
                                <div class="form-field">
                                    <label>Academic Year</label>
                                    <input type="text" name="academic_year" placeholder="e.g. 2025-2026" required>
                                </div>
                                <div class="form-field">
                                    <label>Annual Payment (RM)</label>
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

                            <div class="form-field" style="margin-bottom: 15px;">
                                <label>Notes (Optional)</label>
                                <input type="text" name="notes" placeholder="Add any notes about this fee" style="height: auto;">
                            </div>

                            <div class="form-buttons">
                                <button type="submit" class="btn btn-primary">+ Add Fee</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

        @if($categories->isEmpty())
            <div class="empty-state">
                <p>No fee categories found. Please create categories first.</p>
            </div>
        @endif
    </div>
</body>
</html>
