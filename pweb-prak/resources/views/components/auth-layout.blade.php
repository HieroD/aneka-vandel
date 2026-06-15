@props(['title'])

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title }} — Vandel</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
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
    </style>
</head>

<body class="bg-primary-darker min-h-screen flex items-center justify-center p-5 font-outfit">

    <div class="bg-primary-card border border-dashed border-white/25 rounded-2xl p-10 w-full max-w-sm animate-[fadeUp_.45s_ease]">

        {{ $slot }}

    </div>

    @stack('scripts')

    <script>
        document.querySelectorAll('[data-password-toggle]').forEach(function (wrapper) {
            var input = wrapper.querySelector('input');
            var trigger = wrapper.querySelector('[data-password-trigger]');
            if (!input || !trigger) return;
            trigger.addEventListener('click', function () {
                input.type = input.type === 'password' ? 'text' : 'password';
            });
        });
    </script>
</body>

</html>
