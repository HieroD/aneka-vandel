<!doctype html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Verify Email — Vandel</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />

  <style>
    body {
      font-family: "Poppins", sans-serif;
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

    @keyframes pulse {

      0%,
      100% {
        box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.1);
      }

      50% {
        box-shadow: 0 0 0 10px rgba(255, 255, 255, 0.03);
      }
    }
  </style>
</head>

<body class="bg-[#0f2d6b] min-h-screen flex items-center justify-center p-5">

  <div class="bg-[#163070] border border-dashed border-white/25 rounded-2xl p-12 pt-12 pb-10 w-full max-w-sm text-center animate-[fadeUp_.45s_ease]">

    <!-- ICON -->
    <div class="w-[72px] h-[72px] bg-white/10 rounded-[14px] flex items-center justify-center mx-auto mb-6 animate-[pulse_2.5s_ease-in-out_infinite]">
      <svg width="36" height="36" viewBox="0 0 36 36" fill="none">
        <rect x="4" y="8" width="28" height="20" rx="3" stroke="white" stroke-width="2" />
        <path d="M4 11l14 10L32 11" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        <circle cx="26" cy="26" r="6" fill="#22c55e" />
        <path d="M23 26l2 2 4-4" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
      </svg>
    </div>

    <h1 class="text-white text-[22px] font-bold mb-3">Verify your email</h1>

    <p class="text-white/60 text-[13.5px] leading-[1.7] mb-2">
      Kami telah mengirimkan link verifikasi ke email Anda. Silakan klik link tersebut untuk mengaktifkan akun.
    </p>

    <div class="inline-block bg-white/10 text-white/90 text-[13px] font-semibold px-4 py-1.5 rounded-lg mb-7 break-all">
      {{ Auth::user()->email ?? "heru@gmail.com" }}
    </div>

    @if (session('status') === 'verification-link-sent')
    <div class="bg-green-500/15 border border-green-500/30 text-green-300 text-[12px] px-4 py-2.5 rounded-lg mb-4">
      Link verifikasi baru telah dikirim!
    </div>
    @endif

    <form action="{{ route('register.store') }}" method="POST" id="resendForm">
      @csrf
      <button type="submit" id="resendBtn"
        class="w-full py-3 bg-white/95 text-[#163070] font-bold text-[13px] tracking-[2px] uppercase rounded-[10px] transition hover:bg-white hover:-translate-y-[2px] shadow-lg mb-3 disabled:opacity-40 disabled:cursor-not-allowed">
        Resend Email
      </button>
    </form>

    <a href="{{ route('catalog.index', ['catgeory' => 'all']) }}"
      class="w-full py-3 bg-[#111827] text-white text-[13px] font-semibold rounded-[10px] flex items-center justify-center gap-2 mb-2 hover:-translate-y-[2px] transition">

      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
        <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
        <polyline points="9,22 9,12 15,12 15,22" />
      </svg>

      Mulai Belanja
    </a>

    <form action="{{ route('logout') }}" method="POST">
      @csrf
      @method('DELETE')
      <button type="submit"
        class="w-full py-3 bg-transparent border border-white/15 text-white/60 text-[13px] flex items-center justify-center gap-2 rounded-[10px]">

        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
          <path d="M19 12H5M12 5l-7 7 7 7" />
        </svg>

        Logout & Back to Login
      </button>
    </form>

    <div id="countdown" class="text-white/40 text-[12px] mt-4 min-h-[18px]"></div>

  </div>

  <!-- TOAST -->
  <div id="toast"
    class="fixed top-5 left-1/2 -translate-x-1/2 -translate-y-16 bg-[#111827] text-white px-6 py-3 rounded-[10px] text-[13px] border border-white/10 transition-all duration-300 z-[999]">
  </div>

  <script>
    function showToast(msg) {
      const t = document.getElementById("toast");
      t.textContent = msg;
      t.classList.remove("-translate-y-16");
      setTimeout(() => t.classList.add("-translate-y-16"), 3000);
    }

    function startCooldown(sec) {
      const btn = document.getElementById("resendBtn");
      const cd = document.getElementById("countdown");

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

  @if(session('status') === 'verification-link-sent')
  <script>
    startCooldown(60);
  </script>
  @endif

</body>

</html>