<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MES FAVORIS — FISHFAN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;900&display=swap');

        body {
            font-family: 'Outfit', sans-serif;
            background: #02040a;
            color: #fff;
        }

        .ultra-glass {
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        /* Couleur Rose pour les Fans */
        .text-rose-glow {
            color: #f43f5e;
            text-shadow: 0 0 10px rgba(244, 63, 94, 0.4);
        }

        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>

<body class="antialiased pb-24">
    <?php include "header.php"; ?>

    <main class="max-w-6xl mx-auto px-6 space-y-8 pt-40">

        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div>
                <span class="text-rose-500 font-black text-[9px] uppercase tracking-[0.4em]">Ma Communauté</span>
                <h1 class="text-4xl font-black uppercase italic leading-none mt-2">Mes <br> <span class="text-slate-500 text-rose-glow">Favoris.</span></h1>
            </div>
            <p class="text-slate-500 text-[10px] font-bold uppercase tracking-widest bg-white/5 px-4 py-2 rounded-full border border-white/5">
                <?= count($subscriptions) ?> Pêcheurs suivis
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">

            <?php if (empty($subscriptions)): ?>
                <div class="col-span-full py-20 text-center ultra-glass rounded-[40px]">
                    <i class="fa-solid fa-fish-fins text-slate-800 text-5xl mb-4"></i>
                    <p class="text-slate-500 font-bold uppercase text-xs tracking-widest">Vous ne suivez aucun pêcheur pour le moment.</p>
                    <a href="<?= PATH_ROOT ?>/explore" class="mt-4 inline-block text-rose-500 font-black text-[10px] uppercase underline">Découvrir les pros</a>
                </div>
            <?php else: ?>
                
                <?php foreach ($subscriptions as $pecheur) : ?>
                    <div class="ultra-glass rounded-[30px] p-4 flex flex-col justify-between border border-white/5 hover:border-rose-500/30 transition-all duration-300 group">
                        
                        <div class="flex justify-between items-start mb-4">
                            <div class="relative">
                                <img src="<?= $pecheur->getPhotoPecheur(); ?>" class="w-16 h-16 rounded-2xl object-cover border-2 border-white/10 group-hover:border-rose-500 transition-colors">
                                <div class="absolute -top-1 -right-1 w-3 h-3 bg-green-500 rounded-full border-2 border-[#02040a] shadow-[0_0_10px_rgba(34,197,94,0.5)]"></div>
                            </div>
                            <div class="w-8 h-8 rounded-xl bg-rose-500/10 flex items-center justify-center text-rose-500">
                                <i class="fa-solid fa-heart text-[10px]"></i>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h3 class="text-[13px] font-black uppercase tracking-tight truncate"><?= $pecheur->getNom() . " " . $pecheur->getPrenom(); ?></h3>
                            <p class="text-[9px] text-slate-500 font-bold uppercase italic"><i class="fa-solid fa-location-dot text-rose-500 mr-1"></i> <?= $pecheur->getRegion(); ?></p>
                        </div>

                        <div class="flex flex-col gap-2">
                            <a href="<?= PATH_ROOT ?>/pecheur/profile/<?= $pecheur->getIdUser(); ?>" class="w-full bg-white/5 text-white text-[8px] font-black uppercase py-2 rounded-lg text-center hover:bg-white/10 transition-all mb-1">
                                Voir le Profil
                            </a>
                            
                            <form action="<?= PATH_ROOT ?>/pecheur/unsubscribe" method="post">
                                <input type="hidden" name="id_pecheur" value="<?= $pecheur->getIdUser(); ?>">
                                <button type="submit" class="w-full bg-rose-500/10 text-rose-500 border border-rose-500/20 text-[9px] font-black uppercase py-3 rounded-xl hover:bg-rose-500 hover:text-white transition-all tracking-widest">
                                    Se désabonner
                                </button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>

            <?php endif; ?>

        </div>
    </main>

</body>
</html>