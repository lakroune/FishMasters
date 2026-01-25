<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACTUALITÉS — FISHMASTERS</title>
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
    </style>
</head>

<body class="pb-24">

    <?php include "header.php"; ?>

    <main class="max-w-6xl mx-auto px-6 pt-32 space-y-12">

        <div class="flex flex-col md:flex-row justify-between items-end gap-6">
            <div>
                <span class="text-cyan-500 text-[10px] font-black uppercase tracking-[0.5em]">Fan Dashboard</span>
                <h1 class="text-4xl font-black uppercase italic tracking-tighter mt-2">Flux d'actualités ⚡</h1>
            </div>
        </div>

        <section class="space-y-6">
            <div class="flex justify-between items-center border-b border-white/5 pb-4">
                <h3 class="text-xs font-black uppercase tracking-widest"><i class="fa-solid fa-bolt-lightning text-yellow-400 mr-2"></i> Dernières Prises</h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <?php foreach ($array_prises as $p): ?>
                    <div class="ultra-glass rounded-[35px] overflow-hidden group border border-white/5">
                        <div class="relative h-64 overflow-hidden">
                            <img src="<?= $p["prise"]->image_prise ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <h4 class="text-lg font-black uppercase italic"><?= "" //$p->espece 
                                                                                    ?></h4>
                                    <p class="text-[10px] text-slate-500 font-bold uppercase tracking-tight">Pêché par  <a href="<?= PATH_ROOT ?>/pecheur/show/<?= $p["pecheur"]->getIdUser() ?>"><span class="text-cyan-500"><?= $p["pecheur"]->getNom() 
                                                                                                                                                    ?></span></a></p>
                                </div>
                                <span class="text-white font-black italic"><?= $p["prise"]->poids ?> KG</span>
                            </div>
                            <div class="flex gap-2">
                                <button class="flex-grow bg-white/5 hover:bg-rose-500/20 py-3 rounded-xl transition-all group/btn">
                                    <i class="fa-solid fa-heart group-hover/btn:text-rose-500 transition-colors"></i>
                                </button>
                                <button class="flex-grow bg-white/5 hover:bg-cyan-500/20 py-3 rounded-xl transition-all">
                                    <i class="fa-solid fa-share-nodes"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 ultra-glass p-8 rounded-[40px] space-y-6">
                <h3 class="text-sm font-black uppercase tracking-widest text-cyan-500 italic">Classement en direct</h3>
                <div class="space-y-4">
                    <?php foreach ($top_pecheurs as $index => $rank): ?>
                        <div class="flex items-center justify-between p-4 rounded-2xl bg-white/5 hover:bg-white/10 transition-all border border-transparent hover:border-cyan-500/30">
                            <div class="flex items-center gap-4">
                                <span class="text-xl font-black italic text-slate-700"><?= sprintf("%02d", $index + 1) ?></span>
                                <img src="<?= $rank['pecheur']->getPhotoPecheur() ?>" class="w-10 h-10 rounded-full object-cover border border-white/10">
                                <div>
                                    <p class="text-xs font-black uppercase"><?= $rank['pecheur']->getNom() ?></p>
                                    <p class="text-[8px] text-slate-500 font-bold uppercase tracking-widest"><?= $rank['pecheur']->getRegion() ?></p>
                                </div>
                            </div>
                            <p class="text-sm font-black <?= ($index == 0) ? 'text-cyan-400' : 'text-white' ?> italic"><?= $rank["score"]->getTotalPoints() 
                                                                                                                        ?> PTS</p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="space-y-4">
                <div class="ultra-glass p-8 rounded-[40px] text-center border-b-4 border-cyan-500">
                    <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Communauté</p>
                    <h2 class="text-4xl font-black italic"><?= count($top_pecheurs) * 123 ?></h2>
                    <p class="text-[8px] text-cyan-500 font-bold uppercase mt-2">Membres en ligne</p>
                </div>
            </div>
        </section>
    </main>



</body>

</html>