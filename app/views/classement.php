<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLASSEMENTS — FISHMASTERS X</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@100;400;900&display=swap');
        body { font-family: 'Outfit', sans-serif; background-color: #02040a; color: #fff; }
        .ultra-glass { background: rgba(255, 255, 255, 0.02); backdrop-filter: blur(20px); border: 1px solid rgba(255, 255, 255, 0.05); }
        .btn-active { background-color: #06b6d4 !important; color: #000 !important; box-shadow: 0 0 20px rgba(6, 182, 212, 0.5); transform: scale(1.05); }
        .rank-gold { background: linear-gradient(135deg, #ffd700 0%, #b8860b 100%); }
        .rank-silver { background: linear-gradient(135deg, #e0e0e0 0%, #757575 100%); }
        .rank-bronze { background: linear-gradient(135deg, #cd7f32 0%, #8b4513 100%); }
    </style>
</head>

<body class="antialiased selection:bg-cyan-500 selection:text-black pb-20">
    <?php require_once 'header.php'; ?>

    <main class="max-w-[1400px] mx-auto px-6 pt-32">
        <div class="mb-12">
            <h1 class="text-6xl font-black uppercase mb-4 leading-none">Tableau des <br><span class="text-cyan-500 italic">Leaders 2026.</span></h1>
            <p class="text-slate-500 text-sm font-bold uppercase tracking-widest">Le classement officiel des maîtres de la pêche.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-16">
            <div id="group-water" class="ultra-glass p-2 rounded-2xl flex gap-1">
                <button onclick="applyFilter('all')" class="filter-btn flex-1 py-3 text-[10px] font-black uppercase rounded-xl <?= !isset($_POST['exper']) || $_POST['exper']=='all' ? 'btn-active' : 'text-slate-500 hover:bg-white/5' ?>">Tous</button>
                <button onclick="applyFilter('mer')" class="filter-btn flex-1 py-3 text-[10px] font-black uppercase rounded-xl <?= @$_POST['exper']=='mer' ? 'btn-active' : 'text-slate-500 hover:bg-white/5' ?>">Mer</button>
                <button onclick="applyFilter('eaudouce')" class="filter-btn flex-1 py-3 text-[10px] font-black uppercase rounded-xl <?= @$_POST['exper']=='eaudouce' ? 'btn-active' : 'text-slate-500 hover:bg-white/5' ?>">Eau Douce</button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-20 items-end">
            <?php if (isset($array_classements[1])): ?>
            <div class="ultra-glass p-8 rounded-[40px] text-center relative order-2 md:order-1 h-[320px] flex flex-col justify-center border-t-4 border-slate-400/30">
                <div class="absolute -top-6 left-1/2 -translate-x-1/2 w-12 h-12 rank-silver rounded-full flex items-center justify-center font-black text-black">2</div>
                <img src="<?= $array_classements[1]['pecheur']->getPhotoPecheur() ?>" class="w-20 h-20 rounded-2xl mx-auto mb-4 border-2 border-slate-400 p-1 object-cover">
                <h3 class="text-xl font-bold italic"><?= $array_classements[1]['pecheur']->getNom() ?></h3>
                <p class="text-cyan-400 font-black text-2xl"><?= $array_classements[1]['score']->getTotalPoints() ?> <span class="text-[10px] text-white">PTS</span></p>
            </div>
            <?php endif; ?>

            <?php if (isset($array_classements[0])): ?>
            <div class="ultra-glass p-10 rounded-[50px] text-center relative order-1 md:order-2 h-[420px] flex flex-col justify-center border-t-4 border-yellow-500 bg-gradient-to-b from-yellow-500/10 to-transparent">
                <div class="absolute -top-10 left-1/2 -translate-x-1/2 w-20 h-20 rank-gold rounded-full flex items-center justify-center font-black text-black text-2xl shadow-[0_0_40px_rgba(255,215,0,0.3)]">1</div>
                <img src="<?= $array_classements[0]['pecheur']->getPhotoPecheur() ?>" class="w-32 h-32 rounded-[35px] mx-auto mb-6 border-4 border-yellow-500 p-1 object-cover">
                <h3 class="text-3xl font-black uppercase italic"><?= $array_classements[0]['pecheur']->getNom() ?></h3>
                <p class="text-cyan-400 font-black text-4xl mt-2"><?= $array_classements[0]['score']->getTotalPoints() ?> <span class="text-xs text-white">PTS</span></p>
            </div>
            <?php endif; ?>

            <?php if (isset($array_classements[2])): ?>
            <div class="ultra-glass p-8 rounded-[40px] text-center relative order-3 md:order-3 h-[280px] flex flex-col justify-center border-t-4 border-orange-700/50">
                <div class="absolute -top-6 left-1/2 -translate-x-1/2 w-12 h-12 rank-bronze rounded-full flex items-center justify-center font-black text-black">3</div>
                <img src="<?= $array_classements[2]['pecheur']->getPhotoPecheur() ?>" class="w-16 h-16 rounded-xl mx-auto mb-4 border-2 border-orange-700 p-1 object-cover">
                <h3 class="text-lg font-bold italic"><?= $array_classements[2]['pecheur']->getNom() ?></h3>
                <p class="text-cyan-400 font-black text-xl"><?= $array_classements[2]['score']->getTotalPoints() ?> <span class="text-[10px] text-white">PTS</span></p>
            </div>
            <?php endif; ?>
        </div>

        <div class="ultra-glass rounded-[40px] overflow-hidden">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-white/5 text-[10px] uppercase tracking-widest text-slate-500">
                        <th class="p-8">Rang</th>
                        <th class="p-8">Pêcheur Elite</th>
                        <th class="p-8">Points Total</th>
                        <th class="p-8 text-right">Statut</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    <?php foreach ($array_classements as $row): ?>
                    <tr class="hover:bg-white/5 transition-all group">
                        <td class="p-8 font-black text-slate-700 text-2xl italic"><?= sprintf("%02d", $row['info']->getRank()) ?></td>
                        <td class="p-8">
                            <div class="flex items-center gap-4">
                                <img src="<?= $row['pecheur']->getPhotoPecheur() ?>" class="w-12 h-12 rounded-full object-cover grayscale group-hover:grayscale-0 transition-all">
                                <div>
                                    <p class="font-black uppercase italic text-sm"><?= $row['pecheur']->getPrenom() . ' ' . $row['pecheur']->getNom() ?></p>
                                    <p class="text-[9px] text-slate-500 font-bold tracking-tighter uppercase"><?= $row['pecheur']->getRegion() ?></p>
                                </div>
                            </div>
                        </td>
                        <td class="p-8 font-mono text-cyan-400 font-black text-xl"><?= number_format($row['score']->getTotalPoints()) ?></td>
                        <td class="p-8 text-right">
                            <span class="px-4 py-2 rounded-full bg-cyan-500/10 text-cyan-500 text-[9px] font-black uppercase">
                                <?= $row['info']->getTypeClassement() ?>
                            </span>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>

    <form id="filterForm" action="<?= PATH_ROOT ?>/classement/filter" method="post" style="display:none;">
        <input type="hidden" name="exper" id="filterValue">
    </form>

    <script>
        function applyFilter(val) {
            document.getElementById('filterValue').value = val;
            document.getElementById('filterForm').submit();
        }
    </script>
</body>
</html>