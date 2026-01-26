<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= strtoupper($pecheur->getNom()) ?> — FISHMASTERS X</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;900&display=swap');
        body { font-family: 'Outfit', sans-serif; background: #02040a; color: #fff; }
        .ultra-glass { background: rgba(255, 255, 255, 0.02); backdrop-filter: blur(20px); border: 1px solid rgba(255, 255, 255, 0.05); }
        .profile-header { background: linear-gradient(to bottom, #00f2ff15 0%, #02040a 100%); }
        .img-gallery { aspect-ratio: 1/1; object-fit: cover; border-radius: 20px; transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); }
        .img-gallery:hover { transform: scale(1.05); filter: brightness(1.2); }
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-thumb { background: #06b6d4; border-radius: 10px; }
    </style>
</head>

<body class="antialiased pb-32">

    <div class="relative h-48 w-full profile-header border-b border-white/5">
        <?php include "header.php"; ?>
        <nav class="max-w-4xl mt-[100px] mx-auto px-6 pt-24 flex justify-between items-center relative z-20">
            <h2 class="font-black italic tracking-tighter text-xl text-white uppercase italic">
                Pro<span class="text-cyan-500">File</span>
            </h2>
            <?php if (isset($modifier) && $modifier): ?>
                <button onclick="toggleModal('update-modal')" class="ultra-glass px-4 py-2 rounded-xl text-[10px] font-black uppercase border border-cyan-500/30 text-cyan-400 hover:bg-cyan-500/10 transition-all">
                    <i class="fa-solid fa-pen-to-square mr-2"></i>Editer Profil
                </button>
            <?php endif; ?>
        </nav>
    </div>

    <main class="max-w-4xl mx-auto px-6 -mt-16 relative z-10">

        <div class="flex flex-col items-center text-center mb-10">
            <div class="relative">
                <img id="main-avatar" src="<?= $pecheur->getPhotoPecheur() ?>" class="w-28 h-28 rounded-[35px] border-4 border-[#02040a] shadow-2xl object-cover bg-slate-900">
                <div class="absolute -bottom-2 -right-2 bg-cyan-500 text-black p-2 rounded-lg text-[10px]"><i class="fa-solid fa-shield-halved"></i></div>
            </div>
            <h1 class="text-3xl font-black uppercase mt-4 italic tracking-tight"><?= $pecheur->getNom() . " " . $pecheur->getPrenom() ?></h1>
            <p class="text-slate-500 text-[10px] font-bold uppercase tracking-[0.3em] mt-1"><?= $pecheur->getRegion() ?> • Master Level</p>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-10">
            <div class="ultra-glass p-6 rounded-[30px] border-b-2 border-cyan-500 group hover:bg-white/5 transition-all">
                <p class="text-[9px] font-black text-slate-500 uppercase tracking-widest mb-1">Score Actuel</p>
                <p class="text-3xl font-black text-cyan-400"> <?= number_format($score->getTotalPoints(), 0, '.', ' ') ?> <span class="text-xs italic text-white/50">pts</span></p>
            </div>
            <div class="ultra-glass p-6 rounded-[30px] border-b-2 border-white/10 group hover:bg-white/5 transition-all">
                <p class="text-[9px] font-black text-slate-500 uppercase tracking-widest mb-1">Rang Mondial</p>
                <p class="text-3xl font-black italic">#<?= ($classement) ? $classement->getRank() : '--' ?></p>
            </div>
        </div>

        <?php if (isset($modifier) && $modifier): ?>
            <button onclick="window.location.href= '<?= PATH_ROOT ?>/prise'" class="w-full bg-cyan-500 text-black py-5 rounded-[25px] font-black uppercase text-xs tracking-[0.2em] shadow-[0_10px_30px_rgba(6,182,212,0.3)] mb-12 hover:scale-[1.01] active:scale-95 transition-all">
                <i class="fa-solid fa-plus-circle mr-3 text-lg"></i>Enregistrer une capture
            </button>
        <?php endif; ?>

        <section>
            <div class="flex justify-between items-center mb-6 border-b border-white/5 pb-4">
                <h3 class="font-black uppercase text-xs tracking-widest">Journal des captures <span class="text-cyan-500 ml-2">(<?= count($prises) ?>)</span></h3>
                <div class="flex gap-2 text-slate-600">
                    <i class="fa-solid fa-list-ul cursor-pointer hover:text-cyan-500"></i>
                    <i class="fa-solid fa-grip-vertical cursor-pointer text-cyan-500"></i>
                </div>
            </div>

            <?php if (empty($prises)): ?>
                <div class="ultra-glass p-12 rounded-[30px] text-center">
                    <i class="fa-solid fa-box-open text-3xl text-slate-700 mb-4"></i>
                    <p class="text-slate-500 text-xs font-bold uppercase italic">Aucune prise enregistrée pour le moment</p>
                </div>
            <?php else: ?>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    <?php foreach ($prises as $prise): ?>
                        <div class="relative group cursor-pointer overflow-hidden rounded-[25px] ultra-glass border border-white/5">
                            <img src="<?= $prise->image_prise ?>" class="img-gallery w-full">
                            <div class="absolute inset-x-3 bottom-3 bg-black/80 backdrop-blur-md px-3 py-3 rounded-xl text-[8px] font-black uppercase border border-white/10 flex justify-between items-center opacity-0 group-hover:opacity-100 transform translate-y-2 group-hover:translate-y-0 transition-all duration-300">
                                <div>
                                    <p class="text-cyan-400"><?= $prise->poids ?> KG</p>
                                    <p class="text-white"><?= $prise->taille ?> CM</p>
                                </div>
                                <i class="fa-solid fa-circle-check text-green-500 text-sm"></i>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </section>
    </main>

    <div id="update-modal" class="fixed inset-0 z-[100] hidden flex items-center justify-center p-6 bg-black/95 backdrop-blur-xl">
        <div class="ultra-glass w-full max-w-md p-8 rounded-[40px] border border-cyan-500/20 shadow-2xl relative">
            <button onclick="toggleModal('update-modal')" class="absolute top-6 right-6 text-slate-500 hover:text-white">
                <i class="fa-solid fa-xmark text-xl"></i>
            </button>
            
            <h3 class="text-xl font-black uppercase italic mb-8 tracking-tighter text-cyan-500">Mettre à jour le profil</h3>

            <form action="<?= PATH_ROOT ?>/profil/update" method="POST" enctype="multipart/form-data" class="space-y-4">
                <div class="relative group mb-6">
                    <label for="image-upload" class="cursor-pointer flex flex-col items-center justify-center w-full h-36 bg-white/5 border-2 border-dashed border-white/10 rounded-3xl hover:border-cyan-500/50 hover:bg-white/10 transition-all">
                        <div id="placeholder-content" class="text-center">
                            <i class="fa-solid fa-camera text-cyan-500 text-2xl mb-2"></i>
                            <p class="text-[10px] font-black uppercase tracking-widest text-slate-400">Changer la photo</p>
                        </div>
                        <div id="image-preview-container" class="hidden absolute inset-0 rounded-2xl overflow-hidden">
                            <img id="image-preview" src="#" class="w-full h-full object-cover">
                        </div>
                        <input id="image-upload" name="photo_pecheur" type="file" class="hidden" accept="image/*" onchange="previewImage(event)" />
                    </label>
                </div>

                <div class="space-y-3">
                    <input type="text" name="nom" value="<?= $pecheur->getNom() ?>" placeholder="Nom" class="w-full bg-white/5 border border-white/10 p-4 rounded-2xl outline-none focus:border-cyan-500 text-sm font-bold transition-all">
                    <input type="text" name="prenom" value="<?= $pecheur->getPrenom() ?>" placeholder="Prénom" class="w-full bg-white/5 border border-white/10 p-4 rounded-2xl outline-none focus:border-cyan-500 text-sm font-bold transition-all">
                    <input type="text" name="region" value="<?= $pecheur->getRegion() ?>" placeholder="Région" class="w-full bg-white/5 border border-white/10 p-4 rounded-2xl outline-none focus:border-cyan-500 text-sm font-bold transition-all">
                </div>

                <div class="pt-6">
                    <button type="submit" class="w-full bg-white text-black py-4 rounded-2xl font-black uppercase text-[11px] tracking-widest hover:bg-cyan-500 transition-all duration-300">
                        Appliquer les modifications
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('image-preview');
                const container = document.getElementById('image-preview-container');
                const placeholder = document.getElementById('placeholder-content');
                output.src = reader.result;
                container.classList.remove('hidden');
                placeholder.classList.add('hidden');
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        function toggleModal(id) {
            const modal = document.getElementById(id);
            modal.classList.toggle('hidden');
            document.body.style.overflow = modal.classList.contains('hidden') ? 'auto' : 'hidden';
        }
    </script>

</body>
</html>