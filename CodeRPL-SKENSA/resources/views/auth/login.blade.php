<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - Modern UI</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
/* === Reset & Globals === */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body {
    font-family: 'Inter', sans-serif;
    height: 100vh;
    width: 100%;
    overflow: hidden;
    background: linear-gradient(135deg,#1f2937,#111827);
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    cursor: none;
}

/* === Bubble Background === */
.bubble {
    position: absolute;
    border-radius: 50%;
    pointer-events: none;
    animation: floatUp linear infinite;
}
@keyframes floatUp {
    0% { transform: translateY(0) scale(0.5); opacity:1; }
    100% { transform: translateY(-1500px) scale(1.5); opacity:0; }
}

/* === Container === */
.container {
    position: relative;
    z-index: 10;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* === Login Card === */
.login-card {
    background-color: #fff;
    border-radius: 20px;
    width: 100%;
    max-width: 420px;
    padding: 50px 40px;
    box-shadow: 0 25px 50px rgba(0,0,0,0.25);
    position: relative;
    display: flex;
    flex-direction: column;
    gap: 20px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.login-card:hover {
    transform: translateY(-5px) perspective(500px) rotateX(2deg);
    box-shadow: 0 30px 60px rgba(0,0,0,0.35);
}

/* Card Header */
.login-card h2 {
    font-size: 2rem;
    color: #2563eb;
    text-align: center;
    margin-bottom: 30px;
}

/* Input Fields */
.form-input {
    width: 100%;
    padding: 16px;
    border-radius: 12px;
    border: 1px solid #ddd;
    font-size: 16px;
    transition: border 0.3s ease, box-shadow 0.3s ease;
}
.form-input:focus {
    outline: none;
    border-color: #2563eb;
    box-shadow: 0 0 10px rgba(37,99,235,0.4);
}

/* Labels */
.form-label {
    font-weight: 500;
    color: #374151;
    margin-bottom: 6px;
    display: block;
}

/* Button */
.btn-primary {
    width: 100%;
    padding: 16px;
    background-color: #2563eb;
    color: #fff;
    font-weight: 600;
    border-radius: 12px;
    border: none;
    cursor: pointer;
    font-size: 18px;
    transition: background-color 0.3s, transform 0.2s;
}
.btn-primary:hover {
    background-color: #1d4ed8;
    transform: scale(1.05);
}

/* Checkbox */
.checkbox-container {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 14px;
    color: #6b7280;
}
.checkbox-container input {
    accent-color: #2563eb;
}

/* Forgot Password */
.forgot {
    text-align: right;
    font-size: 14px;
}
.forgot a {
    color: #2563eb;
    text-decoration: none;
    transition: color 0.3s ease;
}
.forgot a:hover {
    color: #1d4ed8;
}

/* Error Message */
.error-message {
    font-size: 13px;
    color: #f87171;
    margin-top: 4px;
}

/* Cursor Trail Particles */
.cursor-particle {
    position: absolute;
    width: 10px;
    height: 10px;
    border-radius: 50%;
    pointer-events: none;
    transform: translate(-50%, -50%);
    opacity: 1;
    will-change: transform, opacity;
}

/* Responsive */
@media(max-width:768px){
    .login-card{
        padding: 30px 20px;
    }
    .login-card h2{
        font-size: 1.5rem;
    }
    .form-input{
        padding: 12px;
        font-size: 14px;
    }
    .btn-primary{
        font-size: 16px;
        padding: 14px;
    }
}
</style>
</head>
<body>

<!-- Login Container -->
<div class="container">
    <div class="login-card">
        <h2>Welcome Back</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="form-input">
            @error('email')<span class="error-message">{{ $message }}</span>@enderror

            <label for="password" class="form-label">Password</label>
            <input id="password" type="password" name="password" required class="form-input">
            @error('password')<span class="error-message">{{ $message }}</span>@enderror

            <div class="checkbox-container">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember me</label>
            </div>

            <div class="forgot">
                @if(Route::has('password.request'))
                <a href="{{ route('password.request') }}">Forgot your password?</a>
                @endif
            </div>

            <button type="submit" class="btn-primary">Log In</button>
        </form>
    </div>
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

        // Animate particle
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
