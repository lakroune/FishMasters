<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FishFan — Fil d'actualité</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;900&display=swap');
        body { font-family: 'Outfit', sans-serif; background: #02040a; color: #fff; }
        .ultra-glass { background: rgba(255, 255, 255, 0.02); backdrop-filter: blur(20px); border: 1px solid rgba(255, 255, 255, 0.05); }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .story-ring { padding: 2px; background: linear-gradient(to tr, #f43f5e, #fb7185, #fda4af); }
    </style>
</head>
<body class="antialiased pb-28">

    <?php include('headerFan.php'); ?>

    <main class="max-w-4xl mx-auto px-6 pt-32">
        
        <section class="mb-10">
            <h3 class="text-[10px] font-black uppercase tracking-[0.3em] text-pink-500 mb-6 px-2">Pros en Direct</h3>
            <div class="flex space-x-5 overflow-x-auto no-scrollbar pb-4">
                
                <div class="flex-shrink-0 flex flex-col items-center space-y-2 cursor-pointer">
                    <div class="w-16 h-16 rounded-3xl bg-white/5 border border-white/10 flex items-center justify-center text-pink-500">
                        <i class="fa-solid fa-plus"></i>
                    </div>
                    <span class="text-[9px] font-bold text-slate-500 uppercase">Ma Story</span>
                </div>

                <div class="flex-shrink-0 flex flex-col items-center space-y-2 cursor-pointer group">
                    <div class="w-16 h-16 rounded-3xl story-ring p-[2px] shadow-[0_0_15px_rgba(244,63,94,0.3)]">
                        <div class="w-full h-full rounded-[22px] overflow-hidden border-2 border-[#02040a]">
                            <img src="https://i.pravatar.cc/150?u=pro1" class="w-full h-full object-cover">
                        </div>
                    </div>
                    <span class="text-[9px] font-black text-rose-500 uppercase flex items-center">
                        <span class="w-1 h-1 bg-rose-500 rounded-full mr-1 animate-ping"></span> Live
                    </span>
                </div>

                <?php for($i=0; $i<5; $i++): ?>
                <div class="flex-shrink-0 flex flex-col items-center space-y-2 opacity-60 hover:opacity-100 transition">
                    <div class="w-16 h-16 rounded-3xl p-[2px] bg-white/10">
                        <div class="w-full h-full rounded-[22px] overflow-hidden border-2 border-[#02040a]">
                            <img src="https://i.pravatar.cc/150?u=user<?= $i ?>" class="w-full h-full object-cover grayscale">
                        </div>
                    </div>
                    <span class="text-[9px] font-bold text-slate-500 uppercase tracking-tighter italic">Pro_Angler</span>
                </div>
                <?php endfor; ?>
            </div>
        </section>

        <section class="space-y-8 max-w-2xl mx-auto">
            
            <article class="ultra-glass rounded-[45px] border border-white/5 overflow-hidden group">
                <div class="p-6 flex justify-between items-center">
                    <div class="flex items-center space-x-3">
                        <img src="https://i.pravatar.cc/150?u=yassine" class="w-11 h-11 rounded-2xl object-cover border border-pink-500/20">
                        <div>
                            <h4 class="text-sm font-black uppercase tracking-tight italic">Yassine Amrani <i class="fa-solid fa-circle-check text-pink-500 text-[10px] ml-1"></i></h4>
                            <p class="text-[9px] text-slate-500 font-bold uppercase">Agadir • Il y a 4h</p>
                        </div>
                    </div>
                    <button class="w-10 h-10 rounded-full hover:bg-white/5 transition flex items-center justify-center text-slate-500"><i class="fa-solid fa-ellipsis"></i></button>
                </div>

                <div class="px-4">
                    <div class="relative rounded-[35px] overflow-hidden aspect-square md:aspect-video">
                        <img src="https://images.unsplash.com/photo-1544551763-46a013bb70d5?q=80&w=1200" class="w-full h-full object-cover">
                        <div class="absolute top-6 left-6 bg-black/50 backdrop-blur-md px-4 py-1 rounded-full border border-white/10 text-[10px] font-black uppercase tracking-widest text-pink-400">
                            Prise Exceptionnelle 🔥
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    <div class="flex justify-between items-center mb-6 px-2">
                        <div class="flex space-x-6">
                            <button onclick="toggleLike(this)" class="flex items-center space-x-2 group">
                                <i class="fa-solid fa-heart text-xl text-slate-600 group-hover:text-rose-500 transition-all"></i>
                                <span class="text-xs font-black text-slate-400">1.4k</span>
                            </button>
                            <button class="flex items-center space-x-2 group">
                                <i class="fa-solid fa-comment text-xl text-slate-600 group-hover:text-white transition-all"></i>
                                <span class="text-xs font-black text-slate-400">85</span>
                            </button>
                            <button class="flex items-center space-x-2 group">
                                <i class="fa-solid fa-paper-plane text-xl text-slate-600 group-hover:text-pink-400 transition-all"></i>
                            </button>
                        </div>
                        <button class="text-slate-600 hover:text-white transition"><i class="fa-solid fa-bookmark text-xl"></i></button>
                    </div>

                    <div class="px-2">
                        <p class="text-xs text-slate-300 leading-relaxed">
                            <span class="font-black text-white uppercase mr-2 tracking-tighter italic text-sm">Yassine Amrani</span>
                            Un combat épique ce matin à la plage de Legzira ! Une courbine de 12kg capturée en plein lever de soleil. #Surfcasting #Agadir #FishMasters
                        </p>
                    </div>
                </div>
            </article>

            </section>

    </main>

    <div class="md:hidden fixed bottom-6 left-1/2 -translate-x-1/2 w-[90%] ultra-glass rounded-full p-2 flex justify-around items-center z-50 border border-white/10 shadow-2xl">
        <a href="#" class="w-12 h-12 flex items-center justify-center text-pink-500"><i class="fa-solid fa-house-chimney text-sm"></i></a>
        <a href="#" class="w-12 h-12 flex items-center justify-center text-slate-500"><i class="fa-solid fa-magnifying-glass text-sm"></i></a>
        <div class="w-14 h-14 bg-gradient-to-tr from-pink-600 to-rose-400 rounded-full flex items-center justify-center text-white shadow-lg shadow-pink-500/40 transform -translate-y-4 border-4 border-[#02040a]">
            <i class="fa-solid fa-bolt text-xl"></i>
        </div>
        <a href="#" class="w-12 h-12 flex items-center justify-center text-slate-500"><i class="fa-solid fa-bag-shopping text-sm"></i></a>
        <a href="#" class="w-12 h-12 flex items-center justify-center text-slate-500"><i class="fa-solid fa-circle-user text-sm"></i></a>
    </div>

    <script>
        function toggleLike(btn) {
            const icon = btn.querySelector('i');
            const count = btn.querySelector('span');
            icon.classList.toggle('text-rose-500');
            icon.classList.toggle('text-slate-600');
            icon.classList.toggle('fa-solid');
            icon.classList.toggle('fa-regular');
            
            btn.style.transform = 'scale(1.2)';
            setTimeout(() => { btn.style.transform = 'scale(1)'; }, 150);
        }
    </script>
</body>
</html>