<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pêcheurs Élite — FishMasters</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;500;700&family=Outfit:wght@100;400;900&display=swap');
        :root { --accent: #00f2ff; --bg: #02040a; }
        body { font-family: 'Outfit', sans-serif; background-color: var(--bg); color: #fff; overflow-x: hidden; }
        .ultra-glass {
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
        .stat-card { transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); }
        .stat-card:hover { transform: scale(1.05); border-color: var(--accent); }
    </style>
</head>
<body class="antialiased">

    <nav class="fixed top-0 w-full z-[100] p-6">
        <div class="max-w-[1600px] mx-auto ultra-glass rounded-full px-8 py-4 flex justify-between items-center border border-white/10">
            <a href="index.html" class="flex items-center space-x-2">
                <div class="w-10 h-10 bg-cyan-500 rounded-full flex items-center justify-center shadow-[0_0_20px_rgba(6,182,212,0.5)]">
                    <i class="fa-solid fa-fish-fins text-black"></i>
                </div>
                <span class="text-2xl font-black uppercase tracking-tighter">Fish<span class="text-cyan-400">Masters</span></span>
            </a>
            <div class="hidden lg:flex space-x-10 text-xs font-bold uppercase tracking-widest text-slate-400">
                <a href="pécheure.php" class="text-cyan-400">Pêcheurs</a>
                <a href="équipe.php" class="hover:text-cyan-400 transition">Équipes</a>
                <a href="#" class="hover:text-cyan-400 transition">Records</a>
            </div>
            <button class="text-xs font-bold px-6 py-2 bg-white text-black rounded-full uppercase">Mon Profil</button>
        </div>
    </nav>

    <main class="max-w-[1600px] mx-auto px-6 pt-32 pb-24">
        <header class="mb-16">
            <span class="text-cyan-500 font-black tracking-[0.3em] uppercase text-xs">Classement Officiel 2026</span>
            <h1 class="text-7xl font-black uppercase italic leading-none mt-4">L'élite des <br><span class="text-cyan-500">Pêcheurs.</span></h1>
            <div class="mt-8 flex flex-wrap gap-4">
                <div class="ultra-glass px-6 py-3 rounded-2xl flex items-center space-x-3">
                    <span class="text-slate-500 text-xs font-bold">TOTAL INSCRITS:</span>
                    <span class="font-black text-xl">1,284</span>
                </div>
                <div class="ultra-glass px-6 py-3 rounded-2xl flex items-center space-x-3">
                    <span class="text-slate-500 text-xs font-bold">NATIONS:</span>
                    <span class="font-black text-xl text-cyan-400">12</span>
                </div>
            </div>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <div class="ultra-glass rounded-[40px] p-8 border border-white/5 relative overflow-hidden group">
                <div class="absolute -right-4 -top-4 text-9xl font-black italic opacity-[0.03] group-hover:opacity-10 transition-opacity">01</div>
                
                <div class="relative z-10">
                    <div class="flex items-start justify-between mb-8">
                        <img src="https://i.pravatar.cc/150?u=1" class="w-24 h-24 rounded-[30px] object-cover border-2 border-cyan-500">
                        <div class="text-right">
                            <p class="text-[10px] font-black text-cyan-500 uppercase">Points Global</p>
                            <p class="text-3xl font-black">24,850</p>
                        </div>
                    </div>

                    <h3 class="text-3xl font-black uppercase tracking-tighter">Yassine Amrani</h3>
                    <p class="text-slate-500 text-xs font-bold uppercase mb-8"><i class="fa-solid fa-location-dot mr-2"></i>Club Agadir Marine</p>

                    <div class="grid grid-cols-2 gap-3 mb-8">
                        <div class="bg-white/5 p-4 rounded-2xl border border-white/5">
                            <p class="text-[10px] text-slate-500 font-bold uppercase">Record</p>
                            <p class="text-lg font-black">15.4 Kg</p>
                        </div>
                        <div class="bg-white/5 p-4 rounded-2xl border border-white/5">
                            <p class="text-[10px] text-slate-500 font-bold uppercase">Prises</p>
                            <p class="text-lg font-black">142</p>
                        </div>
                    </div>

                    <div class="w-full bg-white/5 rounded-full h-2 mb-2">
                        <div class="bg-cyan-500 h-full rounded-full" style="width: 85%"></div>
                    </div>
                    <p class="text-[10px] font-bold text-slate-500 uppercase">Progression Championnat: 85%</p>
                </div>
            </div>

            <div class="ultra-glass rounded-[40px] p-8 border border-white/5 relative opacity-60 grayscale hover:opacity-100 hover:grayscale-0 transition-all cursor-pointer">
                <div class="flex items-start justify-between mb-8">
                    <img src="https://i.pravatar.cc/150?u=2" class="w-24 h-24 rounded-[30px] object-cover border border-white/20">
                    <div class="text-right">
                        <p class="text-[10px] font-black text-slate-500 uppercase">Points Global</p>
                        <p class="text-3xl font-black">21,120</p>
                    </div>
                </div>
                <h3 class="text-3xl font-black uppercase tracking-tighter">Sami Alami</h3>
                <p class="text-slate-500 text-xs font-bold uppercase mb-8"><i class="fa-solid fa-location-dot mr-2"></i>Tanger Surfcasting</p>
                <div class="grid grid-cols-2 gap-3">
                    <div class="bg-white/5 p-4 rounded-2xl">
                         <p class="text-[10px] text-slate-500 font-bold uppercase">Record</p>
                         <p class="text-lg font-black">11.2 Kg</p>
                    </div>
                    <div class="bg-white/5 p-4 rounded-2xl">
                         <p class="text-[10px] text-slate-500 font-bold uppercase">Prises</p>
                         <p class="text-lg font-black">98</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>