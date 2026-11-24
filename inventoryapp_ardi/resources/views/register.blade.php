<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Inventory App</title>
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
            padding: 20px;
        }

        .container {
            background: white;
            border-radius: 16px;
            padding: 50px 45px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
            max-width: 520px;
            width: 100%;
        }

        .header {
            text-align: center;
            margin-bottom: 35px;
        }

        .header .icon {
            font-size: 45px;
            margin-bottom: 12px;
        }

        h1 {
            font-size: 1.8rem;
            color: #333;
            margin-bottom: 6px;
        }

        .subtitle {
            color: #888;
            font-size: 0.9rem;
        }

        /* Error messages */
        .alert-error {
            background: #fff5f5;
            border: 1px solid #feb2b2;
            border-radius: 8px;
            padding: 12px 16px;
            margin-bottom: 20px;
        }

        .alert-error ul {
            list-style: none;
            color: #c53030;
            font-size: 0.875rem;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            color: #444;
            margin-bottom: 6px;
        }

        label .required {
            color: #e53e3e;
            margin-left: 2px;
        }

        input, textarea {
            width: 100%;
            padding: 11px 14px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 0.95rem;
            color: #333;
            transition: border-color 0.2s;
            outline: none;
            font-family: inherit;
        }

        input:focus, textarea:focus {
            border-color: #667eea;
        }

        input.error, textarea.error {
            border-color: #fc8181;
        }

        .field-error {
            color: #e53e3e;
            font-size: 0.78rem;
            margin-top: 4px;
        }

        textarea {
            resize: vertical;
            min-height: 80px;
        }

        .btn-submit {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            margin-top: 8px;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.5);
        }

        .back-link {
            text-align: center;
            margin-top: 20px;
            font-size: 0.875rem;
            color: #888;
        }

        .back-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
        }

        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="icon">📝</div>
            <h1>Formulir Pendaftaran</h1>
            <p class="subtitle">Lengkapi data diri Anda di bawah ini</p>
        </div>

        {{-- Tampilkan error validasi jika ada --}}
        @if ($errors->any())
            <div class="alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>⚠ {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('welcome') }}" method="POST">
            @csrf

            <div class="form-row">
                {{-- Nama Depan --}}
                <div class="form-group">
                    <label for="first_name">Nama Depan <span class="required">*</span></label>
                    <input
                        type="text"
                        id="first_name"
                        name="first_name"
                        value="{{ old('first_name') }}"
                        placeholder="Contoh: Budi"
                        class="{{ $errors->has('first_name') ? 'error' : '' }}"
                    >
                    @error('first_name')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Nama Belakang --}}
                <div class="form-group">
                    <label for="last_name">Nama Belakang <span class="required">*</span></label>
                    <input
                        type="text"
                        id="last_name"
                        name="last_name"
                        value="{{ old('last_name') }}"
                        placeholder="Contoh: Santoso"
                        class="{{ $errors->has('last_name') ? 'error' : '' }}"
                    >
                    @error('last_name')
                        <div class="field-error">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Email --}}
            <div class="form-group">
                <label for="email">Email <span class="required">*</span></label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="contoh@email.com"
                    class="{{ $errors->has('email') ? 'error' : '' }}"
                >
                @error('email')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            {{-- Nomor Telepon --}}
            <div class="form-group">
                <label for="phone">Nomor Telepon</label>
                <input
                    type="text"
                    id="phone"
                    name="phone"
                    value="{{ old('phone') }}"
                    placeholder="08xx-xxxx-xxxx"
                >
            </div>

            {{-- Alamat --}}
            <div class="form-group">
                <label for="address">Alamat</label>
                <textarea
                    id="address"
                    name="address"
                    placeholder="Masukkan alamat lengkap Anda..."
                >{{ old('address') }}</textarea>
            </div>

            <button type="submit" class="btn-submit">Daftar Sekarang ✓</button>
        </form>

        <div class="back-link">
            <a href="{{ route('home') }}">&larr; Kembali ke Halaman Utama</a>
        </div>
    </div>
</body>
</html>
