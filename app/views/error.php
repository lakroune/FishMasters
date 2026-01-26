<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 — ZONE VIDE</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;900&display=swap');
        body { font-family: 'Outfit', sans-serif; background: #02040a; color: #fff; overflow: hidden; }
        .ultra-glass { background: rgba(255, 255, 255, 0.02); backdrop-filter: blur(20px); border: 1px solid rgba(255, 255, 255, 0.05); }
        .glow { text-shadow: 0 0 30px rgba(6, 182, 212, 0.5); }
        .float { animation: float 6s ease-in-out infinite; }
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen">

    <div class="relative z-10 text-center px-6">
        <div class="float mb-8">
            <i class="fa-solid fa-anchor text-8xl text-cyan-500/20 glow"></i>
        </div>

        <h1 class="text-[120px] font-black italic tracking-tighter leading-none opacity-20">404</h1>
        
        <div class="-mt-12">
            <h2 class="text-2xl font-black uppercase italic tracking-widest mb-4">Zone de pêche vide !</h2>
            <p class="text-slate-500 text-sm max-w-md mx-auto mb-10 leading-relaxed font-light">
                Il n'y a pas de poisson ici. La page que vous cherchez a peut-être plongé trop profondément ou n'a jamais existé.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="javascript:history.back()" class="ultra-glass px-8 py-4 rounded-2xl font-black uppercase text-[10px] tracking-widest hover:bg-white/5 transition-all">
                    <i class="fa-solid fa-arrow-left mr-2"></i> Faire demi-tour
                </button>
                <a href="<?= PATH_ROOT ?>" class="bg-cyan-500 text-black px-8 py-4 rounded-2xl font-black uppercase text-[10px] tracking-widest shadow-[0_10px_20px_rgba(6,182,212,0.3)] hover:scale-105 transition-transform">
                    Retour au port (Accueil)
                </a>
            </div>
        </div>
    </div>

    <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-cyan-500/5 rounded-full blur-[120px]"></div>
    <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-blue-600/5 rounded-full blur-[120px]"></div>

</body>
</html>