<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXPLORER — FISHMASTERS X</title>
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

        .tab-active {
            color: #00f2ff;
            border-bottom: 2px solid #00f2ff;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            border-color: rgba(0, 242, 255, 0.3);
            background: rgba(255, 255, 255, 0.05);
        }
    </style>
</head>

<body class="antialiased pb-20">

    <header class="sticky top-0 z-50 bg-[#02040a]/80 backdrop-blur-md pt-8 pb-4 px-6 border-b border-white/5">
        <div class="max-w-7xl mx-auto space-y-6">
            <div class="">
                <header class="sticky top-0 z-50 bg-[#02040a]/80 backdrop-blur-md pt-8 pb-4 px-6 border-b border-white/5">
                    <?php include_once('./app/views/header.php'); ?>
                    <div class="pt-20"></div>
                </header>
            </div>

                <form method="POST" action="<?= PATH_ROOT ?>/About/searchAll" class="space-y-4">
            <form method="POST"  class="ultra-glass flex items-center px-5 py-2 rounded-2xl focus-within:ring-2 ring-cyan-500/30 transition-all">
                <i class="fa-solid fa-magnifying-glass text-slate-500 mr-4"></i>
                <input type="text" name="key" placeholder="Rechercher un spot, un pro ou un club..." class="bg-transparent w-full py-3 outline-none text-sm font-medium">
                <button type="submit" name="submit" class="bg-white/5 p-2 rounded-xl hover:text-cyan-400"><i class="fa-solid fa-sliders"></i></button>
            </form>


        </div>
    </header>

    <main class="max-w-6xl mx-auto p-6 space-y-12 mt-4">
        <!-- ajout de la section pour les pecheurs    -->
        <section>
            <div class="flex justify-between items-end mb-6">
                <h2 class="text-xs font-black uppercase tracking-[0.3em] text-cyan-500">les pecheurs</h2>
                <a href="#" class="text-[9px] font-bold text-slate-500 border-b border-slate-800">Voir tout</a>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-8 gap-4">
                <?php if(!empty($results)): ?>
                     <?php var_dump($results) ?>
                <?php foreach($results as $result): ?>
                <div class="ultra-glass p-4 rounded-3xl text-center card-hover transition-all cursor-pointer">
                    <div class="w-16 h-16 bg-gradient-to-br from-cyan-500 to-blue-700 rounded-2xl mx-auto mb-4 flex items-center justify-center shadow-lg shadow-cyan-500/20">
                        <img src="<?= $result->getPhotoPecheur(); ?>" alt="image" class="w-16 h-16 rounded-full object-cover">
                    </div>
                    <h3 class="font-bold text-sm"></h3>
                    <p class="text-[9px] text-slate-500 uppercase mt-1"><?= $result->getNom(); ?></p>
                </div>
                <?php endforeach; ?>
                <!-- -->
                    <!-- <p>No results found.</p> -->
                 <?php endif;?>   
                </div>

            </div>
        </section>







        <section>
            <div class="flex justify-between items-end mb-6">
                <h2 class="text-xs font-black uppercase tracking-[0.3em] text-cyan-500">Équipes de Légende</h2>
                <a href="#" class="text-[9px] font-bold text-slate-500 border-b border-slate-800">Voir tout</a>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="ultra-glass p-4 rounded-3xl text-center card-hover transition-all cursor-pointer">
                    <div class="w-16 h-16 bg-gradient-to-br from-cyan-500 to-blue-700 rounded-2xl mx-auto mb-4 flex items-center justify-center shadow-lg shadow-cyan-500/20">
                        <i class="fa-solid fa-shield-halved text-2xl text-black"></i>
                    </div>
                    <h3 class="font-bold text-sm">Atlantic Kings</h3>
                    <p class="text-[9px] text-slate-500 uppercase mt-1">12 Membres • Casablanca</p>
                </div>
                <div class="ultra-glass p-4 rounded-3xl text-center card-hover transition-all cursor-pointer">
                    <div class="w-16 h-16 bg-slate-800 rounded-2xl mx-auto mb-4 flex items-center justify-center">
                        <i class="fa-solid fa-anchor text-2xl text-cyan-500"></i>
                    </div>
                    <h3 class="font-bold text-sm">Souss Predators</h3>
                    <p class="text-[9px] text-slate-500 uppercase mt-1">8 Membres • Agadir</p>
                </div>
            </div>
        </section>

        <section>
            <h2 class="text-xs font-black uppercase tracking-[0.3em] text-cyan-500 mb-6">Hot Spots 🔥</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="relative h-48 rounded-[30px] overflow-hidden group cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1505118380757-91f5f45d8de4?auto=format&fit=crop&q=80&w=500" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-transparent"></div>
                    <div class="absolute bottom-6 left-6">
                        <h3 class="font-black uppercase text-lg">Dakhla Lagoon</h3>
                        <p class="text-[10px] text-cyan-400 font-bold tracking-widest italic">Bar, Courbine, Dorade</p>
                    </div>
                    <div class="absolute top-4 right-4 bg-black/40 backdrop-blur-md px-3 py-1 rounded-full text-[9px] font-black uppercase">
                        <i class="fa-solid fa-location-dot mr-1"></i> Sud
                    </div>
                </div>
            </div>
        </section>

        <!-- ajout de la section pour les competitions    -->
        <section>
            <h2 class="text-xs font-black uppercase tracking-[0.3em] text-cyan-500 mb-6">Compétitions</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="ultra-glass p-4 rounded-3xl text-center card-hover transition-all cursor-pointer">
                    <h3 class="font-bold text-sm">Tournoi de Pêche Sportive 2023</h3>
                    <p class="text-[9px] text-slate-500 uppercase mt-1">Casablanca</p>
                </div>
            </div>
        </section>

    </main>



    <script>
        function switchTab(btn) {
            // Reset all buttons
            const buttons = btn.parentElement.querySelectorAll('button');
            buttons.forEach(b => {
                b.classList.remove('tab-active');
                b.classList.add('text-slate-500');
            });
            // Set active
            btn.classList.add('tab-active');
            btn.classList.remove('text-slate-500');
        }
    </script>

</body>

</html>