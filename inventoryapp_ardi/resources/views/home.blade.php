<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Inventory App</title>
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
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            background: white;
            border-radius: 16px;
            padding: 60px 50px;
            text-align: center;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            width: 90%;
        }

        .logo {
            font-size: 60px;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 10px;
        }

        p {
            color: #666;
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 35px;
        }

        .btn {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 14px 40px;
            border-radius: 50px;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.5);
        }

        .footer {
            margin-top: 30px;
            font-size: 0.8rem;
            color: #aaa;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">📦</div>
        <h1>Inventory App</h1>
        <p>Selamat datang di aplikasi manajemen inventaris kami. Silakan daftarkan diri Anda untuk mulai menggunakan layanan kami.</p>
        <a href="{{ route('register') }}" class="btn">Daftar Sekarang →</a>
        <div class="footer">
            &copy; 2024 Inventory App. All rights reserved.
        </div>
    </div>
</body>
</html>
