<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MES FAVORIS — FISHFAN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;700;900&display=swap');

        body {
            font-family: 'Outfit', sans-serif;
            background: #02040a;
            color: #fff;
        }

        .ultra-glass {
            background: rgba(255, 255, 255, 0.01);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .rose-glow-card:hover {
            border-color: rgba(244, 63, 94, 0.4);
            box-shadow: 0 0 30px rgba(244, 63, 94, 0.1);
            transform: translateY(-5px);
        }

        .text-rose-glow {
            color: #f43f5e;
            text-shadow: 0 0 15px rgba(244, 63, 94, 0.5);
        }
    </style>
</head>

<body class="antialiased pb-24">
    <?php include "header.php"; ?>

    <main class="max-w-6xl mx-auto px-6 pt-40 space-y-12">

        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
            <div class="relative">
                <span class="text-rose-500 font-black text-[10px] uppercase tracking-[0.5em] mb-2 block">Communauté VIP</span>
                <h1 class="text-5xl font-black uppercase italic leading-none">Mes <span class="text-rose-glow">Favoris.</span></h1>
            </div>
            <div class="ultra-glass px-6 py-3 rounded-2xl border-l-4 border-rose-500">
                <p class="text-[9px] text-slate-500 font-black uppercase tracking-widest">Abonnements actifs</p>
                <p class="text-xl font-black text-white"><?= count($subscriptions) ?> <span class="text-xs text-slate-600">PROS</span></p>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            <?php if (empty($pecheurs)): ?>
                <div class="col-span-full py-32 text-center ultra-glass rounded-[50px] border-dashed border-2 border-white/5">
                    <div class="w-20 h-20 bg-rose-500/10 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fa-solid fa-anchor text-3xl text-rose-500"></i>
                    </div>
                    <h3 class="text-xl font-bold uppercase italic">Votre port est vide</h3>
                    <p class="text-slate-500 text-xs mt-2 uppercase tracking-widest">Vous ne suivez aucun pêcheur pour le moment.</p>
                    <a href="<?= PATH_ROOT ?>/pecheur" class="mt-8 inline-block bg-white text-black px-8 py-3 rounded-full font-black text-[10px] uppercase hover:scale-105 transition-transform">Explorer les pros</a>
                </div>
            <?php else: ?>

                <?php foreach ($pecheurs as $pecheur) : ?>
                    <div class="ultra-glass rose-glow-card rounded-[40px] p-6 transition-all duration-500 group relative overflow-hidden">

                        <div class="flex justify-between items-start mb-6">
                            <div class="relative">
                                <img src="<?= $pecheur->getPhotoPecheur(); ?>" class="w-20 h-20 rounded-[25px] object-cover border-2 border-white/5 group-hover:border-rose-500/50 transition-all duration-500">
                                <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-[#02040a] rounded-full flex items-center justify-center">
                                    <div class="w-3 h-3 bg-rose-500 rounded-full animate-pulse"></div>
                                </div>
                            </div>
                            <div class="text-rose-500/20 group-hover:text-rose-500 transition-colors">
                                <i class="fa-solid fa-heart text-2xl"></i>
                            </div>
                        </div>

                        <div class="mb-8">
                            <h3 class="text-lg font-black uppercase italic tracking-tighter line-clamp-1 italic"><?= $pecheur->getNom() . " " . $pecheur->getPrenom(); ?></h3>
                            <div class="flex items-center gap-2 mt-1">
                                <span class="text-[9px] bg-rose-500/10 text-rose-500 px-2 py-0.5 rounded-md font-black uppercase">PRO</span>
                                <p class="text-[9px] text-slate-500 font-bold uppercase italic">
                                    <i class="fa-solid fa-location-dot mr-1"></i> <?= $pecheur->getRegion(); ?>
                                </p>
                            </div>
                        </div>

                        <div class="space-y-3">
                            <a href="<?= PATH_ROOT ?>/pecheur/show/<?= $pecheur->getIdUser(); ?>" class="block w-full text-center py-3 rounded-2xl bg-white/5 text-white text-[9px] font-black uppercase hover:bg-white/10 transition-all tracking-widest">
                                Voir le Profil
                            </a>
                            <form action="<?= PATH_ROOT ?>/pecheur/unsubscribe" method="post" onsubmit="return confirm('Voulez-vous vraiment vous désabonner ?')">
                                <input type="hidden" name="id_pecheur" value="<?= $pecheur->getIdUser(); ?>">
                                <button type="submit" class="w-full py-3 rounded-2xl border border-rose-500/20 text-rose-500 text-[9px] font-black uppercase hover:bg-rose-500 hover:text-white transition-all tracking-widest">
                                    Désabonner
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