<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le Concept — FishFan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;900&display=swap');
        body { font-family: 'Outfit', sans-serif; background: #02040a; color: #fff; }
        .ultra-glass { background: rgba(255, 255, 255, 0.02); backdrop-filter: blur(20px); border: 1px solid rgba(255, 255, 255, 0.05); }
        .text-gradient { background: linear-gradient(to right, #f43f5e, #fb7185); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    </style>
</head>
<body class="antialiased">

    <?php include('header.php'); ?>

    <main class="max-w-6xl mx-auto px-6 pt-40 pb-20">
        
        <div class="text-center mb-20">
            <span class="text-pink-500 font-black text-[10px] uppercase tracking-[0.5em]">L'Univers des Passionnés</span>
            <h1 class="text-6xl md:text-8xl font-black uppercase italic leading-none mt-4">Plus qu'une <br> <span class="text-gradient">Communauté.</span></h1>
            <p class="text-slate-500 max-w-2xl mx-auto mt-8 text-sm md:text-base font-medium leading-relaxed">
                FishFan est la première destination pour les amoureux de la pêche au Maroc. Suivez vos athlètes préférés, participez à l'évolution du sport et accédez à des contenus exclusifs.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <div class="ultra-glass p-10 rounded-[50px] md:col-span-2 flex flex-col justify-end min-h-[350px] relative overflow-hidden group">
                <i class="fa-solid fa-anchor absolute -top-10 -right-10 text-[200px] opacity-[0.03] group-hover:rotate-12 transition-transform duration-700"></i>
                <div class="relative z-10">
                    <div class="w-12 h-12 bg-pink-500 rounded-2xl flex items-center justify-center mb-6 shadow-[0_0_20px_rgba(244,63,94,0.4)]">
                        <i class="fa-solid fa-bullseye text-white"></i>
                    </div>
                    <h3 class="text-3xl font-black uppercase italic mb-4">Notre Mission</h3>
                    <p class="text-slate-400 text-sm leading-relaxed max-w-md">
                        Propulser la pêche sportive au premier plan en connectant les fans directement avec l'élite des pêcheurs nationaux à travers une technologie de pointe.
                    </p>
                </div>
            </div>

            <div class="ultra-glass p-10 rounded-[50px] border-t-2 border-pink-500/30 flex flex-col items-center justify-center text-center">
                <h4 class="text-5xl font-black italic text-pink-500 mb-2">24/7</h4>
                <p class="text-[10px] font-black uppercase tracking-widest text-white">Accès aux Directs</p>
                <p class="text-slate-500 text-xs mt-4">Ne ratez aucun combat, vivez chaque prise en temps réel avec nos pros.</p>
            </div>

            <div class="ultra-glass p-10 rounded-[50px] flex flex-col justify-between">
                <div class="flex justify-between items-start">
                    <div class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center border border-white/10">
                        <i class="fa-solid fa-heart text-pink-500 text-xs"></i>
                    </div>
                    <span class="text-[8px] font-black uppercase bg-pink-500/10 text-pink-400 px-3 py-1 rounded-full">Exclusif</span>
                </div>
                <div>
                    <h3 class="text-xl font-black uppercase italic mb-2">Supportez vos Pros</h3>
                    <p class="text-slate-500 text-[11px] leading-relaxed">
                        Devenez un supporter officiel et débloquez des badges uniques, des réductions en boutique et des accès VIP.
                    </p>
                </div>
            </div>

            <div class="ultra-glass p-10 rounded-[50px] md:col-span-2 flex items-center gap-10">
                <div class="hidden md:block w-32 h-32 rounded-[35px] overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1529230117714-7641fa81d7f4?q=80&w=400" class="w-full h-full object-cover grayscale opacity-50 hover:opacity-100 hover:grayscale-0 transition-all duration-500">
                </div>
                <div class="flex-1">
                    <h3 class="text-2xl font-black uppercase italic mb-2 tracking-tighter">Historique des Records</h3>
                    <p class="text-slate-400 text-xs leading-relaxed">
                        Consultez la base de données statique de tous les records homologués depuis la création de la ligue FishMasters.
                    </p>
                    <button class="mt-4 text-[10px] font-black uppercase text-pink-500 hover:underline">Voir les archives <i class="fa-solid fa-arrow-right ml-2"></i></button>
                </div>
            </div>

        </div>

        <footer class="mt-32 pt-10 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-6">
            <p class="text-[10px] font-bold text-slate-600 uppercase tracking-widest">© 2026 FishFan Media Group</p>
            <div class="flex gap-8 text-slate-500 text-[10px] font-black uppercase tracking-tighter">
                <a href="#" class="hover:text-pink-500 transition">Règlement</a>
                <a href="#" class="hover:text-pink-500 transition">Confidentialité</a>
                <a href="#" class="hover:text-pink-500 transition">Contact</a>
            </div>
        </footer>

    </main>

</body>
</html>