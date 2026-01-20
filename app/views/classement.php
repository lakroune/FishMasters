<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLASSEMENTS — FISHMASTERS X</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;500;700&family=Outfit:wght@100;400;900&display=swap');

        :root {
            --accent: #00f2ff;
            --bg: #02040a;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--bg);
            color: #fff;
            overflow-x: hidden;
        }

        .ultra-glass {
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        /* Classes pour l'animation des boutons */
        .btn-active {
            background-color: #06b6d4 !important;
            /* cyan-500 */
            color: #000 !important;
            box-shadow: 0 0 20px rgba(6, 182, 212, 0.5);
            transform: scale(1.02);
        }

        .filter-btn {
            transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .rank-gold {
            background: linear-gradient(135deg, #ffd700 0%, #b8860b 100%);
        }

        .rank-silver {
            background: linear-gradient(135deg, #e0e0e0 0%, #757575 100%);
        }

        .rank-bronze {
            background: linear-gradient(135deg, #cd7f32 0%, #8b4513 100%);
        }
    </style>
</head>

<body class="antialiased selection:bg-cyan-500 selection:text-black">

    <nav class="fixed top-0 w-full z-[100] p-6">
        <div class="max-w-[1600px] mx-auto ultra-glass rounded-full px-8 py-4 flex justify-between items-center bg-black/40">
            <div class="flex items-center space-x-2">
                <div class="w-10 h-10 bg-cyan-500 rounded-full flex items-center justify-center">
                    <i class="fa-solid fa-fish-fins text-black"></i>
                </div>
                <span class="text-2xl font-black uppercase tracking-tighter">Fish<span class="text-cyan-400">Masters</span></span>
            </div>
            <div class="hidden lg:flex space-x-8 text-[10px] font-bold uppercase tracking-widest text-slate-400">
                <a href="#" class="hover:text-cyan-400 transition">Accueil</a>
                <a href="#" class="text-cyan-400">Classement</a>
                <a href="#" class="hover:text-cyan-400 transition">Calendrier</a>
            </div>
            <button class="text-[10px] font-black px-6 py-2 bg-white text-black rounded-full uppercase hover:bg-cyan-500 transition">Mon Profil</button>
        </div>
    </nav>

    <main class="max-w-[1400px] mx-auto px-6 pt-32 pb-24">

        <div class="mb-12">
            <h1 class="text-6xl font-black uppercase mb-4 leading-none">Tableau des <br><span class="text-cyan-500">Leaders 2026</span></h1>
            <p class="text-slate-400 max-w-xl">Consultez les performances mondiales. Filtrez par catégorie pour voir qui domine les eaux cette saison.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 mb-12">

            <div id="group-water" class="ultra-glass p-2 rounded-2xl flex gap-1">
                <button onclick="toggleFilter(this, 'group-water')" data-filter="all" class="filter-btn btn-active flex-1 py-3 text-[10px] font-black uppercase rounded-xl">Tous</button>
                <button onclick="toggleFilter(this, 'group-water')" data-filter="mer" class="filter-btn flex-1 py-3 text-[10px] font-black uppercase rounded-xl text-slate-500 hover:bg-white/5">Mer</button>
                <button onclick="toggleFilter(this, 'group-water')" data-filter="eaudouce" class="filter-btn flex-1 py-3 text-[10px] font-black uppercase rounded-xl text-slate-500 hover:bg-white/5">Eau Douce</button>
            </div>

            <div id="group-age" class="ultra-glass p-2 rounded-2xl flex gap-1">
                <button onclick="toggleFilter(this, 'group-age')" data-filter="senior" class="filter-btn btn-active flex-1 py-3 text-[10px] font-black uppercase rounded-xl">Séniors</button>
                <button onclick="toggleFilter(this, 'group-age')" data-filter="junior" class="filter-btn flex-1 py-3 text-[10px] font-black uppercase rounded-xl text-slate-500 hover:bg-white/5">Juniors</button>
            </div>

            <div class="ultra-glass rounded-2xl px-4 flex items-center">
                <i class="fa-solid fa-filter text-cyan-500 mr-3 text-xs"></i>
                <select name="species" class="bg-transparent w-full py-4 text-[10px] font-black uppercase outline-none cursor-pointer">
                    <option class="bg-slate-900">Toutes Espèces</option>
                    <option class="bg-slate-900">Loup de Mer</option>
                    <option class="bg-slate-900">Dorade Royale</option>
                    <option class="bg-slate-900">Black Bass</option>
                </select>
            </div>

            <div class="relative">
                <input type="text" placeholder="RECHERCHER UN NOM..." class="w-full h-full ultra-glass bg-transparent rounded-2xl px-6 py-4 text-[10px] font-black outline-none focus:border-cyan-500/50 transition-all">
                <i class="fa-solid fa-magnifying-glass absolute right-6 top-1/2 -translate-y-1/2 text-slate-500"></i>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16 items-end">
            <div class="ultra-glass p-8 rounded-[40px] text-center relative order-2 md:order-1 h-[320px] flex flex-col justify-center border-t-4 border-slate-400/30 bg-gradient-to-b from-white/5 to-transparent">
                <div class="absolute -top-6 left-1/2 -translate-x-1/2 w-12 h-12 rank-silver rounded-full flex items-center justify-center font-black text-black">2</div>
                <img src="https://i.pravatar.cc/150?u=9" class="w-20 h-20 rounded-full mx-auto mb-4 border-2 border-slate-400 p-1">
                <h3 class="text-xl font-bold">Yassine Reda</h3>
                <p class="text-cyan-400 font-mono text-2xl">16,420 <span class="text-[10px] text-white">PTS</span></p>
            </div>
            <div class="ultra-glass p-8 rounded-[40px] text-center relative order-1 md:order-2 h-[400px] flex flex-col justify-center border-t-4 border-yellow-500 bg-gradient-to-b from-yellow-500/10 to-transparent">
                <div class="absolute -top-10 left-1/2 -translate-x-1/2 w-20 h-20 rank-gold rounded-full flex items-center justify-center font-black text-black text-2xl shadow-[0_0_30px_rgba(255,215,0,0.4)]">1</div>
                <img src="https://i.pravatar.cc/150?u=1" class="w-28 h-28 rounded-full mx-auto mb-6 border-4 border-yellow-500 p-1">
                <h3 class="text-3xl font-black uppercase">Mehdi Benmoussa</h3>
                <p class="text-cyan-400 font-mono text-4xl">18,920 <span class="text-xs text-white">PTS</span></p>
            </div>
            <div class="ultra-glass p-8 rounded-[40px] text-center relative order-3 md:order-3 h-[280px] flex flex-col justify-center border-t-4 border-orange-700/50">
                <div class="absolute -top-6 left-1/2 -translate-x-1/2 w-12 h-12 rank-bronze rounded-full flex items-center justify-center font-black text-black">3</div>
                <img src="https://i.pravatar.cc/150?u=12" class="w-16 h-16 rounded-full mx-auto mb-4 border-2 border-orange-700 p-1">
                <h3 class="text-lg font-bold">Amine Slaoui</h3>
                <p class="text-cyan-400 font-mono text-xl">14,105 <span class="text-[10px] text-white">PTS</span></p>
            </div>
        </div>

        <div class="ultra-glass rounded-[40px] overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-white/5 text-[10px] uppercase tracking-[0.2em] text-slate-500">
                            <th class="p-6">Rang</th>
                            <th class="p-6">Athlète</th>
                            <th class="p-6">Catégorie</th>
                            <th class="p-6">Score</th>
                            <th class="p-6 text-right">Progression</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        <tr class="hover:bg-white/5 transition group">
                            <td class="p-6 font-mono text-slate-500">#04</td>
                            <td class="p-6">
                                <div class="flex items-center space-x-4">
                                    <img src="https://i.pravatar.cc/100?u=4" class="w-10 h-10 rounded-full border border-white/10">
                                    <span class="font-bold">Sara Filali</span>
                                </div>
                            </td>
                            <td class="p-6 text-xs text-slate-400 uppercase font-bold text-[10px]">Junior / Mer</td>
                            <td class="p-6 font-mono text-cyan-400 font-bold">12,840</td>
                            <td class="p-6 text-right text-green-500 text-xs font-bold"><i class="fa-solid fa-caret-up mr-1"></i> 2 pos</td>
                        </tr>
                        <tr class="hover:bg-white/5 transition group">
                            <td class="p-6 font-mono text-slate-500">#05</td>
                            <td class="p-6">
                                <div class="flex items-center space-x-4">
                                    <img src="https://i.pravatar.cc/100?u=5" class="w-10 h-10 rounded-full border border-white/10">
                                    <span class="font-bold">Karim Bennani</span>
                                </div>
                            </td>
                            <td class="p-6 text-xs text-slate-400 uppercase font-bold text-[10px]">Senior / Eau Douce</td>
                            <td class="p-6 font-mono text-cyan-400 font-bold">11,200</td>
                            <td class="p-6 text-right text-red-500 text-xs font-bold"><i class="fa-solid fa-caret-down mr-1"></i> 1 pos</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <form action="<?= PATH_ROOT ?>/classement/filter" method="post">
        <input type="hidden" name="spot" id="filterspot">
        <input type="hidden" name="exper" id="filterexper">
    </form>

    <script>
        function submit() {
            const filter = document.querySelectorAll('.btn-active');
            for (let btn of filter) {
                document.getElementById('filterspot').value = btn.dataset.filter;
                document.getElementById('filterexper').value = btn.dataset.filter;
                document.querySelector('form').submit();
            }
        }




        function toggleFilter(element, groupId) {
            const group = document.getElementById(groupId);
            const buttons = group.getElementsByClassName('filter-btn');

            for (let btn of buttons) {
                btn.classList.remove('btn-active');
                btn.classList.add('text-slate-500', 'hover:bg-white/5');
            }

            element.classList.add('btn-active');
            element.classList.remove('text-slate-500', 'hover:bg-white/5');

            element.style.transform = 'scale(0.95)';
            setTimeout(() => {
                element.style.transform = 'scale(1.02)';
            }, 100);
            submit();
        }
    </script>
</body>

</html>