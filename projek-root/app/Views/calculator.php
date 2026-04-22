<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Premium Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>
    :root {
        --font-jakarta: 'Plus Jakarta Sans', sans-serif;
    }

    body {
        margin: 0;
        background: #020617;
        font-family: var(--font-jakarta);
    }

    /* Mesh Gradient Animation */
    @keyframes meshGradient {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    .mesh-background {
        position: fixed;
        inset: 0;
        z-index: -1;
        background: radial-gradient(circle at 20% 20%, rgba(79, 70, 229, 0.15) 0%, transparent 40%),
                    radial-gradient(circle at 80% 80%, rgba(6, 182, 212, 0.15) 0%, transparent 40%),
                    radial-gradient(circle at 50% 50%, rgba(124, 58, 237, 0.1) 0%, transparent 50%),
                    #020617;
        background-size: 200% 200%;
        animation: meshGradient 15s ease infinite;
    }

    /* Glass Effects */
    .premium-glass {
        background: rgba(15, 23, 42, 0.6);
        backdrop-filter: blur(24px) saturate(180%);
        -webkit-backdrop-filter: blur(24px) saturate(180%);
        border: 1px solid rgba(255, 255, 255, 0.08);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
    }

    /* Button Glows */
    .btn-neon-rose { border-color: rgba(244, 63, 94, 0.2); color: #fb7185; }
    .btn-neon-rose:hover { background: rgba(244, 63, 94, 0.08); box-shadow: 0 0 20px rgba(244, 63, 94, 0.2); }

    .btn-neon-amber { border-color: rgba(245, 158, 11, 0.2); color: #fbbf24; }
    .btn-neon-amber:hover { background: rgba(245, 158, 11, 0.08); box-shadow: 0 0 20px rgba(245, 158, 11, 0.2); }

    .btn-neon-indigo { border-color: rgba(99, 102, 241, 0.2); color: #818cf8; }
    .btn-neon-indigo:hover { background: rgba(99, 102, 241, 0.08); box-shadow: 0 0 20px rgba(99, 102, 241, 0.2); }

    /* Shine Animation */
    @keyframes shine {
        0% { transform: translateX(-100%) skewX(-15deg); }
        100% { transform: translateX(200%) skewX(-15deg); }
    }

    .btn-equal {
        background: linear-gradient(135deg, #4f46e5 0%, #06b6d4 100%);
        position: relative;
        overflow: hidden;
    }

    .btn-equal::after {
        content: '';
        position: absolute;
        top: 0; left: -50%; width: 50%; height: 100%;
        background: linear-gradient(to right, transparent, rgba(255,255,255,0.3), transparent);
        animation: shine 3s infinite;
    }

    /* Display Focus */
    .display-container {
        position: relative;
    }

    .display-container::before {
        content: '';
        position: absolute;
        bottom: -5px; left: 10%; right: 10%; height: 1px;
        background: linear-gradient(90deg, transparent, rgba(34, 211, 238, 0.4), transparent);
    }

    /* Particle Container */
    #particle-container {
        position: fixed;
        inset: 0;
        pointer-events: none;
        z-index: 1000;
    }
</style>

<div class="mesh-background"></div>
<div id="particle-container"></div>

<section class="flex min-h-[calc(100vh-160px)] flex-col items-center justify-center px-4 py-8">
    <!-- Main Shell -->
    <div class="calculator premium-glass w-full max-w-[400px] overflow-hidden rounded-[48px] p-8 transition-transform duration-500 hover:scale-[1.01]">
        
        <!-- Top Status -->
        <div class="mb-8 flex items-center justify-between px-2">
            <div class="flex space-x-2">
                <div class="h-2 w-2 rounded-full bg-rose-500/60 shadow-[0_0_8px_rgba(244,63,94,0.4)]"></div>
                <div class="h-2 w-2 rounded-full bg-amber-500/60 shadow-[0_0_8px_rgba(245,158,11,0.4)]"></div>
                <div class="h-2 w-2 rounded-full bg-emerald-500/60 shadow-[0_0_8px_rgba(16,185,129,0.4)]"></div>
            </div>
            <div class="flex items-center space-x-3">
                <div class="flex flex-col items-end">
                    <span class="text-[8px] font-bold tracking-[0.25em] text-slate-500 uppercase">Quantum Engine</span>
                    <span class="text-[10px] font-medium text-cyan-400 opacity-80">v2.0 ACTIVE</span>
                </div>
                <div class="relative flex h-3 w-3 items-center justify-center">
                    <div class="absolute h-full w-full animate-ping rounded-full bg-cyan-400/20"></div>
                    <div class="relative h-1.5 w-1.5 rounded-full bg-cyan-400"></div>
                </div>
            </div>
        </div>

        <!-- Display Section -->
        <div class="display-container mb-10 text-right">
            <div id="history" class="mb-2 h-7 truncate text-base font-medium tracking-wide text-slate-500 transition-all duration-300">0</div>
            <div id="display" class="truncate text-6xl font-extralight tracking-tight text-white/90 transition-all duration-300">0</div>
        </div>

        <!-- Buttons Grid -->
        <div class="grid grid-cols-4 gap-4">
            <!-- Row 1 -->
            <button class="calc-btn btn-neon-rose flex h-16 items-center justify-center rounded-[24px] border border-white/5 bg-white/5 text-sm font-bold tracking-widest transition-all duration-300 active:scale-90" data-action="clear">AC</button>
            <button class="calc-btn btn-neon-amber flex h-16 items-center justify-center rounded-[24px] border border-white/5 bg-white/5 transition-all duration-300 active:scale-90" data-action="delete">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2M3 12l6.414 6.414a2 2 0 001.414.586H19a2 2 0 002-2V7a2 2 0 00-2-2h-8.172a2 2 0 00-1.414.586L3 12z" />
                </svg>
            </button>
            <button class="calc-btn btn-neon-indigo flex h-16 items-center justify-center rounded-[24px] border border-white/5 bg-white/5 text-lg font-bold transition-all duration-300 active:scale-90" data-value="%">%</button>
            <button class="calc-btn btn-neon-indigo flex h-16 items-center justify-center rounded-[24px] border border-white/5 bg-white/5 text-2xl font-bold transition-all duration-300 active:scale-90" data-value="/">÷</button>

            <!-- Row 2 -->
            <button class="calc-btn flex h-16 items-center justify-center rounded-[24px] border border-white/5 bg-white/5 text-xl font-medium text-slate-200 transition-all duration-300 hover:bg-white/10 active:scale-90" data-value="7">7</button>
            <button class="calc-btn flex h-16 items-center justify-center rounded-[24px] border border-white/5 bg-white/5 text-xl font-medium text-slate-200 transition-all duration-300 hover:bg-white/10 active:scale-90" data-value="8">8</button>
            <button class="calc-btn flex h-16 items-center justify-center rounded-[24px] border border-white/5 bg-white/5 text-xl font-medium text-slate-200 transition-all duration-300 hover:bg-white/10 active:scale-90" data-value="9">9</button>
            <button class="calc-btn btn-neon-indigo flex h-16 items-center justify-center rounded-[24px] border border-white/5 bg-white/5 text-2xl font-bold transition-all duration-300 active:scale-90" data-value="*">×</button>

            <!-- Row 3 -->
            <button class="calc-btn flex h-16 items-center justify-center rounded-[24px] border border-white/5 bg-white/5 text-xl font-medium text-slate-200 transition-all duration-300 hover:bg-white/10 active:scale-90" data-value="4">4</button>
            <button class="calc-btn flex h-16 items-center justify-center rounded-[24px] border border-white/5 bg-white/5 text-xl font-medium text-slate-200 transition-all duration-300 hover:bg-white/10 active:scale-90" data-value="5">5</button>
            <button class="calc-btn flex h-16 items-center justify-center rounded-[24px] border border-white/5 bg-white/5 text-xl font-medium text-slate-200 transition-all duration-300 hover:bg-white/10 active:scale-90" data-value="6">6</button>
            <button class="calc-btn btn-neon-indigo flex h-16 items-center justify-center rounded-[24px] border border-white/5 bg-white/5 text-3xl font-bold transition-all duration-300 active:scale-90" data-value="-">−</button>

            <!-- Row 4 -->
            <button class="calc-btn flex h-16 items-center justify-center rounded-[24px] border border-white/5 bg-white/5 text-xl font-medium text-slate-200 transition-all duration-300 hover:bg-white/10 active:scale-90" data-value="1">1</button>
            <button class="calc-btn flex h-16 items-center justify-center rounded-[24px] border border-white/5 bg-white/5 text-xl font-medium text-slate-200 transition-all duration-300 hover:bg-white/10 active:scale-90" data-value="2">2</button>
            <button class="calc-btn flex h-16 items-center justify-center rounded-[24px] border border-white/5 bg-white/5 text-xl font-medium text-slate-200 transition-all duration-300 hover:bg-white/10 active:scale-90" data-value="3">3</button>
            <button class="calc-btn btn-neon-indigo flex h-16 items-center justify-center rounded-[24px] border border-white/5 bg-white/5 text-3xl font-bold transition-all duration-300 active:scale-90" data-value="+">+</button>

            <!-- Row 5 -->
            <button class="calc-btn col-span-2 flex h-16 items-center justify-center rounded-[24px] border border-white/5 bg-white/5 text-xl font-medium text-slate-200 transition-all duration-300 hover:bg-white/10 active:scale-90" data-value="0">0</button>
            <button class="calc-btn flex h-16 items-center justify-center rounded-[24px] border border-white/5 bg-white/5 text-xl font-medium text-slate-200 transition-all duration-300 hover:bg-white/10 active:scale-90" data-value=".">.</button>
            <button class="calc-btn btn-equal flex h-16 items-center justify-center rounded-[24px] text-3xl font-bold text-white shadow-[0_15px_30px_-5px_rgba(79,70,229,0.5)] transition-all duration-300 hover:brightness-110 active:scale-90" data-action="calculate">=</button>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
