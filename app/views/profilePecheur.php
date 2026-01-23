<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MON PROFIL — FISHMASTERS X</title>
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

        .profile-header {
            background: linear-gradient(to bottom, #00f2ff15 0%, #02040a 100%);
        }

        .img-gallery {
            aspect-ratio: 1/1;
            object-fit: cover;
            border-radius: 20px;
            transition: transform 0.3s ease;
        }

        .img-gallery:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body class="antialiased pb-32">

    <div class="relative h-48 w-full profile-header border-b border-white/5">
        <?php include "header.php"; ?>
        <div class=" h-48 w-full profile-header border-b border-white/5"></div>
            <nav class="  flex justify-between items-center ">
                <h2 class="font-black italic tracking-tighter">MY<span class="text-cyan-500">PROFILE</span></h2>
                <button onclick="toggleModal('update-modal')" class="ultra-glass px-4 py-2 rounded-xl text-[10px] font-black uppercase border border-cyan-500/30 text-cyan-400">
                    <i class="fa-solid fa-pen-to-square mr-2"></i>Modifier
                </button>
            </nav>
        </div>

        <main class="max-w-4xl mx-auto px-6 -mt-16 relative z-10">

            <div class="flex flex-col items-center text-center mb-10">
                <div class="relative">
                    <img src="https://i.pravatar.cc/150?u=myprofile" class="w-28 h-28 rounded-[35px] border-4 border-[#02040a] shadow-2xl object-cover">
                    <div class="absolute -bottom-2 -right-2 bg-cyan-500 text-black p-2 rounded-lg text-[10px]"><i class="fa-solid fa-check-double"></i></div>
                </div>
                <h1 class="text-3xl font-black uppercase mt-4 italic">Yassine Amrani</h1>
                <p class="text-slate-500 text-[10px] font-bold uppercase tracking-widest mt-1">Sidi Ifni • Expert Surfcasting</p>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-10">
                <div class="ultra-glass p-6 rounded-[30px] border-b-2 border-cyan-500">
                    <p class="text-[9px] font-black text-slate-500 uppercase tracking-widest mb-1">Score Total</p>
                    <p class="text-3xl font-black text-cyan-400">32,450 <span class="text-xs italic text-white/50">pts</span></p>
                </div>
                <div class="ultra-glass p-6 rounded-[30px] border-b-2 border-white/10">
                    <p class="text-[9px] font-black text-slate-500 uppercase tracking-widest mb-1">Position</p>
                    <p class="text-3xl font-black italic">#12 <span class="text-[10px] text-green-500">+2 UP</span></p>
                </div>
            </div>

            <button onclick="window.location.href= '<?= PATH_ROOT ?>/prise'" class="w-full bg-cyan-500 text-black py-5 rounded-[25px] font-black uppercase text-xs tracking-[0.2em] shadow-[0_10px_30px_rgba(6,182,212,0.3)] mb-12 hover:scale-[1.02] transition-transform">
                <i class="fa-solid fa-camera-retro mr-3 text-lg"></i>Ajouter une nouvelle prise
            </button>

            <section>
                <div class="flex justify-between items-center mb-6">
                    <h3 class="font-black uppercase text-xs tracking-widest">Ma Galerie <span class="text-slate-600 ml-2">(12)</span></h3>
                    <i class="fa-solid fa-grip text-cyan-500"></i>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    <div class="relative group cursor-pointer">
                        <img src="https://images.unsplash.com/photo-1544551763-46a013bb70d5?q=80&w=400" class="img-gallery">
                        <div class="absolute bottom-3 left-3 bg-black/60 backdrop-blur-md px-2 py-1 rounded-lg text-[8px] font-black uppercase border border-white/10">
                            8.4 KG • BAR
                        </div>
                    </div>
                    <div class="relative group cursor-pointer">
                        <img src="https://images.unsplash.com/photo-1516939884455-1445c8652f83?q=80&w=400" class="img-gallery">
                        <div class="absolute bottom-3 left-3 bg-black/60 backdrop-blur-md px-2 py-1 rounded-lg text-[8px] font-black uppercase border border-white/10">
                            12 KG • COURBINE
                        </div>
                    </div>
                    <div class="relative group cursor-pointer">
                        <img src="https://images.unsplash.com/photo-1518977676601-b53f02ac6d31?q=80&w=400" class="img-gallery">
                        <div class="absolute bottom-3 left-3 bg-black/60 backdrop-blur-md px-2 py-1 rounded-lg text-[8px] font-black uppercase border border-white/10">
                            2.1 KG • DORADE
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <div id="update-modal" class="fixed inset-0 z-[100] hidden flex items-center justify-center p-6 bg-black/80 backdrop-blur-sm">
            <div class="ultra-glass w-full max-w-md p-8 rounded-[40px] border border-cyan-500/20">
                <h3 class="text-xl font-black uppercase italic mb-6">Modifier mes infos</h3>
                <div class="space-y-4">
                    <div class="relative group">
                        <label for="image-upload" class="cursor-pointer flex flex-col items-center justify-center w-full h-32 bg-white/5 border-2 border-dashed border-white/10 rounded-2xl hover:border-cyan-500/50 hover:bg-white/10 transition-all duration-300">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <i class="fa-solid fa-cloud-arrow-up text-cyan-500 text-2xl mb-2 group-hover:scale-110 transition-transform"></i>
                                <p class="text-[10px] font-black uppercase tracking-widest text-slate-400">Photo de profil / Prise</p>
                                <p class="text-[8px] text-slate-600 mt-1 uppercase">PNG, JPG (Max. 5MB)</p>
                            </div>
                            <input id="image-upload" type="file" class="hidden" accept="image/*" onchange="previewImage(event)" />
                        </label>

                        <div id="image-preview-container" class="hidden absolute inset-0 rounded-2xl overflow-hidden border-2 border-cyan-500">
                            <img id="image-preview" src="#" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity">
                                <p class="text-[10px] font-black uppercase">Changer la photo</p>
                            </div>
                        </div>
                    </div>

                    <div class="relative">
                        <i class="fa-solid fa-user absolute left-4 top-1/2 -translate-y-1/2 text-slate-600 text-xs"></i>
                        <input type="text" placeholder="Nom du Pêcheur" class="w-full bg-white/5 border border-white/10 p-4 pl-10 rounded-2xl outline-none focus:border-cyan-500 focus:bg-white/10 text-sm transition-all">
                    </div>

                    <div class="relative">
                        <i class="fa-solid fa-id-card absolute left-4 top-1/2 -translate-y-1/2 text-slate-600 text-xs"></i>
                        <input type="text" placeholder="Prénom du Pêcheur" class="w-full bg-white/5 border border-white/10 p-4 pl-10 rounded-2xl outline-none focus:border-cyan-500 focus:bg-white/10 text-sm transition-all">
                    </div>

                    <div class="relative">
                        <i class="fa-solid fa-map-location-dot absolute left-4 top-1/2 -translate-y-1/2 text-slate-600 text-xs"></i>
                        <input type="text" placeholder="Ville (ex: Agadir)" class="w-full bg-white/5 border border-white/10 p-4 pl-10 rounded-2xl outline-none focus:border-cyan-500 focus:bg-white/10 text-sm transition-all">
                    </div>

                    <div class="pt-2 space-y-3">
                        <button onclick="toggleModal('update-modal')" class="w-full bg-cyan-500 text-black py-4 rounded-2xl font-black uppercase text-[11px] tracking-widest shadow-[0_10px_20px_rgba(6,182,212,0.2)] hover:scale-[1.02] active:scale-95 transition-all">
                            Enregistrer les modifications
                        </button>
                        <button onclick="toggleModal('update-modal')" class="w-full text-slate-500 font-black text-[10px] uppercase tracking-widest hover:text-white transition-colors">
                            Annuler
                        </button>
                    </div>
                </div>


            </div>
        </div>

        <script>
            function previewImage(event) {
                const reader = new FileReader();
                reader.onload = function() {
                    const output = document.getElementById('image-preview');
                    const container = document.getElementById('image-preview-container');
                    output.src = reader.result;
                    container.classList.remove('hidden');
                };
                reader.readAsDataURL(event.target.files[0]);
            }
        </script>
        <script>
            function toggleModal(id) {
                const modal = document.getElementById(id);
                modal.classList.toggle('hidden');
            }
        </script>

</body>

</html>