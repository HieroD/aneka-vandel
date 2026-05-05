<!doctype html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign In — Vandel</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: "Poppins", sans-serif;
      background-color: #0f2d6b;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }

    .card {
      background: #163070;
      border: 1.5px dashed rgba(255, 255, 255, 0.25);
      border-radius: 16px;
      padding: 40px 32px;
      width: 100%;
      max-width: 380px;
      animation: fadeUp 0.45s ease;
    }

    @keyframes fadeUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .logo-wrap {
      text-align: center;
      margin-bottom: 12px;
    }

    .logo-img {
      width: 72px;
      height: 72px;
      border-radius: 50%;
      object-fit: contain;
      background: white;
      border: 1.5px solid rgba(255, 255, 255, 0.2);
      display: block;
      margin: 0 auto;
    }

    h1 {
      color: white;
      font-size: 24px;
      font-weight: 700;
      text-align: center;
      margin-bottom: 28px;
    }

    .form-group {
      margin-bottom: 16px;
    }

    label {
      display: block;
      color: rgba(255, 255, 255, 0.8);
      font-size: 11px;
      font-weight: 600;
      letter-spacing: 0.9px;
      text-transform: uppercase;
      margin-bottom: 7px;
    }

    .input-wrap {
      position: relative;
    }

    input {
      width: 100%;
      padding: 13px 16px;
      border: 1.5px solid transparent;
      border-radius: 10px;
      background: rgba(255, 255, 255, 0.93);
      font-size: 14px;
      color: #222;
      transition: all 0.25s;
    }

    input:focus {
      outline: none;
      background: white;
      border-color: rgba(255, 255, 255, 0.45);
      box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.12);
    }

    input.error {
      border: 1.5px solid #ff7070;
    }

    .eye-btn {
      position: absolute;
      right: 12px;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: none;
      cursor: pointer;
      color: #888;
      display: flex;
      flex-direction: column;
      padding: 4px;
    }

    .btn-primary {
      width: 100%;
      padding: 14px;
      background: #111827;
      color: white;
      border: none;
      border-radius: 10px;
      font-size: 14px;
      font-weight: 700;
      letter-spacing: 2px;
      text-transform: uppercase;
      cursor: pointer;
      transition: all 0.25s;
      margin-top: 10px;
    }

    .btn-primary:hover {
      background: #0a0f1a;
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.35);
    }

    .divider {
      display: flex;
      align-items: center;
      margin: 20px 0;
      color: rgba(255, 255, 255, 0.5);
      font-size: 12px;
      text-transform: uppercase;
    }

    .divider::before,
    .divider::after {
      content: "";
      flex: 1;
      height: 1px;
      background: rgba(255, 255, 255, 0.2);
    }

    .divider span {
      padding: 0 12px;
    }

    .footer {
      text-align: center;
      margin-top: 22px;
      color: rgba(255, 255, 255, 0.55);
      font-size: 13px;
    }

    .footer a {
      color: white;
      font-weight: 600;
      text-decoration: none;
    }

    .nav-links {
      display: flex;
      justify-content: center;
      gap: 24px;
      margin-top: 18px;
      padding-top: 16px;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    .nav-links a {
      color: rgba(255, 255, 255, 0.5);
      font-size: 12px;
      text-decoration: none;
    }

    .error-msg {
      color: #ffaaaa;
      font-size: 11px;
      margin-top: 5px;
    }

    .alert-error {
      background: rgba(255, 100, 100, 0.15);
      border: 1px solid rgba(255, 100, 100, 0.3);
      color: #ffaaaa;
      font-size: 12px;
      padding: 10px 14px;
      border-radius: 8px;
      margin-bottom: 16px;
    }

    .alert-success {
      background: rgba(34, 197, 94, 0.15);
      border: 1px solid rgba(34, 197, 94, 0.3);
      color: #86efac;
      font-size: 12px;
      padding: 10px 14px;
      border-radius: 8px;
      margin-bottom: 16px;
    }
  </style>
</head>

<body>
  <div class="card">
    <div class="logo-wrap">
      <img src="{{ asset('assets/logo-vandel.png') }}" alt="Logo" class="logo-img" />
    </div>

    <h1>Sign in</h1>

    {{-- Flash messages --}}
    @if (session('error'))
    <div class="alert-error">{{ session('error') }}</div>
    @endif
    @if (session('status'))
    <div class="alert-success">{{ session('status') }}</div>
    @endif

    {{-- Form Login --}}
    <form action="{{ route('login.store') }}" method="POST" id="loginForm">
      @csrf

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email"
          value="{{ old('email') }}" class="{{ $errors->has('email') ? 'error' : '' }}" required />
        @error('email')
        <div class="error-msg">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <div class="input-wrap">
          <input type="password" id="password" name="password" placeholder="Enter your password"
            style="padding-right: 42px" class="{{ $errors->has('password') ? 'error' : '' }}" required />
          <button class="eye-btn" type="button" onclick="togglePass('password', this)">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
              <circle cx="12" cy="12" r="3" />
            </svg>
          </button>
        </div>
        @error('password')
        <div class="error-msg">{{ $message }}</div>
        @enderror
      </div>

      <button type="submit" class="btn-primary">Login</button>
    </form>

    <div class="divider"><span>or continue with</span></div>

    <div class="footer">
      Don't have an account? <a href="{{ route('register') }}">Sign up</a>
    </div>

    <div class="nav-links">
      <a href="{{ route('about') }}">About</a>
      {{-- Perbaikan: Menambahkan parameter kategori 'all' agar tidak Missing Parameter Error --}}
      <a href="{{ route('catalog.index', ['kategori' => 'all']) }}">Catalog</a>
    </div>
  </div>

  <script>
    function togglePass(id, btn) {
      const inp = document.getElementById(id);
      const isText = inp.type === "text";
      inp.type = isText ? "password" : "text";
      btn.querySelector("svg").innerHTML = isText ?
        '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>' :
        '<path d="M17.94 17.94A10.07 10.07 0 0112 20c-7 0-11-8-11-8a18.45 18.45 0 015.06-5.94M9.9 4.24A9.12 9.12 0 0112 4c7 0 11 8 11 8a18.5 18.5 0 01-2.16 3.19m-6.72-1.07a3 3 0 11-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/>';
    }
  </script>
</body>

</html>