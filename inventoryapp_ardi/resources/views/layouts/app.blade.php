<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Inventory App')</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: #2d3748;
            padding-bottom: 40px;
        }

        .navbar {
            background: rgba(255, 255, 255, 0.96);
            backdrop-filter: blur(8px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 14px 24px;
            margin-bottom: 32px;
        }

        .navbar-inner {
            max-width: 1040px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
        }

        .brand {
            font-size: 1.2rem;
            font-weight: 700;
            color: #4c51bf;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .nav-link {
            text-decoration: none;
            color: #4a5568;
            font-size: 0.92rem;
            font-weight: 600;
            padding: 8px 16px;
            border-radius: 999px;
            transition: background 0.2s, color 0.2s;
        }

        .nav-link:hover,
        .nav-link.active {
            background: #edf2f7;
            color: #5a67d8;
        }

        .page-wrapper {
            max-width: 1040px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.16);
            padding: 32px 36px;
        }

        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 16px;
            margin-bottom: 24px;
            padding-bottom: 18px;
            border-bottom: 1px solid #edf2f7;
        }

        .card-title {
            font-size: 1.6rem;
            color: #1a202c;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-subtitle {
            color: #718096;
            font-size: 0.92rem;
            margin-top: 4px;
        }

        .badge {
            display: inline-block;
            background: #ebf4ff;
            color: #4c51bf;
            font-size: 0.8rem;
            font-weight: 700;
            padding: 4px 12px;
            border-radius: 999px;
        }

        .alert {
            border-radius: 10px;
            padding: 14px 18px;
            margin-bottom: 22px;
            font-size: 0.92rem;
        }

        .alert-success {
            background: #f0fff4;
            border: 1px solid #9ae6b4;
            color: #22543d;
        }

        .alert-error {
            background: #fff5f5;
            border: 1px solid #feb2b2;
            color: #9b2c2c;
        }

        .alert-error ul {
            margin-left: 18px;
            margin-top: 4px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 10px 20px;
            border-radius: 10px;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: transform 0.15s, box-shadow 0.15s, opacity 0.15s;
            font-family: inherit;
        }

        .btn:hover {
            transform: translateY(-1px);
        }

        .btn-sm {
            padding: 6px 12px;
            font-size: 0.82rem;
            border-radius: 8px;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #ffffff;
            box-shadow: 0 4px 14px rgba(102, 126, 234, 0.35);
        }

        .btn-primary:hover {
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.5);
        }

        .btn-secondary {
            background: #edf2f7;
            color: #4a5568;
        }

        .btn-secondary:hover {
            background: #e2e8f0;
        }

        .btn-info {
            background: #ebf8ff;
            color: #2b6cb0;
        }

        .btn-info:hover {
            background: #bee3f8;
        }

        .btn-warning {
            background: #fefcbf;
            color: #975a16;
        }

        .btn-warning:hover {
            background: #faf089;
        }

        .btn-danger {
            background: #fed7d7;
            color: #c53030;
        }

        .btn-danger:hover {
            background: #feb2b2;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead th {
            background: #f7fafc;
            color: #4a5568;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            text-align: left;
            padding: 13px 16px;
            border-bottom: 2px solid #e2e8f0;
        }

        tbody td {
            padding: 14px 16px;
            border-bottom: 1px solid #edf2f7;
            vertical-align: middle;
            font-size: 0.94rem;
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        .actions {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            flex-wrap: wrap;
        }

        .actions form {
            display: inline;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 0.9rem;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 8px;
        }

        label .required {
            color: #e53e3e;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 12px 14px;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 0.95rem;
            color: #2d3748;
            font-family: inherit;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        input[type="text"]:focus,
        textarea:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.15);
        }

        input.is-invalid,
        textarea.is-invalid {
            border-color: #fc8181;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .field-error {
            color: #e53e3e;
            font-size: 0.82rem;
            margin-top: 6px;
        }

        .form-actions {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 24px;
            flex-wrap: wrap;
        }

        .detail-grid {
            display: grid;
            gap: 16px;
        }

        .detail-item {
            background: #f7fafc;
            border: 1px solid #edf2f7;
            border-radius: 12px;
            padding: 16px 20px;
        }

        .detail-label {
            font-size: 0.78rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #718096;
            margin-bottom: 6px;
        }

        .detail-value {
            font-size: 1rem;
            color: #1a202c;
            line-height: 1.6;
            word-break: break-word;
        }

        .empty-state {
            text-align: center;
            padding: 48px 20px;
            color: #718096;
        }

        .empty-state .icon {
            font-size: 3rem;
            margin-bottom: 12px;
        }

        .empty-state p {
            margin-bottom: 20px;
        }

        @media (max-width: 640px) {
            .card {
                padding: 22px 18px;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-inner">
            <a href="{{ route('home') }}" class="brand">📦 Inventory App</a>
            <div class="nav-links">
                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                <a href="{{ route('category.index') }}" class="nav-link {{ request()->routeIs('category.*') ? 'active' : '' }}">Kategori</a>
                <a href="{{ route('register') }}" class="nav-link {{ request()->routeIs('register') ? 'active' : '' }}">Register</a>
            </div>
        </div>
    </nav>

    <main class="page-wrapper">
        @yield('content')
    </main>
</body>
</html>
