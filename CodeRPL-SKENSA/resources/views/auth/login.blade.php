<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - Modern UI</title>
<script src="https://cdn.tailwindcss.com"></script>
<style>
/* === Bubble Animation === */
@keyframes floatUp {
  0% { transform: translateY(0) scale(0.5); opacity:1; }
  100% { transform: translateY(-1500px) scale(1.5); opacity:0; }
}
.bubble {
  position: absolute;
  border-radius: 9999px;
  pointer-events: none;
  animation: floatUp linear infinite;
}

/* Cursor particle */
.cursor-particle {
  position: absolute;
  border-radius: 9999px;
  pointer-events: none;
  transform: translate(-50%, -50%);
  opacity: 1;
  will-change: transform, opacity;
}
</style>
</head>
<body class="h-screen w-screen overflow-hidden bg-gradient-to-br from-gray-900 to-gray-800 flex items-center justify-center relative cursor-none font-inter">

<!-- Login Card -->
<div class="relative z-10 w-full max-w-md p-10 md:p-12 bg-white rounded-2xl flex flex-col gap-5 shadow-2xl transition-transform duration-300 hover:-translate-y-1 hover:rotate-x-1 hover:shadow-[0_30px_60px_rgba(0,0,0,0.35)]">
    <h2 class="text-3xl md:text-4xl text-blue-600 font-semibold text-center mb-8">Welcome Back</h2>

    <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-5">
        @csrf

        <div class="flex flex-col gap-1">
            <label for="email" class="text-gray-700 font-medium">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                   class="w-full p-4 rounded-xl border border-gray-300 text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition">
            @error('email')<span class="text-red-500 text-sm mt-1">{{ $message }}</span>@enderror
        </div>

        <div class="flex flex-col gap-1">
            <label for="password" class="text-gray-700 font-medium">Password</label>
            <input id="password" type="password" name="password" required
                   class="w-full p-4 rounded-xl border border-gray-300 text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition">
            @error('password')<span class="text-red-500 text-sm mt-1">{{ $message }}</span>@enderror
        </div>

        <div class="flex items-center gap-2 text-gray-500 text-sm">
            <input type="checkbox" name="remember" id="remember" class="accent-blue-600">
            <label for="remember">Remember me</label>
        </div>

        <div class="text-right text-sm">
            @if(Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="text-blue-600 hover:text-blue-700">Forgot your password?</a>
            @endif
        </div>

        <button type="submit" class="w-full p-4 bg-blue-600 text-white font-semibold text-lg rounded-xl hover:bg-blue-700 hover:scale-105 transition">Log In</button>
    </form>
</div>

<script>
// ===== COLORS =====
const colors = ['#2563eb','#f59e0b','#10b981','#ef4444','#8b5cf6','#ec4899','#3b82f6','#f97316'];

// ===== CREATE FLOATING BUBBLES =====
const bubbleCount = 50;
for(let i=0;i<bubbleCount;i++){
    const bubble = document.createElement('div');
    bubble.className='bubble';
    const size = Math.random()*60 + 20;
    bubble.style.width = size+'px';
    bubble.style.height = size+'px';
    bubble.style.left = Math.random()*100 + 'vw';
    bubble.style.top = Math.random()*100 + 'vh';
    bubble.style.backgroundColor = colors[Math.floor(Math.random()*colors.length)] + '40';
    bubble.style.animationDuration = (8 + Math.random()*10)+'s';
    bubble.style.animationDelay = Math.random()*5+'s';
    document.body.appendChild(bubble);
}

// ===== CURSOR TRAIL =====
const trailParticles = [];
const maxTrail = 100;
document.addEventListener('mousemove', (e)=>{
    for(let i=0;i<8;i++){
        const p = document.createElement('div');
        p.className='cursor-particle';
        const size = Math.random()*6 + 6;
        p.style.width = size+'px';
        p.style.height = size+'px';
        p.style.left = e.clientX + (Math.random()*2-1)+'px';
        p.style.top = e.clientY + (Math.random()*2-1)+'px';
        p.style.backgroundColor = colors[Math.floor(Math.random()*colors.length)];
        document.body.appendChild(p);
        trailParticles.push(p);

        if(trailParticles.length > maxTrail){
            const old = trailParticles.shift();
            old.remove();
        }

        let lifetime = 0;
        const animate = ()=>{
            lifetime += 0.006 + Math.random()*0.002;
            p.style.opacity = (1-lifetime);
            p.style.transform = `translate(-50%,${-50 - lifetime*50}px) scale(${1-lifetime})`;
            if(lifetime < 1) requestAnimationFrame(animate);
            else p.remove();
        }
        requestAnimationFrame(animate);
    }
});
</script>
</body>
</html>
