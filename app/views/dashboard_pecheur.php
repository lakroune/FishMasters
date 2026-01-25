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
        .stat-card:hover { border-left-color: #06b6d4; background: rgba(255, 255, 255, 0.05); transform: translateY(-5px); }
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-thumb { background: #06b6d4; border-radius: 10px; }
    </style>
</head>

<body class="antialiased pb-24">
    <?php include "header.php"; ?>

    <main class="max-w-6xl mx-auto px-6 pt-32 space-y-12">

        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
            <div>
                <h1 class="text-4xl font-black uppercase italic tracking-tighter">Salut, <?= $pecheur->getNom(); ?> ! ⚡</h1>
                <p class="text-slate-500 text-xs font-bold uppercase tracking-[0.3em] mt-1">Tableau de bord personnel • Saison 2026</p>
            </div>
            <button onclick="window.location.href='<?= PATH_ROOT ?>/prise'" class="bg-cyan-500 text-black px-6 py-4 rounded-2xl font-black uppercase text-[10px] tracking-widest shadow-[0_10px_30px_rgba(6,182,212,0.4)] hover:scale-105 transition-transform">
                Déclarer une Prise <i class="fa-solid fa-fish-fins ml-2"></i>
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="ultra-glass p-8 rounded-[40px] stat-card md:col-span-2 flex items-center justify-between">
                <div>
                    <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Classement Mondial</p>
                    <h2 class="text-6xl font-black italic text-cyan-500"><?= $classement ? $classement->getRank() : '+99' ?></h2>
                    <p class="text-[10px] font-bold text-green-500 mt-3 uppercase italic"><i class="fa-solid fa-arrow-trend-up mr-1"></i> Progression constante</p>
                </div>
                <div class="w-24 h-24 bg-cyan-500/10 rounded-3xl rotate-12 flex items-center justify-center border border-cyan-500/20">
                    <i class="fa-solid fa-ranking-star text-4xl text-cyan-500 -rotate-12"></i>
                </div>
            </div>

            <div class="ultra-glass p-8 rounded-[40px] stat-card">
                <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Points Total</p>
                <h2 class="text-4xl font-black italic"><?= number_format($score->getTotalPoints(), 0, '.', ' '); ?></h2>
                <div class="mt-6 w-full bg-white/5 h-2 rounded-full overflow-hidden">
                    <div class="bg-cyan-500 h-full w-[75%] shadow-[0_0_15px_#06b6d4]"></div>
                </div>
                <p class="text-[9px] text-slate-500 mt-3 font-bold uppercase tracking-tighter">Performance Saisonnière</p>
            </div>

            <div class="ultra-glass p-8 rounded-[40px] stat-card text-center">
                <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Prises Validées</p>
                <h2 class="text-5xl font-black italic text-white"><?= count($prises) ?></h2>
                <p class="text-[9px] text-cyan-500 mt-4 font-black uppercase tracking-[0.2em] italic">Status: Elite</p>
            </div>
        </div>

        <section class="space-y-6">
            <div class="flex justify-between items-end border-b border-white/5 pb-4">
                <h3 class="text-sm font-black uppercase tracking-[0.4em] text-slate-400">Détail des points par capture</h3>
                <span class="text-[10px] font-black text-cyan-500 uppercase italic">Historique complet</span>
            </div>

            <div class="ultra-glass rounded-[35px] overflow-hidden">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-white/5 text-[9px] uppercase tracking-widest text-slate-500">
                            <th class="p-6">Date de Capture</th>
                            <th class="p-6">Spécifications (kg/cm)</th>
                            <th class="p-6 text-right">Points Gagnés</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        <?php if (empty($prises)): ?>
                            <tr><td colspan="3" class="p-10 text-center text-slate-600 italic">Aucun point enregistré.</td></tr>
                        <?php else: ?>
                            <?php foreach ($prises as $p): ?>
                                <tr class="hover:bg-white/5 transition-colors">
                                    <td class="p-6">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-lg bg-cyan-500/10 flex items-center justify-center text-cyan-500 text-xs">
                                                <i class="fa-solid fa-calendar-day"></i>
                                            </div>
                                            <span class="text-xs font-bold uppercase"><?= $p->date_capture ?></span>
                                        </div>
                                    </td>
                                    <td class="p-6 font-mono text-[10px] text-slate-400">
                                        <span class="text-white"><?= $p->poids ?> KG</span> / <?= $p->taille ?> CM
                                    </td>
                                    <td class="p-6 text-right">
                                        <span class="px-3 py-1 rounded-md bg-green-500/10 text-green-500 font-black text-xs">
                                            + <?= isset($p->points_obtenus) ? $p->points_obtenus : '150' ?> PTS
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>

        <section class="space-y-6">
            <div class="flex justify-between items-end border-b border-white/5 pb-4">
                <h3 class="text-sm font-black uppercase tracking-[0.4em] text-slate-400">Ma Galerie Photos</h3>
                <span class="text-[10px] font-black text-cyan-500 uppercase"><?= count($prises) ?> Éléments</span>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-5">
                <?php foreach ($prises as $p): ?>
                    <div class="prise-card relative aspect-[3/4] rounded-[30px] overflow-hidden ultra-glass border border-white/5 group">
                        <img src="<?= $p->image_prise ?>" class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-all">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-transparent p-5 flex flex-col justify-end">
                            <h4 class="text-xs font-black uppercase italic"><?= $p->taille ?> CM</h4>
                            <div class="flex justify-between items-center mt-2">
                                <span class="text-[10px] font-bold"><?= $p->poids ?> KG</span>
                                <i class="fa-solid fa-circle-check text-green-500 text-[10px]"></i>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>
</body>
</html>