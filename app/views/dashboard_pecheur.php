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

        .stat-card {
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }

        .stat-card:hover {
            border-left-color: #06b6d4;
            background: rgba(255, 255, 255, 0.05);
            transform: translateY(-5px);
        }

        .prise-card img {
            transition: transform 0.5s ease;
        }

        .prise-card:hover img {
            transform: scale(1.1);
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: #02040a; }
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
            <div class="flex gap-3">
                <button onclick="toggleModal('update-modal')" class="ultra-glass px-6 py-4 rounded-2xl font-black uppercase text-[10px] tracking-widest border border-white/10 hover:border-cyan-500/50 transition-all">
                    <i class="fa-solid fa-user-gear mr-2"></i> Profil Info
                </button>
                <button onclick="window.location.href='<?= PATH_ROOT ?>/prise'" class="bg-cyan-500 text-black px-6 py-4 rounded-2xl font-black uppercase text-[10px] tracking-widest shadow-[0_10px_30px_rgba(6,182,212,0.4)] hover:scale-105 transition-transform">
                    Déclarer une Prise <i class="fa-solid fa-fish-fins ml-2"></i>
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="ultra-glass p-8 rounded-[40px] stat-card md:col-span-2 flex items-center justify-between">
                <div>
                    <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Classement Mondial</p>
                    <h2 class="text-6xl font-black italic text-cyan-500">
                        <?= $classement ? $classement->getRank() : '+99' ?>
                    </h2>
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
                <p class="text-[9px] text-slate-500 mt-3 font-bold uppercase tracking-tighter">75% vers palier suivant</p>
            </div>

            <div class="ultra-glass p-8 rounded-[40px] stat-card text-center">
                <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-2">Prises Validées</p>
                <h2 class="text-5xl font-black italic text-white"><?= count($prises) ?></h2>
                <p class="text-[9px] text-cyan-500 mt-4 font-black uppercase tracking-[0.2em] italic">Status: Elite</p>
            </div>
        </div>

        <section class="space-y-6">
            <div class="flex justify-between items-end border-b border-white/5 pb-4">
                <h3 class="text-sm font-black uppercase tracking-[0.4em] text-slate-400">Ma Galerie Photos</h3>
                <span class="text-[10px] font-black text-cyan-500 uppercase"><?= count($prises) ?> Éléments</span>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-5">
                <?php if(empty($prises)): ?>
                    <p class="col-span-full text-center text-slate-600 italic py-10">Aucune prise enregistrée pour le moment.</p>
                <?php else: ?>
                    <?php foreach($prises as $p): ?>
                        <div class="prise-card relative aspect-[3/4] rounded-[30px] overflow-hidden ultra-glass border border-white/5 group cursor-pointer">
                            <img src="<?= $p->getImageUrl() ?>" class="w-full h-full object-cover opacity-80 group-hover:opacity-100">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-transparent to-transparent p-5 flex flex-col justify-end">
                                <span class="text-[8px] font-black text-cyan-400 uppercase tracking-widest mb-1"><?= $p->getDate() ?></span>
                                <h4 class="text-xs font-black uppercase italic"><?= $p->getEspece() ?></h4>
                                <div class="flex justify-between items-center mt-2">
                                    <span class="text-[10px] font-bold"><?= $p->getPoids() ?> kg</span>
                                    <i class="fa-solid fa-circle-check text-green-500 text-[10px]"></i>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>

    </main>

    <div id="update-modal" class="fixed inset-0 z-[150] hidden flex items-center justify-center p-6 bg-[#02040a]/95 backdrop-blur-2xl transition-all">
        <div class="ultra-glass w-full max-w-lg p-10 rounded-[50px] border border-cyan-500/20 shadow-2xl relative">
            <button onclick="toggleModal('update-modal')" class="absolute top-6 right-8 text-slate-500 hover:text-white transition-colors">
                <i class="fa-solid fa-xmark text-2xl"></i>
            </button>

            <h3 class="text-2xl font-black uppercase italic mb-8 tracking-tighter text-cyan-400">Modifier mon profil</h3>
            
            <form action="process_update.php" method="POST" enctype="multipart/form-data" class="space-y-5">
                
                <div class="relative group mb-8">
                    <label for="img-upload" class="cursor-pointer flex flex-col items-center justify-center w-full h-40 bg-white/5 border-2 border-dashed border-white/10 rounded-[35px] hover:border-cyan-500/50 hover:bg-white/10 transition-all group">
                        <div id="upload-placeholder" class="flex flex-col items-center transition-all">
                            <div class="w-12 h-12 bg-cyan-500/20 rounded-2xl flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                                <i class="fa-solid fa-camera-retro text-cyan-500"></i>
                            </div>
                            <span class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400">Nouvelle Photo de Profil</span>
                        </div>
                        <img id="img-preview" src="#" class="hidden absolute inset-0 w-full h-full object-cover rounded-[35px]">
                        <input id="img-upload" name="avatar" type="file" class="hidden" accept="image/*" onchange="handlePreview(this)" />
                    </label>
                </div>

                <div class="space-y-4">
                    <div class="relative">
                        <i class="fa-solid fa-signature absolute left-5 top-1/2 -translate-y-1/2 text-cyan-500 text-xs"></i>
                        <input type="text" name="nom" placeholder="Nom Complet" value="<?= $pecheur->getNom(); ?>" class="w-full bg-white/5 border border-white/10 p-5 pl-12 rounded-2xl outline-none focus:border-cyan-500 transition-all text-sm font-medium">
                    </div>
                    
                    <div class="relative">
                        <i class="fa-solid fa-location-dot absolute left-5 top-1/2 -translate-y-1/2 text-cyan-500 text-xs"></i>
                        <input type="text" name="ville" placeholder="Votre Ville" class="w-full bg-white/5 border border-white/10 p-5 pl-12 rounded-2xl outline-none focus:border-cyan-500 transition-all text-sm font-medium">
                    </div>
                </div>
                
                <div class="grid grid-cols-2 gap-4 pt-6">
                    <button type="button" onclick="toggleModal('update-modal')" class="p-5 text-slate-500 font-black text-[10px] uppercase tracking-widest hover:text-white">Annuler</button>
                    <button type="submit" class="bg-white text-black p-5 rounded-2xl font-black uppercase text-[10px] tracking-[0.2em] shadow-xl hover:bg-cyan-500 transition-colors">
                        Mettre à jour
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleModal(id) {
            const modal = document.getElementById(id);
            modal.classList.toggle('hidden');
        }

        function handlePreview(input) {
            const preview = document.getElementById('img-preview');
            const placeholder = document.getElementById('upload-placeholder');
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    placeholder.classList.add('opacity-0');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

</body>
</html>