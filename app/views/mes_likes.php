<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MES BILLETS — FISHMASTERS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;900&display=swap');
        body { font-family: 'Outfit', sans-serif; background: #02040a; color: #fff; }
        .ultra-glass { background: rgba(255, 255, 255, 0.02); backdrop-filter: blur(20px); border: 1px solid rgba(255, 255, 255, 0.05); }
        .ticket-cut {
            clip-path: polygon(0% 0%, 100% 0%, 100% 70%, 95% 75%, 100% 80%, 100% 100%, 0% 100%, 0% 80%, 5% 75%, 0% 70%);
        }
    </style>
</head>

<body class="antialiased pb-32">
    <?php include "header.php"; ?>

    <main class="max-w-4xl mx-auto px-6 pt-32">
        <div class="mb-12">
            <h1 class="text-5xl font-black uppercase italic tracking-tighter">Mes <span class="text-pink-500">Billets.</span></h1>
            <p class="text-slate-500 text-[10px] font-bold uppercase tracking-[0.4em] mt-2">Accès exclusifs aux événements live</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="ultra-glass rounded-[40px] overflow-hidden ticket-cut relative border-t-4 border-pink-500 shadow-2xl group">
                <div class="p-8">
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <span class="bg-pink-500 text-black text-[8px] font-black px-3 py-1 rounded-full uppercase">VIP ACCESS</span>
                            <h3 class="text-2xl font-black uppercase italic mt-2 tracking-tight">Grand Open <br>Dakhla 2026</h3>
                        </div>
                        <i class="fa-solid fa-fish-fins text-4xl text-white/10 group-hover:text-pink-500/20 transition-colors"></i>
                    </div>

                    <div class="space-y-3 mb-10">
                        <div class="flex items-center gap-3 text-[10px] text-slate-400 font-bold uppercase">
                            <i class="fa-solid fa-calendar text-pink-500"></i> 14 Mars 2026
                        </div>
                        <div class="flex items-center gap-3 text-[10px] text-slate-400 font-bold uppercase">
                            <i class="fa-solid fa-location-dot text-pink-500"></i> Port de Dakhla, Maroc
                        </div>
                    </div>

                    <div class="flex justify-between items-center bg-white/5 p-4 rounded-2xl border border-white/5">
                        <div class="text-center">
                            <p class="text-[8px] text-slate-500 uppercase font-black">Rang</p>
                            <p class="text-lg font-black italic">A-12</p>
                        </div>
                        <div class="h-8 w-px bg-white/10"></div>
                        <div class="text-center">
                            <p class="text-[8px] text-slate-500 uppercase font-black">Porte</p>
                            <p class="text-lg font-black italic">04</p>
                        </div>
                        <div class="h-8 w-px bg-white/10"></div>
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=Ticket-ID-9921&bgcolor=02040a&color=f43f5e" class="w-12 h-12 rounded-lg grayscale hover:grayscale-0 transition-all">
                    </div>
                </div>
                <div class="bg-pink-500 p-3 text-center">
                    <p class="text-black font-black text-[9px] uppercase tracking-[0.3em]">Présenter ce QR Code à l'entrée</p>
                </div>
            </div>

            <div class="rounded-[40px] border-2 border-dashed border-white/5 flex flex-col items-center justify-center p-12 text-center group hover:border-pink-500/20 transition-all">
                <div class="w-16 h-16 rounded-full bg-white/5 flex items-center justify-center mb-4 group-hover:bg-pink-500/10 transition-colors">
                    <i class="fa-solid fa-plus text-slate-700 group-hover:text-pink-500"></i>
                </div>
                <p class="text-[10px] font-black uppercase text-slate-600 tracking-widest">Réserver un <br>nouveau billet</p>
            </div>
        </div>
    </main>
</body>
</html>