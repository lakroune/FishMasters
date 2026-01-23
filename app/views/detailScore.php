<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MES SCORES — FISHMASTERS X</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;700&family=Outfit:wght@300;400;900&display=swap');
        :root { --accent: #00f2ff; --bg: #02040a; }
        body { font-family: 'Outfit', sans-serif; background-color: var(--bg); color: #fff; }
        .ultra-glass {
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
        .score-gradient {
            background: linear-gradient(135deg, rgba(0, 242, 255, 0.1) 0%, rgba(0, 242, 255, 0) 100%);
        }
        .progress-bar {
            background: linear-gradient(90deg, #00f2ff 0%, #006b70 100%);
            box-shadow: 0 0 15px rgba(0, 242, 255, 0.4);
        }
    </style>
</head>
<body class="antialiased">

    <nav class="p-6 flex justify-between items-center max-w-4xl mx-auto">
        <a href="index.html" class="w-10 h-10 ultra-glass rounded-full flex items-center justify-center hover:text-cyan-400 transition">
            <i class="fa-solid fa-chevron-left"></i>
        </a>
        <h1 class="text-sm font-black uppercase tracking-[0.3em]">Tableau de <span class="text-cyan-500">Bord</span></h1>
        <div class="w-10 h-10 rounded-full border-2 border-cyan-500 overflow-hidden">
            <img src="https://i.pravatar.cc/100?u=me" alt="Profil">
        </div>
    </nav>

    <main class="max-w-4xl mx-auto px-6 pb-24">

        <section class="mt-8 mb-12 text-center">
            <div class="ultra-glass rounded-[40px] p-10 score-gradient relative overflow-hidden">
                <div class="absolute top-0 right-0 p-6 opacity-5">
                    <i class="fa-solid fa-trophy text-9xl"></i>
                </div>
                
                <p class="text-[10px] font-black uppercase tracking-[0.5em] text-cyan-500 mb-2">Points Cumulés</p>
                <h2 class="text-7xl font-black mb-4 tracking-tighter italic">12,840<span class="text-xl text-white/50 not-italic ml-2 uppercase">pts</span></h2>
                
                <div class="max-w-xs mx-auto mt-6">
                    <div class="flex justify-between text-[9px] font-black uppercase mb-2 tracking-widest">
                        <span>Rang: Expert</span>
                        <span class="text-cyan-400">Prochain: Master (15k)</span>
                    </div>
                    <div class="w-full h-1.5 bg-white/10 rounded-full overflow-hidden">
                        <div class="progress-bar h-full" style="width: 82%"></div>
                    </div>
                </div>
            </div>
        </section>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-12">
            <div class="ultra-glass p-4 rounded-3xl text-center">
                <p class="text-xs text-slate-500 font-bold uppercase mb-1">Prises</p>
                <p class="text-xl font-black italic">42</p>
            </div>
            <div class="ultra-glass p-4 rounded-3xl text-center">
                <p class="text-xs text-slate-500 font-bold uppercase mb-1">No-Kill</p>
                <p class="text-xl font-black italic text-green-400">92%</p>
            </div>
            <div class="ultra-glass p-4 rounded-3xl text-center">
                <p class="text-xs text-slate-500 font-bold uppercase mb-1">Moyenne</p>
                <p class="text-xl font-black italic">305<span class="text-[10px]">pts</span></p>
            </div>
            <div class="ultra-glass p-4 rounded-3xl text-center">
                <p class="text-xs text-slate-500 font-bold uppercase mb-1">Record</p>
                <p class="text-xl font-black italic text-cyan-400">1.2k</p>
            </div>
        </div>

        <section>
            <h3 class="text-sm font-black uppercase tracking-widest mb-6 flex items-center">
                <i class="fa-solid fa-list-ul mr-3 text-cyan-500"></i> Historique des Gains
            </h3>

            <div class="space-y-4">
                <div class="ultra-glass p-5 rounded-[25px] flex items-center justify-between hover:bg-white/5 transition group">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 rounded-2xl bg-white/5 flex items-center justify-center border border-white/10 group-hover:border-cyan-500/50">
                            <i class="fa-solid fa-fish text-cyan-500"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-sm">Loup de Mer (Bar)</h4>
                            <p class="text-[10px] text-slate-500 uppercase">14 Jan 2026 • 4.2kg • Relâché</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="font-black text-lg text-cyan-400">+420</p>
                        <p class="text-[8px] text-slate-500 uppercase font-bold tracking-tighter">Points</p>
                    </div>
                </div>

                <div class="ultra-glass p-5 rounded-[25px] flex items-center justify-between hover:bg-white/5 transition group border-l-2 border-green-500">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 rounded-2xl bg-green-500/10 flex items-center justify-center border border-green-500/20">
                            <i class="fa-solid fa-award text-green-500"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-sm italic">Bonus No-Kill</h4>
                            <p class="text-[10px] text-slate-500 uppercase">Prise du 14 Jan • Ethique environnementale</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="font-black text-lg text-green-400">+84</p>
                        <p class="text-[8px] text-slate-500 uppercase font-bold tracking-tighter">Bonus</p>
                    </div>
                </div>

                <div class="ultra-glass p-5 rounded-[25px] flex items-center justify-between hover:bg-white/5 transition group">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 rounded-2xl bg-white/5 flex items-center justify-center border border-white/10 group-hover:border-cyan-500/50">
                            <i class="fa-solid fa-fish text-slate-400"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-sm">Dorade Royale</h4>
                            <p class="text-[10px] text-slate-500 uppercase">12 Jan 2026 • 2.1kg • Gardé</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="font-black text-lg">+210</p>
                        <p class="text-[8px] text-slate-500 uppercase font-bold tracking-tighter">Points</p>
                    </div>
                </div>
            </div>

            <button class="w-full mt-8 py-4 border border-white/5 rounded-2xl text-[10px] font-black uppercase tracking-widest text-slate-500 hover:text-cyan-500 hover:border-cyan-500/30 transition">
                Voir l'historique complet
            </button>
        </section>

    </main>

    <div class="fixed bottom-6 left-1/2 -translate-x-1/2 w-[90%] max-w-md ultra-glass rounded-full p-2 flex justify-around items-center z-50">
        <a href="#" class="w-12 h-12 flex items-center justify-center text-slate-500 hover:text-cyan-400 transition"><i class="fa-solid fa-house"></i></a>
        <a href="#" class="w-12 h-12 flex items-center justify-center text-slate-500 hover:text-cyan-400 transition"><i class="fa-solid fa-trophy"></i></a>
        <a href="#" class="w-14 h-14 bg-cyan-500 rounded-full flex items-center justify-center text-black shadow-lg shadow-cyan-500/40"><i class="fa-solid fa-plus text-xl"></i></a>
        <a href="#" class="w-12 h-12 flex items-center justify-center text-cyan-400 transition"><i class="fa-solid fa-chart-line"></i></a>
        <a href="#" class="w-12 h-12 flex items-center justify-center text-slate-500 hover:text-cyan-400 transition"><i class="fa-solid fa-user"></i></a>
    </div>

</body>
</html>