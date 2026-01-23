<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRO-ANGLERS — FISHMASTERS X</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;900&display=swap');
        body { font-family: 'Outfit', sans-serif; background: #02040a; color: #fff; }
        
        .ultra-glass { 
            background: rgba(255,255,255,0.02); 
            backdrop-filter: blur(15px); 
            border: 1px solid rgba(255,255,255,0.05); 
        }

        .like-active { 
            color: #ff2e5f !important; 
            text-shadow: 0 0 10px rgba(255, 46, 95, 0.4);
            background: rgba(255, 46, 95, 0.1) !important;
            border-color: rgba(255, 46, 95, 0.2) !important;
        }

        /* Scrollbar invisible */
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="antialiased pb-24">
 <?php include "header.php"; ?>

    <main class="max-w-6xl mx-auto px-6 space-y-8 pt-32">
        
        <div>
            <span class="text-cyan-500 font-black text-[9px] uppercase tracking-[0.4em]">Classement National</span>
            <h1 class="text-4xl font-black uppercase italic italic leading-none mt-2">Elite <br> <span class="text-slate-500">Anglers.</span></h1>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">

            <div class="ultra-glass rounded-[30px] p-4 flex flex-col justify-between border border-white/5 hover:border-cyan-500/30 transition-all duration-300 group">
                <div class="flex justify-between items-start mb-4">
                    <div class="relative">
                        <img src="https://i.pravatar.cc/100?u=12" class="w-16 h-16 rounded-2xl object-cover border-2 border-cyan-500/30 group-hover:border-cyan-500 transition-colors">
                        <div class="absolute -top-2 -right-2 bg-cyan-500 text-black text-[8px] font-black px-1.5 py-0.5 rounded-lg">#1</div>
                    </div>
                    <button onclick="toggleLike(this)" class="w-9 h-9 rounded-xl ultra-glass flex items-center justify-center text-slate-500 hover:bg-white/5 transition-all">
                        <i class="fa-solid fa-heart text-[12px]"></i>
                    </button>
                </div>

                <div class="mb-4">
                    <h3 class="text-[13px] font-black uppercase tracking-tight truncate">Yassine Amrani</h3>
                    <p class="text-[9px] text-slate-500 font-bold uppercase"><i class="fa-solid fa-location-dot text-cyan-500 mr-1"></i> Agadir</p>
                </div>

                <div class="flex flex-col gap-2">
                    <div class="flex justify-between items-center px-1">
                        <span class="text-[8px] font-black text-slate-500 uppercase italic">24k Pts</span>
                        <span class="text-[8px] font-black text-green-500 uppercase">92% Kill</span>
                    </div>
                    <button onclick="toggleFollow(this)" class="w-full bg-white text-black text-[9px] font-black uppercase py-3 rounded-xl hover:bg-cyan-500 transition-all tracking-widest active:scale-95">
                        S'abonner
                    </button>
                </div>
            </div>

            <div class="ultra-glass rounded-[30px] p-4 flex flex-col justify-between border border-white/5 hover:border-cyan-500/30 transition-all duration-300 group">
                <div class="flex justify-between items-start mb-4">
                    <div class="relative">
                        <img src="https://i.pravatar.cc/100?u=22" class="w-16 h-16 rounded-2xl object-cover border-2 border-white/10 group-hover:border-cyan-500 transition-colors">
                        <div class="absolute -top-2 -right-2 bg-slate-700 text-white text-[8px] font-black px-1.5 py-0.5 rounded-lg">#2</div>
                    </div>
                    <button onclick="toggleLike(this)" class="w-9 h-9 rounded-xl ultra-glass flex items-center justify-center text-slate-500 hover:bg-white/5 transition-all">
                        <i class="fa-solid fa-heart text-[12px]"></i>
                    </button>
                </div>
                <div class="mb-4">
                    <h3 class="text-[13px] font-black uppercase tracking-tight truncate">Sami Alami</h3>
                    <p class="text-[9px] text-slate-500 font-bold uppercase"><i class="fa-solid fa-location-dot text-cyan-500 mr-1"></i> Tanger</p>
                </div>
                <div class="flex flex-col gap-2">
                    <div class="flex justify-between items-center px-1">
                        <span class="text-[8px] font-black text-slate-500 uppercase italic">18k Pts</span>
                        <span class="text-[8px] font-black text-slate-500 uppercase">84% Kill</span>
                    </div>
                    <button onclick="toggleFollow(this)" class="w-full bg-white text-black text-[9px] font-black uppercase py-3 rounded-xl hover:bg-cyan-500 transition-all tracking-widest active:scale-95">
                        S'abonner
                    </button>
                </div>
            </div>

            <div class="ultra-glass rounded-[30px] p-4 flex flex-col justify-between border border-white/5 hover:border-cyan-500/30 transition-all duration-300 group">
                <div class="flex justify-between items-start mb-4">
                    <div class="relative">
                        <img src="https://i.pravatar.cc/100?u=33" class="w-16 h-16 rounded-2xl object-cover border-2 border-white/10 group-hover:border-cyan-500 transition-colors">
                        <div class="absolute -top-2 -right-2 bg-slate-700 text-white text-[8px] font-black px-1.5 py-0.5 rounded-lg">#3</div>
                    </div>
                    <button onclick="toggleLike(this)" class="w-9 h-9 rounded-xl ultra-glass flex items-center justify-center text-slate-500 hover:bg-white/5 transition-all">
                        <i class="fa-solid fa-heart text-[12px]"></i>
                    </button>
                </div>
                <div class="mb-4">
                    <h3 class="text-[13px] font-black uppercase tracking-tight truncate">Omar Tazi</h3>
                    <p class="text-[9px] text-slate-500 font-bold uppercase"><i class="fa-solid fa-location-dot text-cyan-500 mr-1"></i> Nador</p>
                </div>
                <div class="flex flex-col gap-2">
                    <div class="flex justify-between items-center px-1">
                        <span class="text-[8px] font-black text-slate-500 uppercase italic">15k Pts</span>
                        <span class="text-[8px] font-black text-slate-500 uppercase">79% Kill</span>
                    </div>
                    <button onclick="toggleFollow(this)" class="w-full bg-white text-black text-[9px] font-black uppercase py-3 rounded-xl hover:bg-cyan-500 transition-all tracking-widest active:scale-95">
                        S'abonner
                    </button>
                </div>
            </div>

        </div>
    </main>

    

    <script>
        function toggleLike(btn) {
            btn.classList.toggle('like-active');
            const icon = btn.querySelector('i');
            icon.classList.toggle('fa-solid');
            icon.classList.toggle('fa-regular');
        }

        function toggleFollow(btn) {
            if (btn.innerText === "S'ABONNER") {
                btn.innerText = "ABONNÉ";
                btn.classList.remove('bg-white', 'text-black');
                btn.classList.add('bg-cyan-500/20', 'text-cyan-500', 'border', 'border-cyan-500/30');
            } else {
                btn.innerText = "S'ABONNER";
                btn.classList.add('bg-white', 'text-black');
                btn.classList.remove('bg-cyan-500/20', 'text-cyan-500', 'border', 'border-cyan-500/30');
            }
        }
    </script>
</body>
</html>