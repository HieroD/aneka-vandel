<!doctype html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Verify Email — Vandel</title>
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
      padding: 48px 36px 40px;
      width: 100%;
      max-width: 360px;
      text-align: center;
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

    .icon-wrap {
      width: 72px;
      height: 72px;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 14px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 24px;
      animation: pulse 2.5s ease-in-out infinite;
    }

    @keyframes pulse {

      0%,
      100% {
        box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.1);
      }

      50% {
        box-shadow: 0 0 0 10px rgba(255, 255, 255, 0.03);
      }
    }

    h1 {
      color: white;
      font-size: 22px;
      font-weight: 700;
      margin-bottom: 14px;
    }

    .subtitle {
      color: rgba(255, 255, 255, 0.6);
      font-size: 13.5px;
      line-height: 1.7;
      margin-bottom: 8px;
    }

    .email-badge {
      display: inline-block;
      background: rgba(255, 255, 255, 0.1);
      color: rgba(255, 255, 255, 0.9);
      font-size: 13px;
      font-weight: 600;
      padding: 6px 14px;
      border-radius: 8px;
      margin-bottom: 28px;
      word-break: break-all;
    }

    .btn-resend {
      width: 100%;
      padding: 13px;
      background: rgba(255, 255, 255, 0.93);
      color: #163070;
      border: none;
      border-radius: 10px;
      font-size: 13px;
      font-weight: 700;
      letter-spacing: 2px;
      text-transform: uppercase;
      cursor: pointer;
      transition: all 0.25s;
      margin-bottom: 12px;
    }

    .btn-resend:hover:not(:disabled) {
      background: white;
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
    }

    .btn-resend:disabled {
      opacity: 0.45;
      cursor: not-allowed;
    }

    .btn-catalog {
      width: 100%;
      padding: 13px;
      background: #111827;
      color: white;
      border: none;
      border-radius: 10px;
      font-size: 13px;
      font-weight: 600;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      transition: all 0.25s;
      margin-bottom: 10px;
      text-decoration: none;
    }

    .btn-back {
      width: 100%;
      padding: 12px;
      background: transparent;
      color: rgba(255, 255, 255, 0.55);
      border: 1px solid rgba(255, 255, 255, 0.15);
      border-radius: 10px;
      font-size: 13px;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
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

    .countdown {
      color: rgba(255, 255, 255, 0.4);
      font-size: 12px;
      margin-top: 14px;
      min-height: 18px;
    }

    .toast {
      position: fixed;
      top: 20px;
      left: 50%;
      transform: translateX(-50%) translateY(-60px);
      background: #111827;
      color: white;
      padding: 12px 24px;
      border-radius: 10px;
      font-size: 13px;
      border: 1px solid rgba(255, 255, 255, 0.1);
      transition: transform 0.35s ease;
      z-index: 999;
    }

    .toast.show {
      transform: translateX(-50%) translateY(0);
    }
  </style>
</head>

<body>
  <div class="card">
    <div class="icon-wrap">
      <svg width="36" height="36" viewBox="0 0 36 36" fill="none">
        <rect x="4" y="8" width="28" height="20" rx="3" stroke="white" stroke-width="2" />
        <path d="M4 11l14 10L32 11" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        <circle cx="26" cy="26" r="6" fill="#22c55e" />
        <path d="M23 26l2 2 4-4" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
      </svg>
    </div>

    <h1>Verify your email</h1>
    <p class="subtitle">Kami telah mengirimkan link verifikasi ke email Anda. Silakan klik link tersebut untuk mengaktifkan akun.</p>

    <div class="email-badge">{{ Auth::user()->email ?? "heru@gmail.com" }}</div>

    @if (session('status') === 'verification-link-sent')
    <div class="alert-success">Link verifikasi baru telah dikirim!</div>
    @endif

    <form action="{{ route('register.store') }}" method="POST" id="resendForm">
      @csrf
      <button type="submit" class="btn-resend" id="resendBtn">Resend Email</button>
    </form>

    <a href="{{ route('catalog.index', ['catgeory' => 'all']) }}" class="btn-catalog">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
        <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
        <polyline points="9,22 9,12 15,12 15,22" />
      </svg>
      Mulai Belanja
    </a>

    <form action="{{ route('logout') }}" method="POST">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn-back">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
          <path d="M19 12H5M12 5l-7 7 7 7" />
        </svg>
        Logout & Back to Login
      </button>
    </form>

    <div class="countdown" id="countdown"></div>
  </div>

  <div class="toast" id="toast"></div>

  <script>
    function showToast(msg) {
      const t = document.getElementById("toast");
      t.textContent = msg;
      t.classList.add("show");
      setTimeout(() => t.classList.remove("show"), 3000);
    }

    function startCooldown(sec) {
      const btn = document.getElementById("resendBtn");
      const cd = document.getElementById("countdown");
      if (!btn || !cd) return;

      btn.disabled = true;
      let remaining = sec;
      cd.textContent = `Kirim ulang dalam ${remaining}s`;

      const timer = setInterval(() => {
        remaining--;
        if (remaining <= 0) {
          clearInterval(timer);
          btn.disabled = false;
          cd.textContent = "";
        } else {
          cd.textContent = `Kirim ulang dalam ${remaining}s`;
        }
      }, 1000);
    }

    document.getElementById("resendForm").addEventListener("submit", function() {
      showToast("Memproses pengiriman ulang...");
    });
  </script>

  {{-- Perbaikan: Taruh pengecekan Blade di luar tag script utama --}}
  @if(session('status') === 'verification-link-sent')
  <script>
    startCooldown(60);
  </script>
  @endif
</body>

</html>