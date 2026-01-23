<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FISHMASTERS X — Bienvenue</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;900&display=swap');

        body {
            font-family: 'Outfit', sans-serif;
            background-color: #02040a;
            color: #fff;
            background-image: radial-gradient(circle at 50% -20%, #004d53 0%, #02040a 60%);
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .glass {
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .glow-button {
            box-shadow: 0 0 30px rgba(6, 182, 212, 0.3);
            transition: all 0.3s ease;
        }

        .glow-button:hover {
            box-shadow: 0 0 50px rgba(6, 182, 212, 0.5);
            transform: translateY(-2px);
        }
    </style>
</head>

<body class="antialiased">

    <?php include "header.php"; ?>
    <nav class="p-16">

    </nav>

    <main class="flex-grow flex items-center justify-center px-6">
        <div class="max-w-3xl text-center space-y-8">

            <div class="space-y-4">
                <span class="text-cyan-500 font-bold text-xs uppercase tracking-[0.4em]">Official Federation Platform</span>
                <h1 class="text-5xl md:text-8xl font-black uppercase leading-tight italic">
                    L'élite de la <br> <span class="text-cyan-400">Pêche Sportive</span>
                </h1>
                <p class="text-slate-400 text-lg md:text-xl max-w-xl mx-auto font-light leading-relaxed">
                    Enregistrez vos prises, suivez vos scores en temps réel et défiez les meilleurs pêcheurs du Royaume sur la plateforme officielle 2026.
                </p>
            </div>

            <div class="pt-6">
                <a href="login.html" class="glow-button inline-flex items-center bg-cyan-500 text-black px-12 py-5 rounded-2xl font-black uppercase text-sm tracking-widest">
                    Se connecter <i class="fa-solid fa-arrow-right ml-3"></i>
                </a>
                <p class="mt-6 text-[10px] text-slate-500 uppercase tracking-widest">
                    Pas encore membre ? <a href="#" class="text-white border-b border-white/20 hover:text-cyan-400 hover:border-cyan-400 transition">Créer un compte</a>
                </p>
            </div>

        </div>
    </main>

    <footer class="p-8 text-center">
        <div class="flex justify-center space-x-8 opacity-20 mb-4">
            <i class="fa-solid fa-water"></i>
            <i class="fa-solid fa-anchor"></i>
            <i class="fa-solid fa-fish"></i>
        </div>
        <p class="text-[9px] font-bold text-slate-600 uppercase tracking-[0.5em]">
            Fédération Royale Marocaine de Pêche Sportive © 2026
        </p>
    </footer>

</body>

</html>