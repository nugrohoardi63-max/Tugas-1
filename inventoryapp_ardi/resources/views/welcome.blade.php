<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang - Inventory App</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            background: white;
            border-radius: 16px;
            padding: 60px 50px;
            text-align: center;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            max-width: 520px;
            width: 100%;
        }

        .success-icon {
            font-size: 70px;
            margin-bottom: 20px;
            animation: bounce 0.6s ease;
        }

        @keyframes bounce {
            0%   { transform: scale(0.5); opacity: 0; }
            70%  { transform: scale(1.1); }
            100% { transform: scale(1);   opacity: 1; }
        }

        h1 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 8px;
        }

        .greeting {
            font-size: 1.5rem;
            font-weight: 700;
            color: #11998e;
            margin-bottom: 25px;
        }

        .info-card {
            background: #f7fffe;
            border: 1px solid #c3f0e4;
            border-radius: 12px;
            padding: 25px 30px;
            margin: 25px 0;
            text-align: left;
        }

        .info-card h3 {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #aaa;
            margin-bottom: 15px;
        }

        .info-row {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 12px;
        }

        .info-row:last-child {
            margin-bottom: 0;
        }

        .info-label {
            font-size: 0.8rem;
            color: #888;
            font-weight: 600;
            min-width: 110px;
        }

        .info-value {
            font-size: 0.95rem;
            color: #333;
            font-weight: 500;
            word-break: break-word;
        }

        .divider {
            border: none;
            border-top: 1px solid #e8f8f4;
            margin: 10px 0;
        }

        .message {
            color: #666;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .btn-group {
            display: flex;
            gap: 12px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            padding: 12px 28px;
            border-radius: 50px;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 600;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .btn-primary {
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(17, 153, 142, 0.4);
        }

        .btn-secondary {
            background: white;
            color: #11998e;
            border: 2px solid #11998e;
        }

        .btn-secondary:hover {
            background: #f0fffe;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="success-icon">🎉</div>
        <h1>Pendaftaran Berhasil!</h1>
        <div class="greeting">
            Halo, {{ $first_name }} {{ $last_name }}!
        </div>

        <p class="message">
            Selamat datang di <strong>Inventory App</strong>. Akun Anda telah berhasil didaftarkan. Berikut ringkasan informasi yang Anda berikan:
        </p>

        <div class="info-card">
            <h3>📋 Detail Pendaftaran</h3>

            <div class="info-row">
                <span class="info-label">Nama Lengkap</span>
                <span class="info-value">{{ $first_name }} {{ $last_name }}</span>
            </div>
            <hr class="divider">

            <div class="info-row">
                <span class="info-label">Nama Depan</span>
                <span class="info-value">{{ $first_name }}</span>
            </div>
            <hr class="divider">

            <div class="info-row">
                <span class="info-label">Nama Belakang</span>
                <span class="info-value">{{ $last_name }}</span>
            </div>
            <hr class="divider">

            <div class="info-row">
                <span class="info-label">Email</span>
                <span class="info-value">{{ $email }}</span>
            </div>
            <hr class="divider">

            <div class="info-row">
                <span class="info-label">Telepon</span>
                <span class="info-value">{{ $phone }}</span>
            </div>
            <hr class="divider">

            <div class="info-row">
                <span class="info-label">Alamat</span>
                <span class="info-value">{{ $address }}</span>
            </div>
        </div>

        <div class="btn-group">
            <a href="{{ route('home') }}" class="btn btn-primary">🏠 Ke Halaman Utama</a>
            <a href="{{ route('register') }}" class="btn btn-secondary">📝 Daftar Lagi</a>
        </div>
    </div>
</body>
</html>
