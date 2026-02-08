<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">

    <title>Login – Premium UI</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* ===========================================================
   ROOT & RESET
=========================================================== */
        :root {
            --glass-bg: rgba(255, 255, 255, 0.82);
            --glass-border: rgba(255, 255, 255, 0.35);
        }

        body {
            font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont,
                "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell;
        }

        /* ===========================================================
   BUBBLE ANIMATION (CINEMATIC)
=========================================================== */
        @keyframes floatUp {
            from {
                transform: translateY(0) scale(0.6);
                opacity: 1;
            }

            to {
                transform: translateY(-160vh) scale(1.4);
                opacity: 0;
            }
        }

        .bubble {
            position: fixed;
            border-radius: 9999px;
            pointer-events: none;
            animation: floatUp linear infinite;
            filter: blur(1px);
        }

        /* ===========================================================
   CURSOR PARTICLE (DESKTOP ONLY)
=========================================================== */
        .cursor-particle {
            position: fixed;
            border-radius: 9999px;
            pointer-events: none;
            z-index: 60;
            transform: translate(-50%, -50%);
            will-change: transform, opacity;
        }

        /* ===========================================================
   GLASS CARD
=========================================================== */
        .glass {
            background: var(--glass-bg);
            backdrop-filter: blur(18px);
            border: 1px solid var(--glass-border);
        }

        /* ===========================================================
   MOBILE OPTIMIZATION
=========================================================== */
        @media (max-width: 768px) {
            .cursor-particle {
                display: none !important;
            }
        }

        /* Respect reduced motion */
        @media (prefers-reduced-motion: reduce) {

            .bubble,
            .cursor-particle {
                animation: none !important;
            }
        }
    </style>
</head>

<body class="min-h-screen w-full bg-gradient-to-br from-gray-900 via-gray-800 to-black
             flex items-center justify-center relative overflow-hidden">

    <!-- LOGIN CARD -->
    <div class="relative z-20 w-full max-w-md mx-4
            p-8 sm:p-10 md:p-12
            bg-white/10 backdrop-blur-xl border border-white/30
            rounded-2xl shadow-[0_40px_120px_rgba(0,0,0,0.45)]
            transition-transform duration-500
            hover:scale-[1.01]">

        <h2 class="text-3xl md:text-4xl font-semibold text-center
               text-white mb-8 tracking-tight">
            Welcome Back
        </h2>

        <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-5">
            @csrf

            <div>
                <label class="text-sm font-medium text-white">Email</label>
                <input type="email" name="email" required class="mt-1 w-full p-4 rounded-xl border
                       bg-white 
                       focus:ring-2 focus:ring-blue-600 focus:border-blue-600
                       transition">
            </div>

            <div>
                <label class="text-sm font-medium text-white">Password</label>
                <input type="password" name="password" required class="mt-1 w-full p-4 rounded-xl border
                       bg-white
                       focus:ring-2 focus:ring-blue-600 focus:border-blue-600
                       transition">
            </div>

            <div class="flex justify-between items-center text-sm text-white">
                <label class="flex items-center gap-2">
                    <input type="checkbox" class="accent-blue-600">
                    Remember me
                </label>

                <a href="{{ route('password.request') }}" class="text-blue-400 hover:underline">
                    Forgot your password?
                </a>
            </div>

            <button class="mt-2 w-full p-4 rounded-xl
                       bg-blue-600 text-white font-semibold text-lg
                       hover:bg-blue-700
                       active:scale-[1.0]
                       transition-all">
                Log In
            </button>
        </form>

        <!-- Guest -->
        <div class="mt-6 flex flex-col gap-3">
            <div class="flex items-center gap-3">
                <div class="flex-1 h-px bg-gray-200"></div>
                <span class="text-xs text-gray-400">OR</span>
                <div class="flex-1 h-px bg-gray-200"></div>
            </div>

            <form method="POST" action="{{ route('guest.login') }}">
                @csrf
                <button class="w-full p-4 rounded-xl border
                           bg-white/90
                           font-medium text-gray-700
                           hover:bg-white
                           transition">
                    Continue as Guest
                </button>
                {{-- <p class="text-center text-xs text-gray-400 leading-relaxed">
                    Guest account has limited access.<br class="hidden sm:block">
                    <span class="text-gray-500">
                        Some features may be unavailable.
                    </span> --}}
                </p>
            </form>
        </div>
    </div>

    <!-- =========================================================
     EFFECTS SCRIPT
========================================================= -->
    <script>
        const isMobile = window.innerWidth < 768;
        const colors = ['#2563eb', '#10b981', '#8b5cf6', '#ec4899'];

        if (!isMobile) {
            document.addEventListener('mousemove', e => {
                for (let i = 0; i < 4; i++) {
                    const p = document.createElement('div');
                    p.className = 'cursor-particle';
                    const s = Math.random() * 6 + 6;
                    p.style.width = s + 'px';
                    p.style.height = s + 'px';
                    p.style.left = e.clientX + 'px';
                    p.style.top = e.clientY + 'px';
                    p.style.backgroundColor =
                        colors[Math.floor(Math.random() * colors.length)];
                    document.body.appendChild(p);

                    let life = 0;
                    const animate = () => {
                        life += 0.03;
                        p.style.opacity = 1 - life;
                        p.style.transform =
                            `translate(-50%, ${-50 - life * 30}px) scale(${1 - life})`;
                        if (life < 1) requestAnimationFrame(animate);
                        else p.remove();
                    };
                    animate();
                }
            });
        }

        // Bubble count adaptive
        const bubbleCount = isMobile ? 16 : 40;

        for (let i = 0; i < bubbleCount; i++) {
            const b = document.createElement('div');
            b.className = 'bubble';
            const size = Math.random() * 60 + 20;
            b.style.width = b.style.height = size + 'px';
            b.style.left = Math.random() * 100 + 'vw';
            b.style.top = Math.random() * 100 + 'vh';
            b.style.background =
                colors[Math.floor(Math.random() * colors.length)] + '44';
            b.style.animationDuration = (10 + Math.random() * 12) + 's';
            b.style.animationDelay = Math.random() * 6 + 's';
            document.body.appendChild(b);
        }
    </script>

</body>

</html>