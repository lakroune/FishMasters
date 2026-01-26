<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MES LIKES — FISHFAN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;900&display=swap');

        body {
            font-family: 'Outfit', sans-serif;
            background: #02040a;
            color: #fff;
        }

        .ultra-glass {
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .pink-gradient {
            background: linear-gradient(to bottom, #f43f5e15 0%, #02040a 100%);
        }

        .img-zoom {
            transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .group:hover .img-zoom {
            transform: scale(1.1);
        }
    </style>
</head>

<body class="antialiased pb-20">
    <?php include "header.php"; ?>

    <div class="relative h-64 w-full pink-gradient border-b border-white/5 flex items-end">
        <div class="max-w-6xl mx-auto w-full px-6 pb-12">
            <h1 class="text-5xl font-black uppercase italic tracking-tighter">Mes <span class="text-pink-500">Likes.</span></h1>
            <p class="text-slate-500 text-xs font-bold uppercase tracking-[0.4em] mt-2">Vos captures favorites en un seul endroit</p>
        </div>
    </div>

    <main class="max-w-6xl mx-auto px-6 mt-12">
        <?php if (empty($prisesAimees)): ?>
            <div class="ultra-glass rounded-[40px] p-20 text-center border-dashed border-2 border-white/10">
                <div class="w-20 h-20 bg-pink-500/10 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fa-solid fa-heart-crack text-3xl text-pink-500"></i>
                </div>
                <h2 class="text-xl font-black uppercase italic">Aucun coup de cœur ?</h2>
                <p class="text-slate-500 text-sm mt-2 mb-8">Explorez le fil d'actualité pour soutenir nos pêcheurs.</p>
                <a href="<?= PATH_ROOT ?>/" class="bg-white text-black px-8 py-4 rounded-full font-black uppercase text-[10px] tracking-widest hover:bg-pink-500 hover:text-white transition-all">
                    Découvrir les prises
                </a>
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($prisesAimees as $prise): ?>
                    <div class="group relative ultra-glass rounded-[35px] overflow-hidden border border-white/5 hover:border-pink-500/30 transition-all duration-500">
                        <div class="relative h-72 overflow-hidden">
                            <img src="<?= $prise->image_prise ?>" class="img-zoom w-full h-full object-cover" alt="Prise">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#02040a] via-transparent to-transparent opacity-80"></div>

                            <div class="absolute top-4 left-4">
                                <span class="bg-black/60 backdrop-blur-md text-[8px] font-black uppercase px-3 py-1.5 rounded-lg border border-white/10 tracking-widest">
                                    🏆 <?= $prise->nom_competition ?>
                                </span>
                            </div>

                            <form action="<?= PATH_ROOT ?>/like/toggle" method="POST" class="absolute top-4 right-4">
                                <input type="hidden" name="id_prise" value="<?= $prise->id_prise ?>">
                                <input type="hidden" name="id_competition" value="<?= $prise->id_competition ?>">
                                <button type="submit" class="w-10 h-10 bg-pink-500 text-white rounded-full flex items-center justify-center shadow-lg hover:scale-110 active:scale-90 transition-all">
                                    <i class="fa-solid fa-heart"></i>
                                </button>
                            </form>
                        </div>

                        <div class="p-6">
                            <div class="flex justify-between items-center mb-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-2 h-2 rounded-full bg-pink-500 animate-pulse"></div>
                                    <span class="text-[10px] font-black uppercase tracking-widest text-slate-400">Capture Validée</span>
                                </div>
                                <span class="text-[10px] font-bold text-slate-500"><?= $prise->date_prise ?></span>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div class="bg-white/5 rounded-2xl p-3 border border-white/5">
                                    <p class="text-[8px] font-black text-slate-500 uppercase tracking-widest mb-1">Poids</p>
                                    <p class="text-sm font-black italic text-cyan-400"><?= $prise->poids ?> <span class="text-[10px] text-white/50">KG</span></p>
                                </div>
                                <div class="bg-white/5 rounded-2xl p-3 border border-white/5">
                                    <p class="text-[8px] font-black text-slate-500 uppercase tracking-widest mb-1">Taille</p>
                                    <p class="text-sm font-black italic text-pink-400"><?= $prise->taille ?> <span class="text-[10px] text-white/50">CM</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </main>

    <div class="max-w-6xl mx-auto px-6 mt-20 text-center">
        <p class="text-[10px] font-black uppercase tracking-[0.5em] text-slate-700 italic">FishMasters X Fan Experience — 2026</p>
    </div>
</body>

</html>