<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DÉCLARER UNE PRISE — FISHMASTERS X</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;700&family=Outfit:wght@300;400;900&display=swap');

        :root {
            --accent: #00f2ff;
            --bg: #02040a;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--bg);
            color: #fff;
        }

        .ultra-glass {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .input-field {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .input-field:focus {
            border-color: var(--accent);
            background: rgba(0, 242, 255, 0.05);
            outline: none;
            box-shadow: 0 0 15px rgba(0, 242, 255, 0.2);
        }

        .radio-card:checked+label {
            background: var(--accent);
            color: #000;
            box-shadow: 0 0 20px rgba(0, 242, 255, 0.4);
        }
    </style>
</head>

<body class="antialiased p-4 md:p-8">

    <main class="max-w-2xl mx-auto pt-10 pb-20">
        <div class="flex items-center justify-between mb-10">
            <a href="<?= PATH_ROOT ?>/" class="text-slate-500 hover:text-white transition"><i class="fa-solid fa-arrow-left mr-2"></i> Retour</a>
            <h1 class="text-2xl font-black uppercase tracking-tighter">Nouvelle <span class="text-cyan-500">Prise</span></h1>
            <div class="w-10"></div>
        </div>

        <form action="<?= PATH_ROOT ?>/prise/store" method="post" enctype="multipart/form-data" class="space-y-6">

            <div class="ultra-glass rounded-[30px] p-8 border-dashed border-2 border-white/10 text-center hover:border-cyan-500/50 transition cursor-pointer group">
                <input type="file" name="photoPrise" id="photo" class="hidden">
                <label for="photo" class="cursor-pointer">
                    <div class="w-16 h-16 bg-cyan-500/10 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition">
                        <i class="fa-solid fa-camera text-cyan-500 text-2xl"></i>
                    </div>
                    <p class="font-bold uppercase text-xs tracking-widest">Prendre une photo</p>
                    <p class="text-[10px] text-slate-500 mt-2">Preuve visuelle obligatoire pour validation</p>
                </label>
            </div>

            <div class="ultra-glass rounded-[30px] p-6 space-y-4">
                <div>
                    <label class="text-[10px] font-black uppercase text-slate-500 mb-2 block tracking-widest">Espèce de poisson</label>
                    <select name="id_espece" class="input-field w-full p-4 rounded-2xl text-sm font-bold appearance-none">
                        <?php foreach ($especes as $espece) : ?>
                            <option class=" p-4 rounded-2xl text-sm font-bold appearance-none  " value="<?= $espece->getIdEspece() ?>"><?= $espece->getNomEspece() ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="text-[10px] font-black uppercase text-slate-500 mb-2 block tracking-widest">Poids (kg)</label>
                        <input name="poids" type="number" step="0.01" placeholder="0.00" class="input-field w-full p-4 rounded-2xl text-sm font-bold">
                    </div>
                    <div>
                        <label class="text-[10px] font-black uppercase text-slate-500 mb-2 block tracking-widest">Taille (cm)</label>
                        <input name="taille" type="number" placeholder="0" class="input-field w-full p-4 rounded-2xl text-sm font-bold">
                    </div>
                </div>
            </div>

            <div class="ultra-glass rounded-[30px] p-6 space-y-4">
                <div>
                    <label class="text-[10px] font-black uppercase text-slate-500 mb-2 block tracking-widest">Spot de pêche</label>
                    <div class="relative">
                        <select name="id_spot" class="input-field w-full p-4 rounded-2xl text-sm font-bold appearance-none bg-dark text-slate-500 cursor-pointer pr-12  bg-transpar ent border-none focus:border-cyan-500/50 transition all duration-300 ease-in outline-none ">
                            <?php foreach ($spots as $spot) : ?>
                                <option class="" value="<?= $spot->getIdSpot() ?>"><?= $spot->getNomSpot() ?></option>
                            <?php endforeach; ?>

                        </select>
                        <i class="fa-solid fa-location-dot absolute right-6 top-1/2 -translate-y-1/2 text-slate-500"></i>
                    </div>
                </div>

            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="relative">
                    <input type="radio" name="status" id="relache" class="hidden radio-card" checked>
                    <label for="relache" class="block ultra-glass p-4 rounded-2xl text-center cursor-pointer transition-all duration-300">
                        <i class="fa-solid fa-leaf mb-2 block"></i>
                        <span class="text-[10px] font-black uppercase">Relâché</span>
                    </label>
                </div>
                <div class="relative">
                    <input type="radio" name="status" id="garde" class="hidden radio-card">
                    <label for="garde" class="block ultra-glass p-4 rounded-2xl text-center cursor-pointer transition-all duration-300">
                        <i class="fa-solid fa-utensils mb-2 block"></i>
                        <span class="text-[10px] font-black uppercase">Gardé</span>
                    </label>
                </div>
            </div>

            <button type="submit" class="w-full bg-cyan-500 text-black font-black py-5 rounded-[25px] uppercase tracking-[0.2em] shadow-[0_10px_30px_rgba(6,182,212,0.3)] hover:scale-[1.02] active:scale-95 transition-all">
                Enregistrer ma prise
            </button>
        </form>
    </main>
    <?php if (isset($error_msg)): ?>
        <div id="error-toast" class="fixed top-24 left-1/2 -translate-x-1/2 z-[200] w-[90%] max-w-md">
            <div class="ultra-glass border-l-4 border-rose-500 p-5 rounded-2xl shadow-2xl flex items-center gap-4 animate-bounce-subtle">
                <div class="w-10 h-10 bg-rose-500/20 rounded-xl flex items-center justify-center text-rose-500">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                </div>
                <div class="flex-grow">
                    <p class="text-[10px] font-black uppercase tracking-widest text-rose-500">Erreur de saisie</p>
                    <p class="text-xs font-medium text-slate-200"><?= $error_msg ?></p>
                </div>
                <button onclick="this.parentElement.parentElement.remove()" class="text-slate-500 hover:text-white">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        </div>

        <style>
            @keyframes bounce-subtle {

                0%,
                100% {
                    transform: translateY(0);
                }

                50% {
                    transform: translateY(-5px);
                }
            }

            .animate-bounce-subtle {
                animation: bounce-subtle 2s infinite;
            }
        </style>

        <script>
            setTimeout(() => {
                const toast = document.getElementById('error-toast');
                if (toast) toast.style.opacity = '0';
                setTimeout(() => toast?.remove(), 500);
            }, 5000);
        </script>
    <?php endif; ?>
    <script>
        const now = new Date();
        const timeInput = document.getElementById('currentTime');
        timeInput.value = now.getHours().toString().padStart(2, '0') + ":" + now.getMinutes().toString().padStart(2, '0');

        function handleStatusAnimation() {}
    </script>
</body>

</html>