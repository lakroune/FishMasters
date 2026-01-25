<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MON PROFIL FAN — FISHMASTERS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;900&display=swap');
        body { font-family: 'Outfit', sans-serif; background: #02040a; color: #fff; }
        .ultra-glass { background: rgba(255, 255, 255, 0.02); backdrop-filter: blur(20px); border: 1px solid rgba(255, 255, 255, 0.05); }
        .pink-glow { text-shadow: 0 0 15px rgba(244, 63, 94, 0.5); }
    </style>
</head>

<body class="antialiased pb-32">
    <?php include "header.php"; ?>

    <div class="relative h-64 w-full bg-gradient-to-b from-pink-500/10 to-transparent border-b border-white/5"></div>

    <main class="max-w-4xl mx-auto px-6 -mt-32 relative z-10">
        <div class="flex flex-col items-center text-center mb-12">
            <div class="relative">
                <div class="w-32 h-32 rounded-[40px] p-1 bg-gradient-to-tr from-pink-500 to-rose-400 shadow-[0_0_40px_rgba(244,63,94,0.3)]">
                    <img src="https://ui-avatars.com/api/?name=<?= $_SESSION['User']->getNom() ?>&background=0f172a&color=f43f5e&size=128" 
                         class="w-full h-full rounded-[38px] object-cover bg-[#0a0a0a]">
                </div>
                <div class="absolute -bottom-2 -right-2 bg-pink-500 text-white p-2.5 rounded-2xl shadow-lg border-4 border-[#02040a]">
                    <i class="fa-solid fa-heart text-xs"></i>
                </div>
            </div>
            
            <h1 class="text-4xl font-black uppercase mt-6 italic tracking-tight">
                <?= $_SESSION['User']->getPrenom() ?> <span class="text-pink-500"><?= $_SESSION['User']->getNom() ?></span>
            </h1>
            <p class="text-slate-500 text-[10px] font-black uppercase tracking-[0.5em] mt-2">Membre Passionné • Saison 2026</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <div class="ultra-glass p-8 rounded-[35px] text-center border-b-4 border-pink-500/30 group hover:bg-white/5 transition-all">
                <i class="fa-solid fa-ticket text-pink-500 text-2xl mb-4 group-hover:scale-110 transition-transform"></i>
                <p class="text-[9px] font-black text-slate-500 uppercase tracking-widest mb-1">Billets Actifs</p>
                <p class="text-3xl font-black italic">03</p>
            </div>
            <div class="ultra-glass p-8 rounded-[35px] text-center border-b-4 border-cyan-500/30 group hover:bg-white/5 transition-all">
                <i class="fa-solid fa-thumbs-up text-cyan-400 text-2xl mb-4 group-hover:scale-110 transition-transform"></i>
                <p class="text-[9px] font-black text-slate-500 uppercase tracking-widest mb-1">Likes Donnés</p>
                <p class="text-3xl font-black italic">128</p>
            </div>
            <div class="ultra-glass p-8 rounded-[35px] text-center border-b-4 border-purple-500/30 group hover:bg-white/5 transition-all">
                <i class="fa-solid fa-user-plus text-purple-400 text-2xl mb-4 group-hover:scale-110 transition-transform"></i>
                <p class="text-[9px] font-black text-slate-500 uppercase tracking-widest mb-1">Abonnements</p>
                <p class="text-3xl font-black italic">12</p>
            </div>
        </div>

        <div class="space-y-4">
            <button onclick="window.location.href='<?= PATH_ROOT ?>/meslikes'" class="w-full ultra-glass p-6 rounded-[30px] flex justify-between items-center hover:border-pink-500/50 transition-all group">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-pink-500/10 flex items-center justify-center text-pink-500">
                        <i class="fa-solid fa-receipt"></i>
                    </div>
                    <div class="text-left">
                        <p class="text-xs font-black uppercase italic">Gérer mes billets</p>
                        <p class="text-[10px] text-slate-500">Consulter vos accès aux compétitions</p>
                    </div>
                </div>
                <i class="fa-solid fa-chevron-right text-slate-700 group-hover:text-pink-500 transition-colors"></i>
            </button>
            
            <button class="w-full ultra-glass p-6 rounded-[30px] flex justify-between items-center hover:border-cyan-500/50 transition-all group">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-cyan-500/10 flex items-center justify-center text-cyan-400">
                        <i class="fa-solid fa-gear"></i>
                    </div>
                    <div class="text-left">
                        <p class="text-xs font-black uppercase italic">Paramètres du compte</p>
                        <p class="text-[10px] text-slate-500">Modifier vos informations personnelles</p>
                    </div>
                </div>
                <i class="fa-solid fa-chevron-right text-slate-700 group-hover:text-cyan-400 transition-colors"></i>
            </button>
        </div>
    </main>
</body>
</html>