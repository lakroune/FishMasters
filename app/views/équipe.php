<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Équipes — FishMasters</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;500;700&family=Outfit:wght@100;400;900&display=swap');
        :root { --accent: #00f2ff; --bg: #02040a; }
        body { font-family: 'Outfit', sans-serif; background-color: var(--bg); color: #fff; }
        .ultra-glass { background: rgba(255, 255, 255, 0.02); backdrop-filter: blur(20px); border: 1px solid rgba(255, 255, 255, 0.05); }
    </style>
</head>
<body class="antialiased">

    <nav class="p-6">
        <div class="max-w-[1600px] mx-auto flex justify-between items-center">
            <a href="index.html" class="text-2xl font-black uppercase italic">Fish<span class="text-cyan-400">Masters</span></a>
            <div class="flex space-x-6 items-center">
                <a href="pécheure.php" class="text-xs font-bold uppercase text-slate-400">Pêcheurs</a>
                <a href="équipe.php" class="text-xs font-bold uppercase text-cyan-400">Équipes</a>
                <button class="bg-cyan-500 text-black px-6 py-2 rounded-full text-xs font-bold">REJOINDRE</button>
            </div>
        </div>
    </nav>

    <main class="max-w-[1600px] mx-auto px-6 pt-20">
        <div class="mb-20">
            <h1 class="text-8xl font-black uppercase italic tracking-tighter">Les <span class="text-cyan-500">Alliances.</span></h1>
            <p class="text-slate-500 max-w-xl mt-4 text-lg">Découvrez les équipes qui dominent les côtes marocaines cette saison.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 pb-20">
            
            <div class="ultra-glass rounded-[50px] p-12 flex flex-col md:flex-row gap-10 hover:bg-cyan-500/5 transition duration-500 border-l-4 border-l-cyan-500">
                <div class="flex-shrink-0">
                    <div class="w-48 h-48 bg-white/5 rounded-[40px] flex items-center justify-center border border-white/10 overflow-hidden group">
                        <i class="fa-solid fa-shield-halved text-7xl text-cyan-500 group-hover:scale-110 transition"></i>
                    </div>
                </div>

                <div class="flex-grow">
                    <div class="flex justify-between items-start mb-4">
                        <h2 class="text-4xl font-black uppercase tracking-tighter">Casa Fishing Crew</h2>
                        <span class="bg-cyan-500 text-black text-[10px] font-black px-3 py-1 rounded-full">DIV 1</span>
                    </div>
                    <p class="text-slate-400 font-medium mb-8">Spécialité: Surfcasting Heavy & Big Game</p>
                    
                    <div class="grid grid-cols-3 gap-6 mb-10">
                        <div>
                            <p class="text-2xl font-black">08</p>
                            <p class="text-[10px] text-slate-500 font-bold uppercase">Membres</p>
                        </div>
                        <div>
                            <p class="text-2xl font-black">422</p>
                            <p class="text-[10px] text-slate-500 font-bold uppercase">Victoires</p>
                        </div>
                        <div>
                            <p class="text-2xl font-black text-cyan-400">92k</p>
                            <p class="text-[10px] text-slate-500 font-bold uppercase">Score</p>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex -space-x-4">
                            <img src="https://i.pravatar.cc/100?u=10" class="w-12 h-12 rounded-full border-4 border-[#02040a]">
                            <img src="https://i.pravatar.cc/100?u=11" class="w-12 h-12 rounded-full border-4 border-[#02040a]">
                            <img src="https://i.pravatar.cc/100?u=12" class="w-12 h-12 rounded-full border-4 border-[#02040a]">
                            <div class="w-12 h-12 rounded-full bg-white/5 flex items-center justify-center text-xs border-4 border-[#02040a]">+5</div>
                        </div>
                        <button class="text-xs font-black uppercase tracking-widest border-b-2 border-cyan-500 pb-1 hover:text-cyan-500 transition">Statistiques Détailées</button>
                    </div>
                </div>
            </div>

             <div class="ultra-glass rounded-[50px] p-12 flex flex-col md:flex-row gap-10 hover:bg-white/[0.03] transition duration-500">
                <div class="flex-shrink-0">
                    <div class="w-48 h-48 bg-white/5 rounded-[40px] flex items-center justify-center border border-white/10">
                        <i class="fa-solid fa-anchor text-7xl text-slate-700"></i>
                    </div>
                </div>
                <div class="flex-grow">
                    <div class="flex justify-between items-start mb-4">
                        <h2 class="text-4xl font-black uppercase tracking-tighter">Sahara Anglers</h2>
                        <span class="bg-white/10 text-white text-[10px] font-black px-3 py-1 rounded-full">DIV 2</span>
                    </div>
                    <p class="text-slate-400 font-medium mb-8">Spécialité: Pêche à la traîne / Dakhla</p>
                    <div class="grid grid-cols-3 gap-6 mb-10">
                        <div><p class="text-2xl font-black">05</p><p class="text-[10px] text-slate-500 font-bold uppercase">Membres</p></div>
                        <div><p class="text-2xl font-black">156</p><p class="text-[10px] text-slate-500 font-bold uppercase">Victoires</p></div>
                        <div><p class="text-2xl font-black text-cyan-400">45k</p><p class="text-[10px] text-slate-500 font-bold uppercase">Score</p></div>
                    </div>
                    <button class="w-full py-4 border border-white/10 rounded-2xl text-[10px] font-black uppercase hover:bg-white hover:text-black transition">Voir l'équipe</button>
                </div>
            </div>

        </div>
    </main>
</body>
</html>
