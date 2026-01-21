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
    </style>
</head>

<body class="antialiased">

<nav class="fixed top-0 w-full z-[100] p-6">
    <div class="max-w-[1600px] mx-auto ultra-glass rounded-full px-8 py-4 flex justify-between items-center">
        <div class="flex items-center gap-2">
            <div class="w-10 h-10 bg-cyan-500 rounded-full flex items-center justify-center">
                <i class="fa-solid fa-fish-fins text-black"></i>
            </div>
            <span class="text-2xl font-black uppercase">
                Fish<span class="text-cyan-400">Masters</span>
                <span class="text-xs text-slate-400 ml-2">ADMIN</span>
            </span>
        </div>
        <button class="text-xs font-bold px-6 py-2 bg-cyan-500 text-black rounded-full neo-button uppercase">
            Logout
        </button>
    </div>
</nav>

<div class="flex pt-32 max-w-[1600px] mx-auto px-6 gap-6">

    <aside class="w-72 ultra-glass rounded-[30px] p-6 space-y-6 sticky top-32 h-[calc(100vh-10rem)]">
        <h3 class="text-xs font-bold uppercase tracking-widest text-cyan-400">Administration</h3>

        <nav class="space-y-2 text-sm" id="sidebar">
            <button data-section="dashboard" class="sidebar-link w-full flex items-center gap-3 p-3 rounded-xl bg-white/5">
                <i class="fa-solid fa-chart-line"></i> Dashboard
            </button>
            <button data-section="competitions" class="sidebar-link w-full flex items-center gap-3 p-3 rounded-xl">
                <i class="fa-solid fa-trophy"></i> Compétitions
            </button>
            <button data-section="catches" class="sidebar-link w-full flex items-center gap-3 p-3 rounded-xl">
                <i class="fa-solid fa-fish"></i> Prises
            </button>
            <button data-section="species" class="sidebar-link w-full flex items-center gap-3 p-3 rounded-xl">
                <i class="fa-solid fa-water"></i> Espèces
            </button>
            <button data-section="fishermen" class="sidebar-link w-full flex items-center gap-3 p-3 rounded-xl">
                <i class="fa-solid fa-user"></i> Pêcheurs
            </button>
            <button data-section="settings" class="sidebar-link w-full flex items-center gap-3 p-3 rounded-xl">
                <i class="fa-solid fa-gear"></i> Paramètres
            </button>
        </nav>
    </aside>

    <main class="flex-1 space-y-10">

        <section id="dashboard" class="admin-section">
            <h2 class="text-3xl font-black mb-6">Dashboard</h2>
            <div class="grid lg:grid-cols-4 gap-6">
                <div class="ultra-glass p-6 rounded-[30px]">
                    <p class="text-xs uppercase text-slate-400">Compétitions</p>
                    <p class="text-3xl font-black">42</p>
                </div>
                <div class="ultra-glass p-6 rounded-[30px]">
                    <p class="text-xs uppercase text-slate-400">Pêcheurs</p>
                    <p class="text-3xl font-black">1,248</p>
                </div>
                <div class="ultra-glass p-6 rounded-[30px]">
                    <p class="text-xs uppercase text-slate-400">Espèces</p>
                    <p class="text-3xl font-black">67</p>
                </div>
                <div class="ultra-glass p-6 rounded-[30px]">
                    <p class="text-xs uppercase text-slate-400">No-Kill</p>
                    <p class="text-3xl font-black text-cyan-400">91%</p>
                </div>
            </div>
        </section>

        <!-- COMPETITIONS -->
        <section id="competitions" class="admin-section hidden">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-black">Compétitions</h2>

        <!-- ADD COMPETITION -->
        <a href="admin_competition_create.php"
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

                <!-- ROW -->
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

                <!-- ROW -->
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


        <!-- CATCHES -->
        <section id="catches" class="admin-section hidden">
            <h2 class="text-3xl font-black mb-6">Prises</h2>
            <div class="ultra-glass p-8 rounded-[40px]">
                Validation et contrôle des prises
            </div>
        </section>

        <!-- SPECIES -->
        <section id="species" class="admin-section hidden">
            <div class="flex justify-between mb-6">
                <h2 class="text-3xl font-black">Espèces</h2>
                <button class="bg-cyan-500 text-black text-xs font-bold px-6 py-2 rounded-full neo-button uppercase">
                    + Ajouter espèce
                </button>
            </div>

            <div class="grid lg:grid-cols-2 gap-6">
                <!-- Freshwater -->
                <div class="ultra-glass p-8 rounded-[40px]">
                    <h3 class="font-bold uppercase mb-4 text-cyan-400">Eau douce</h3>
                    <ul class="space-y-2 text-sm text-slate-300">
                        <li>Carpe commune</li>
                        <li>Black Bass</li>
                        <li>Sandre</li>
                        <li>Brochet</li>
                        <li>Truite</li>
                    </ul>
                </div>

                <!-- Sea -->
                <div class="ultra-glass p-8 rounded-[40px]">
                    <h3 class="font-bold uppercase mb-4 text-cyan-400">Mer</h3>
                    <ul class="space-y-2 text-sm text-slate-300">
                        <li>Dorade royale</li>
                        <li>Bar / Loup</li>
                        <li>Thon rouge</li>
                        <li>Sériole</li>
                        <li>Maquereau</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- FISHERMEN -->
        <section id="fishermen" class="admin-section hidden">
            <h2 class="text-3xl font-black mb-6">Pêcheurs</h2>
            <div class="ultra-glass p-8 rounded-[40px]">
                Gestion des profils pêcheurs
            </div>
        </section>

        <!-- SETTINGS -->
        <section id="settings" class="admin-section hidden">
            <h2 class="text-3xl font-black mb-6">Paramètres</h2>
            <div class="ultra-glass p-8 rounded-[40px]">
                Sécurité, rôles, sessions, permissions
            </div>
        </section>

    </main>
</div>

<!-- FOOTER -->
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

            sections.forEach(section => section.classList.add('hidden'));
            document.getElementById(target).classList.remove('hidden');

            links.forEach(l => l.classList.remove('bg-white/5','text-cyan-400'));
            link.classList.add('bg-white/5','text-cyan-400');
        });
    });
</script>

</body>
</html>
``
