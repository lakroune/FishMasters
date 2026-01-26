<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MON PROFIL — FISHMASTERS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;900&display=swap');
        body { font-family: 'Outfit', sans-serif; background: #02040a; color: #fff; }
        .ultra-glass { background: rgba(255, 255, 255, 0.02); backdrop-filter: blur(20px); border: 1px solid rgba(255, 255, 255, 0.05); }
        input:focus { border-color: #f43f5e !important; box-shadow: 0 0 15px rgba(244, 63, 94, 0.2); }
    </style>
</head>

<body class="antialiased pb-32">
    <?php include "header.php"; ?>

    <div class="relative h-64 w-full bg-gradient-to-b from-pink-500/10 to-transparent border-b border-white/5"></div>

    <main class="max-w-4xl mx-auto px-6 -mt-32 relative z-10">
        <div class="flex flex-col items-center text-center mb-12">
            <div class="relative group cursor-pointer" onclick="toggleModal('update-modal')">
                <div class="w-32 h-32 rounded-[40px] p-1 bg-gradient-to-tr from-pink-500 to-rose-400 shadow-[0_0_40px_rgba(244,63,94,0.3)]">
                    <img src="https://ui-avatars.com/api/?name=<?= $_SESSION['User']->getNom() ?>+<?= $_SESSION['User']->getPrenom() ?>&background=0f172a&color=f43f5e&size=128" 
                         class="w-full h-full rounded-[38px] object-cover bg-[#0a0a0a]">
                </div>
                <div class="absolute inset-0 flex items-center justify-center bg-black/40 rounded-[40px] opacity-0 group-hover:opacity-100 transition-opacity">
                    <i class="fa-solid fa-pen text-white"></i>
                </div>
            </div>
            
            <h1 class="text-4xl font-black uppercase mt-6 italic tracking-tight">
                <?= $_SESSION['User']->getPrenom() ?> <span class="text-pink-500"><?= $_SESSION['User']->getNom() ?></span>
            </h1>
            <div class="flex gap-4 mt-4">
                <button onclick="toggleModal('update-modal')" class="bg-white/5 hover:bg-pink-500/20 border border-white/10 px-6 py-2 rounded-full text-[10px] font-black uppercase tracking-widest transition-all">
                    <i class="fa-solid fa-user-gear mr-2 text-pink-500"></i> Modifier mes infos
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="ultra-glass p-8 rounded-[40px] border-l-4 border-pink-500">
                <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1">Rôle Utilisateur</p>
                <h3 class="text-xl font-black text-white italic uppercase">Membre <span class="text-pink-500">Fan</span></h3>
            </div>
            <div class="ultra-glass p-8 rounded-[40px] border-l-4 border-cyan-500">
                <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest mb-1">Date d'inscription</p>
                <h3 class="text-xl font-black text-white italic uppercase font-mono">2026</h3>
            </div>
        </div>
    </main>

    <div id="update-modal" class="fixed inset-0 z-[150] hidden flex items-center justify-center p-6 bg-black/90 backdrop-blur-xl">
        <div class="ultra-glass w-full max-w-md p-10 rounded-[50px] border border-pink-500/20 shadow-2xl relative">
            <button onclick="toggleModal('update-modal')" class="absolute top-8 right-8 text-slate-500 hover:text-white transition-colors">
                <i class="fa-solid fa-xmark text-2xl"></i>
            </button>

            <h3 class="text-2xl font-black uppercase italic mb-8 tracking-tighter text-pink-500">Modifier Profil</h3>

            <form action="<?= PATH_ROOT ?>/profil/update" method="POST" class="space-y-5">
                <div class="space-y-4">
                    <div class="relative">
                        <label class="text-[9px] font-black uppercase text-slate-500 ml-4 mb-2 block tracking-widest">Prénom</label>
                        <i class="fa-solid fa-id-card absolute left-5 top-[42px] text-pink-500/50 text-xs"></i>
                        <input type="text" name="prenom" value="<?= $_SESSION['User']->getPrenom() ?>" 
                               class="w-full bg-white/5 border border-white/10 p-5 pl-12 rounded-3xl outline-none transition-all text-sm font-bold">
                    </div>

                    <div class="relative">
                        <label class="text-[9px] font-black uppercase text-slate-500 ml-4 mb-2 block tracking-widest">Nom de famille</label>
                        <i class="fa-solid fa-signature absolute left-5 top-[42px] text-pink-500/50 text-xs"></i>
                        <input type="text" name="nom" value="<?= $_SESSION['User']->getNom() ?>" 
                               class="w-full bg-white/5 border border-white/10 p-5 pl-12 rounded-3xl outline-none transition-all text-sm font-bold">
                    </div>
                </div>

                <div class="pt-8 flex flex-col gap-3">
                    <button type="submit" class="bg-pink-500 text-white p-5 rounded-3xl font-black uppercase text-xs tracking-widest shadow-[0_10px_30px_rgba(244,63,94,0.3)] hover:scale-[1.02] active:scale-95 transition-all">
                        Enregistrer les modifications
                    </button>
                    <button type="button" onclick="toggleModal('update-modal')" class="p-5 text-slate-500 font-black text-[10px] uppercase tracking-widest hover:text-white transition-colors">
                        Annuler
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleModal(id) {
            const modal = document.getElementById(id);
            modal.classList.toggle('hidden');
            if (!modal.classList.contains('hidden')) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = 'auto';
            }
        }
    </script>
</body>
</html>