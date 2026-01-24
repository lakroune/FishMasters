<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD PRO — FISHMASTERS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;900&display=swap');
        body { font-family: 'Outfit', sans-serif; background: #02040a; color: #fff; }
        .ultra-glass { background: rgba(255, 255, 255, 0.02); backdrop-filter: blur(15px); border: 1px solid rgba(255, 255, 255, 0.05); }
        .stat-card { transition: all 0.3s ease; border-left: 4px solid transparent; }
        .stat-card:hover { border-left-color: #06b6d4; background: rgba(255, 255, 255, 0.05); }
    </style>
</head>
<body class="antialiased pb-24">

    <?php include "header.php"; ?>

    <main class="max-w-6xl mx-auto px-6 pt-32 space-y-8">
        
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h1 class="text-3xl font-black uppercase italic tracking-tighter">Salut, <?= $pecheur->getNom(); ?> ! ⚡</h1>
                <p class="text-slate-500 text-[10px] font-bold uppercase tracking-[0.3em]">Voici tes performances de la saison</p>
            </div>
            <button class="bg-cyan-500 text-black px-6 py-3 rounded-2xl font-black uppercase text-[10px] tracking-widest shadow-[0_10px_20px_rgba(6,182,212,0.3)]">
                Lancer un Direct <i class="fa-solid fa-broadcast-tower ml-2"></i>
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            
            <div class="ultra-glass p-6 rounded-[35px] stat-card md:col-span-2 flex items-center justify-between">
                <div>
                    <p class="text-[9px] font-black text-slate-500 uppercase tracking-widest mb-1">Classement Actuel</p>
                    <h2 class="text-5xl font-black italic text-cyan-500">#08</h2>
                    <p class="text-[10px] font-bold text-green-500 mt-2 uppercase"><i class="fa-solid fa-caret-up"></i> +2 positions ce mois</p>
                </div>
                <div class="w-20 h-20 bg-cyan-500/10 rounded-full flex items-center justify-center border border-cyan-500/20">
                    <i class="fa-solid fa-trophy text-3xl text-cyan-500"></i>
                </div>
            </div>

            <div class="ultra-glass p-6 rounded-[35px] stat-card">
                <p class="text-[9px] font-black text-slate-500 uppercase tracking-widest mb-1">Score Total</p>
                <h2 class="text-3xl font-black italic">145.8k</h2>
                <div class="mt-4 w-full bg-white/5 h-1.5 rounded-full overflow-hidden">
                    <div class="bg-cyan-500 h-full w-[75%] shadow-[0_0_10px_#06b6d4]"></div>
                </div>
                <p class="text-[8px] text-slate-600 mt-2 uppercase">75% vers Niveau Pro+</p>
            </div>

            <div class="ultra-glass p-6 rounded-[35px] stat-card">
                <p class="text-[9px] font-black text-slate-500 uppercase tracking-widest mb-1">Prises Validées</p>
                <h2 class="text-3xl font-black italic">342</h2>
                <p class="text-[8px] text-cyan-500/50 mt-4 font-bold uppercase tracking-tighter">Record: 12.4kg (Courbine)</p>
            </div>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            
            <div class="ultra-glass p-8 rounded-[40px] flex flex-col justify-center border-t border-white/5">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-10 h-10 bg-rose-500/10 rounded-xl flex items-center justify-center text-rose-500 text-sm">
                        <i class="fa-solid fa-heart"></i>
                    </div>
                    <div>
                        <p class="text-xl font-black italic">12.4k</p>
                        <p class="text-[8px] text-slate-500 font-black uppercase tracking-widest">Supporteurs</p>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 bg-blue-500/10 rounded-xl flex items-center justify-center text-blue-500 text-sm">
                        <i class="fa-solid fa-eye"></i>
                    </div>
                    <div>
                        <p class="text-xl font-black italic">85.1k</p>
                        <p class="text-[8px] text-slate-500 font-black uppercase tracking-widest">Vues Totales</p>
                    </div>
                </div>
            </div>

            <div class="ultra-glass rounded-[40px] md:col-span-2 overflow-hidden relative group">
                <img src="https://images.unsplash.com/photo-1544551763-46a013bb70d5?q=80&w=1000" class="absolute inset-0 w-full h-full object-cover opacity-20 group-hover:scale-110 transition-transform duration-700">
                <div class="relative p-8 h-full flex flex-col justify-between">
                    <div class="flex justify-between items-start">
                        <h3 class="text-xl font-black uppercase italic">Dernière <br> Performance</h3>
                        <span class="bg-cyan-500 text-black text-[8px] font-black px-3 py-1 rounded-full uppercase">Top Score</span>
                    </div>
                    <div class="mt-4">
                        <p class="text-4xl font-black italic">+850 PTS</p>
                        <p class="text-[9px] text-slate-400 font-bold uppercase tracking-widest">Loup de mer • Dakhla • Janv 2026</p>
                    </div>
                </div>
            </div>

        </div>

        

    </main>

</body>
</html>