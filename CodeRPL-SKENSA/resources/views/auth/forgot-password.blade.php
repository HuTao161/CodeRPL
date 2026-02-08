<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Forgot Password - RICH</title>
<script src="https://cdn.tailwindcss.com"></script>

<style>
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
</style>
</head>

<body class="h-screen w-screen overflow-hidden bg-gradient-to-br from-gray-900 to-gray-800 flex items-center justify-center relative font-sans">

<!-- CARD -->
<div class="relative z-10 w-full max-w-md p-10 bg-white rounded-2xl shadow-2xl hover:-translate-y-1 transition">

    <h2 class="text-3xl font-bold text-blue-600 text-center mb-4">
        Forgot Password
    </h2>

    <p class="text-gray-500 text-center mb-6 text-sm">
        Enter your email and we will send you a reset link
    </p>

    <!-- Status Message -->
    @if (session('status'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-sm">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}" class="flex flex-col gap-5">
        @csrf

        <!-- EMAIL -->
        <div>
            <label class="text-gray-700 font-medium">Email Address</label>
            <input type="email" name="email" value="{{ old('email') }}" required
                class="w-full p-3 mt-1 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-600 outline-none">
            @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- BUTTON -->
        <button type="submit"
            class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold text-lg hover:bg-blue-700 transition">
            Send Reset Link
        </button>

        <!-- BACK LOGIN -->
        <p class="text-center text-sm text-gray-500 mt-2">
            Remember your password? 
            <a href="{{ route('login') }}" class="text-blue-600 font-medium hover:underline">
                Back to Login
            </a>
        </p>
    </form>
</div>

<!-- BUBBLE BACKGROUND -->
<script>
const colors = ['#2563eb','#f59e0b','#10b981','#ef4444','#8b5cf6','#ec4899','#3b82f6','#f97316'];
for(let i=0;i<40;i++){
    const b=document.createElement('div');
    b.className='bubble';
    const s=Math.random()*60+20;
    b.style.width=s+'px';
    b.style.height=s+'px';
    b.style.left=Math.random()*100+'vw';
    b.style.top=Math.random()*100+'vh';
    b.style.backgroundColor=colors[Math.floor(Math.random()*colors.length)]+'40';
    b.style.animationDuration=(8+Math.random()*10)+'s';
    document.body.appendChild(b);
}
</script>

</body>
</html>
