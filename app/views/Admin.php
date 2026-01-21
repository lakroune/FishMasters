<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FISHMASTERS X — Admin Panel</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;500;700&family=Outfit:wght@100;400;900&display=swap');
        :root { --accent: #00f2ff; --bg: #02040a; }
        body { font-family: 'Outfit', sans-serif; background-color: var(--bg); color: #fff; }

        .ultra-glass {
            background: rgba(255,255,255,0.02);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255,255,255,0.05);
            box-shadow: 0 25px 50px -12px rgba(0,0,0,0.5);
        }

        .neo-button {
            transition: all .4s cubic-bezier(.23,1,.32,1);
        }
        .neo-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 0 20px rgba(0,242,255,.4);
        }
        
        .sidebar-link.active {
            background: rgba(255,255,255,0.05);
            color: #00f2ff;
        }

        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: rgba(0,242,255,0.2); border-radius: 10px; }
    </style>
</head>

<body class="antialiased">

<nav class="fixed top-0 w-full z-[100] p-6">
    <div class="max-w-[1600px] mx-auto ultra-glass rounded-full px-8 py-4 flex justify-between items-center">
        <div class="flex items-center gap-2">
            <div class="w-10 h-10 bg-cyan-500 rounded-full flex items-center justify-center">
                <i class="fa-solid fa-fish-fins text-black"></i>
            </div>
            <span class="text-2xl font-black uppercase tracking-tighter">
                Fish<span class="text-cyan-400">Masters</span>
                <span class="text-[10px] bg-white/10 px-2 py-1 rounded ml-2 text-slate-400">V.2.0</span>
            </span>
        </div>
        <div class="flex items-center gap-6">
            <div class="hidden md:flex flex-col text-right">
                <span class="text-[10px] font-bold text-cyan-400 uppercase">Administrateur</span>
                <span class="text-xs">Resp. Fédération</span>
            </div>
            <button class="text-xs font-bold px-6 py-2 bg-white/5 border border-white/10 hover:bg-red-500/20 hover:border-red-500/50 transition-all rounded-full uppercase">
                Logout
            </button>
        </div>
    </div>
</nav>

<div class="flex pt-32 max-w-[1600px] mx-auto px-6 gap-6">

    <aside class="w-72 ultra-glass rounded-[30px] p-6 space-y-6 sticky top-32 h-[calc(100vh-10rem)]">
        <h3 class="text-xs font-bold uppercase tracking-[0.2em] text-cyan-400/60 pl-3">Menu Principal</h3>

        <nav class="space-y-2 text-sm" id="sidebar">
            <button data-section="dashboard" class="sidebar-link active w-full flex items-center gap-3 p-4 rounded-2xl transition-all">
                <i class="fa-solid fa-chart-line"></i> Dashboard
            </button>
            <button data-section="competitions" class="sidebar-link w-full flex items-center gap-3 p-4 rounded-2xl transition-all">
                <i class="fa-solid fa-trophy"></i> Compétitions
            </button>
            <button data-section="species" class="sidebar-link w-full flex items-center gap-3 p-4 rounded-2xl transition-all text-cyan-400">
                <i class="fa-solid fa-dna"></i> Gestion Espèces
            </button>
            <button data-section="catches" class="sidebar-link w-full flex items-center gap-3 p-4 rounded-2xl transition-all">
                <i class="fa-solid fa-clipboard-check"></i> Prises & Photos
            </button>
            <button data-section="fishermen" class="sidebar-link w-full flex items-center gap-3 p-4 rounded-2xl transition-all">
                <i class="fa-solid fa-users-gear"></i> Pêcheurs
            </button>
            <div class="pt-4 mt-4 border-t border-white/5">
                <button data-section="settings" class="sidebar-link w-full flex items-center gap-3 p-4 rounded-2xl transition-all opacity-50">
                    <i class="fa-solid fa-gears"></i> Paramètres
                </button>
            </div>
        </nav>
    </aside>

    <main class="flex-1 space-y-10 pb-20">

        <section id="dashboard" class="admin-section">
            <h2 class="text-4xl font-black mb-8 italic">VUE <span class="text-cyan-400">D'ENSEMBLE</span></h2>
            
            <div class="grid lg:grid-cols-4 gap-6 mb-8">
                <div class="ultra-glass p-6 rounded-[30px] border-l-4 border-cyan-500">
                    <p class="text-[10px] uppercase text-slate-400 font-bold mb-1">Total Prises</p>
                    <p class="text-4xl font-black">1,420</p>
                    <p class="text-[10px] text-green-400 mt-2 font-bold"><i class="fa-solid fa-arrow-up"></i> +12%</p>
                </div>
                <div class="ultra-glass p-6 rounded-[30px]">
                    <p class="text-[10px] uppercase text-slate-400 font-bold mb-1">Poids (Biomasse)</p>
                    <p class="text-4xl font-black">2.1 <span class="text-lg font-light text-slate-400 uppercase">Tonnes</span></p>
                </div>
                <div class="ultra-glass p-6 rounded-[30px]">
                    <p class="text-[10px] uppercase text-slate-400 font-bold mb-1">Moyenne Points</p>
                    <p class="text-4xl font-black">412</p>
                    <p class="text-[10px] text-slate-500 mt-2 italic font-medium">Par participant</p>
                </div>
                <div class="ultra-glass p-6 rounded-[30px] border-l-4 border-green-400">
                    <p class="text-[10px] uppercase text-slate-400 font-bold mb-1">Efficacité No-Kill</p>
                    <p class="text-4xl font-black text-green-400">94%</p>
                </div>
            </div>


            <div class="grid lg:grid-cols-2 gap-6">

        </section>

        <section id="competitions" class="admin-section hidden">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-black">Compétitions</h2>

        <a href="addCompetition"
           class="bg-cyan-500 text-black text-xs font-bold px-6 py-3 rounded-full neo-button uppercase">
            + Ajouter une compétition
        </a>
    </div>

    <div class="ultra-glass p-8 rounded-[40px] overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="border-b border-white/10 text-slate-500 uppercase text-xs">
                <tr>
                    <th class="text-left py-3">Nom</th>
                    <th>Type</th>
                    <th>Technique</th>
                    <th>Environnement</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th class="text-right">Actions</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-white/5">

                <tr class="hover:bg-white/5 transition">
                    <td class="py-4 font-bold">Grand Prix de Dakhla</td>
                    <td>Mer</td>
                    <td>Surfcasting</td>
                    <td>Plage</td>
                    <td>14/10/2026</td>
                    <td class="text-cyan-400 font-bold">Ouverte</td>
                    <td class="text-right space-x-3">
                        <a href="admin_competition_edit.php?id=1"
                           class="text-cyan-400 hover:underline">
                            Modifier
                        </a>
                        <a href="admin_competition_delete.php?id=1"
                           class="text-red-500 hover:underline"
                           onclick="return confirm('Supprimer cette compétition ?')">
                            Supprimer
                        </a>
                    </td>
                </tr>

                <tr class="hover:bg-white/5 transition">
                    <td class="py-4 font-bold">Bin El Ouidane Cup</td>
                    <td>Eau douce</td>
                    <td>Black Bass</td>
                    <td>Barrage</td>
                    <td>28/10/2026</td>
                    <td class="text-yellow-400 font-bold">À venir</td>
                    <td class="text-right space-x-3">
                        <a href="admin_competition_edit.php?id=2"
                           class="text-cyan-400 hover:underline">
                            Modifier
                        </a>
                        <a href="admin_competition_delete.php?id=2"
                           class="text-red-500 hover:underline"
                           onclick="return confirm('Supprimer cette compétition ?')">
                            Supprimer
                        </a>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</section>

        <section id="catches" class="admin-section hidden">
            <h2 class="text-3xl font-black mb-6">Prises</h2>
            <div class="ultra-glass p-8 rounded-[40px]">
                Validation et contrôle des prises
            </div>
        </section>

        <section id="species" class="admin-section hidden">
            <div class="flex justify-between mb-6">
                <h2 class="text-3xl font-black">Espèces</h2>
                <button class="bg-cyan-500 text-black text-xs font-bold px-6 py-2 rounded-full neo-button uppercase">
                    + Ajouter espèce
                </button>
            </div>

            <div class="grid lg:grid-cols-2 gap-6">


                <div class="ultra-glass p-8 rounded-[40px]">
                    <h3 class="text-xl font-black mb-6 flex items-center gap-3 underline decoration-cyan-500 underline-offset-8">
                        Records de Saison
                    </h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-white/5 rounded-2xl border border-white/5">
                            <div>
                                <p class="text-[10px] text-slate-400 uppercase font-black">Record Espèce</p>
                                <p class="font-bold text-lg">Thon Rouge — 142 kg</p>
                            </div>
                            <span class="text-[10px] bg-cyan-500 text-black px-3 py-1 rounded font-black">SAHARA</span>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-white/5 rounded-2xl border border-white/5">
                            <div>
                                <p class="text-[10px] text-slate-400 uppercase font-black">MVP Actuel</p>
                                <p class="font-bold text-lg">Mehdi Bensaid</p>
                            </div>
                            <p class="font-black text-cyan-400 text-xl tracking-tighter">4,120 PTS</p>
                        </div>
                    </div>
                </div>

                <div class="ultra-glass p-8 rounded-[40px]">
                    <h3 class="text-xl font-black mb-6">Activité par Milieu</h3>
                    <div class="space-y-8 mt-4">
                        <div>
                            <div class="flex justify-between mb-3 items-end">
                                <span class="text-[10px] font-black uppercase tracking-widest flex items-center gap-2">
                                    <i class="fa-solid fa-anchor text-blue-400"></i> Zone Maritime
                                </span>
                                <span class="text-xl font-black italic">65%</span>
                            </div>
                            <div class="w-full h-3 bg-white/5 rounded-full p-1 border border-white/10">
                                <div class="h-full bg-gradient-to-r from-blue-600 to-cyan-400 rounded-full" style="width: 65%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between mb-3 items-end">
                                <span class="text-[10px] font-black uppercase tracking-widest flex items-center gap-2">
                                    <i class="fa-solid fa-tree text-green-400"></i> Eaux Intérieures
                                </span>
                                <span class="text-xl font-black italic">35%</span>
                            </div>
                            <div class="w-full h-3 bg-white/5 rounded-full p-1 border border-white/10">
                                <div class="h-full bg-gradient-to-r from-green-600 to-emerald-400 rounded-full" style="width: 35%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="species" class="admin-section hidden">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
                <div>
                    <h2 class="text-4xl font-black italic">GESTION DES <span class="text-cyan-400">ESPÈCES</span></h2>
                    <p class="text-slate-500 text-[10px] font-black uppercase tracking-[0.3em]">Règlementation & Barème de Points</p>
                </div>
                <button class="bg-cyan-500 text-black text-xs font-black px-8 py-4 rounded-2xl neo-button uppercase flex items-center gap-3">
                    <i class="fa-solid fa-plus-circle text-lg"></i> Ajouter une espèce
                </button>
            </div>

            

            <div class="ultra-glass rounded-[40px] overflow-hidden border border-white/5 shadow-2xl">
                <table class="w-full text-left">
                    <thead class="bg-white/[0.03]">
                        <tr class="text-slate-500 uppercase text-[10px] font-black tracking-widest border-b border-white/5">
                            <th class="px-8 py-6">Dénomination</th>
                            <th class="px-6 py-6 text-center">Catégorie</th>
                            <th class="px-6 py-6 text-center">Taille Min.</th>
                            <th class="px-6 py-6 text-center">Coeff. Multiplicateur</th>
                            <th class="px-8 py-6 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        <tr class="group hover:bg-cyan-500/[0.02] transition-all">
                            <td class="px-8 py-5">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-cyan-500/10 to-transparent flex items-center justify-center border border-white/5 group-hover:border-cyan-500/50 transition-all">
                                        <i class="fa-solid fa-fish text-cyan-400"></i>
                                    </div>
                                    <div>
                                        <p class="font-bold text-slate-100">Dorade Royale</p>
                                        <p class="text-[10px] text-slate-500 italic uppercase">Sparidae</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-5 text-center">
                                <span class="px-3 py-1 rounded-lg bg-blue-500/10 text-blue-400 text-[9px] font-black border border-blue-500/20 uppercase">Mer</span>
                            </td>
                            <td class="px-6 py-5 text-center font-mono font-bold text-slate-300">23 cm</td>
                            <td class="px-6 py-5 text-center">
                                <span class="text-cyan-400 font-black italic text-xl">x 1.3</span>
                            </td>
                            <td class="px-8 py-5">
                                <div class="flex justify-end gap-2 opacity-30 group-hover:opacity-100 transition-opacity">
                                    <button class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center hover:bg-cyan-500 hover:text-black transition-all">
                                        <i class="fa-solid fa-edit"></i>
                                    </button>
                                    <button class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center hover:bg-red-500 transition-all">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="group hover:bg-green-500/[0.02] transition-all">
                            <td class="px-8 py-5">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-green-500/10 to-transparent flex items-center justify-center border border-white/5 group-hover:border-green-500/50 transition-all">
                                        <i class="fa-solid fa-water text-green-400"></i>
                                    </div>
                                    <div>
                                        <p class="font-bold text-slate-100">Black Bass</p>
                                        <p class="text-[10px] text-slate-500 italic uppercase">Centrarchidae</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-5 text-center">
                                <span class="px-3 py-1 rounded-lg bg-green-500/10 text-green-400 text-[9px] font-black border border-green-500/20 uppercase">Eau Douce</span>
                            </td>
                            <td class="px-6 py-5 text-center font-mono font-bold text-slate-300">30 cm</td>
                            <td class="px-6 py-5 text-center">
                                <span class="text-cyan-400 font-black italic text-xl">x 1.5</span>
                            </td>
                            <td class="px-8 py-5 text-right">
                                <div class="flex justify-end gap-2 opacity-30 group-hover:opacity-100 transition-opacity">
                                    <button class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center hover:bg-cyan-500 hover:text-black transition-all">
                                        <i class="fa-solid fa-edit"></i>
                                    </button>
                                    <button class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center hover:bg-red-500 transition-all">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <section id="competitions" class="admin-section hidden">
            <h2 class="text-4xl font-black mb-6">COMPÉTITIONS</h2>
            <div class="ultra-glass p-12 rounded-[40px] border border-dashed border-white/20 text-center">
                <i class="fa-solid fa-trophy text-6xl text-slate-700 mb-4"></i>
                <p class="text-slate-500">Module de gestion des tournois en cours de chargement...</p>
            </div>
        </section>

        <section id="catches" class="admin-section hidden">
            <h2 class="text-4xl font-black mb-6 italic">VALIDATION <span class="text-cyan-400">PRISES</span></h2>
            <div class="grid grid-cols-3 gap-6">
                <div class="ultra-glass p-4 rounded-3xl animate-pulse">
                    <div class="aspect-video bg-white/5 rounded-2xl mb-4"></div>
                    <div class="h-4 w-2/3 bg-white/10 rounded mb-2"></div>
                    <div class="h-3 w-1/2 bg-white/5 rounded"></div>
                </div>
            </div>
        </section>

        <section id="fishermen" class="admin-section hidden">
            <h2 class="text-4xl font-black mb-6 italic italic">BASE <span class="text-cyan-400">PÊCHEURS</span></h2>
            <div class="ultra-glass p-8 rounded-[40px]">

                <p class="text-slate-400 italic">Analyse des 250 licenciés actifs sur la plateforme.</p>

           
            </div>
        </section>

        <section id="settings" class="admin-section hidden">
            <h2 class="text-3xl font-black mb-6">Paramètres</h2>
            <div class="ultra-glass p-8 rounded-[40px]">
                Sécurité, rôles, sessions, permissions

            </div>
        </section>

    </main>
</div>


<footer class="mt-20 py-12 border-t border-white/5 text-center">
    <div class="flex flex-col items-center gap-4">
        <div class="flex gap-6 text-slate-600 text-lg">
            <i class="fa-brands fa-instagram hover:text-cyan-400 cursor-pointer"></i>
            <i class="fa-brands fa-facebook hover:text-cyan-400 cursor-pointer"></i>
            <i class="fa-brands fa-linkedin hover:text-cyan-400 cursor-pointer"></i>
        </div>
        <p class="text-[10px] font-bold tracking-[0.8em] text-slate-500 uppercase">
            Fédération Royale Marocaine de Pêche Sportive © 2026
        </p>
    </div>

<footer class="mt-24 py-12 border-t border-white/5 text-center">
    <p class="text-[10px] font-bold tracking-[0.6em] text-slate-600 uppercase">
        Fédération Royale Marocaine de Pêche Sportive © 2026
    </p>

</footer>

<script>
    const links = document.querySelectorAll('.sidebar-link');
    const sections = document.querySelectorAll('.admin-section');

    links.forEach(link => {
        link.addEventListener('click', () => {
            const target = link.dataset.section;

            // Masquer toutes les sections
            sections.forEach(section => {
                section.classList.add('hidden');
            });

            // Afficher la section cible
            const targetSection = document.getElementById(target);
            if(targetSection) {
                targetSection.classList.remove('hidden');
                // Scroll smooth to top of content
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }

            // Gérer les classes actives sur le menu
            links.forEach(l => {
                l.classList.remove('bg-white/5','text-cyan-400', 'active');
            });
            link.classList.add('bg-white/5','text-cyan-400', 'active');
        });
    });

    // Animation au chargement pour la première section
    window.addEventListener('load', () => {
        document.getElementById('dashboard').classList.remove('hidden');
    });
</script>

</body>
</html>