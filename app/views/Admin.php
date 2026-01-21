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
        .font-mono { font-family: 'Space Grotesk', sans-serif; }

        .ultra-glass {
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        .neo-button {
            transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
        }
        .neo-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 0 20px rgba(0, 242, 255, 0.4);
        }
    </style>
</head>

<body class="antialiased">

<nav class="fixed top-0 w-full z-[100] p-6">
    <div class="max-w-[1600px] mx-auto ultra-glass rounded-full px-8 py-4 flex justify-between items-center">
        <div class="flex items-center space-x-2">
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

    <aside class="w-72 ultra-glass rounded-[30px] p-6 space-y-6 h-[calc(100vh-10rem)] sticky top-32">
        <h3 class="text-xs font-bold uppercase tracking-widest text-cyan-400">Administration</h3>

        <nav class="space-y-2 text-sm" id="sidebar">
            <button data-section="dashboard" class="sidebar-link w-full text-left flex items-center gap-3 p-3 rounded-xl bg-white/5">
                <i class="fa-solid fa-chart-line"></i> Dashboard
            </button>
            <button data-section="competitions" class="sidebar-link w-full text-left flex items-center gap-3 p-3 rounded-xl">
                <i class="fa-solid fa-trophy"></i> Compétitions
            </button>
            <button data-section="catches" class="sidebar-link w-full text-left flex items-center gap-3 p-3 rounded-xl">
                <i class="fa-solid fa-fish"></i> Prises
            </button>
            <button data-section="fishermen" class="sidebar-link w-full text-left flex items-center gap-3 p-3 rounded-xl">
                <i class="fa-solid fa-user"></i> Pêcheurs
            </button>
            <button data-section="settings" class="sidebar-link w-full text-left flex items-center gap-3 p-3 rounded-xl">
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
                    <p class="text-xs uppercase text-slate-400">Prises</p>
                    <p class="text-3xl font-black">8,932</p>
                </div>
                <div class="ultra-glass p-6 rounded-[30px]">
                    <p class="text-xs uppercase text-slate-400">No-Kill</p>
                    <p class="text-3xl font-black text-cyan-400">91%</p>
                </div>
            </div>
        </section>

        <section id="competitions" class="admin-section hidden">
            <h2 class="text-3xl font-black mb-6">Compétitions</h2>
            <div class="ultra-glass p-8 rounded-[40px]">
                <button>Add a Competition </button>
            </div>
        </section>

        <section id="catches" class="admin-section hidden">
            <h2 class="text-3xl font-black mb-6">Prises</h2>
            <div class="ultra-glass p-8 rounded-[40px]">
                <p class="text-slate-400 text-sm">Validation & contrôle des prises</p>
            </div>
        </section>

        <section id="fishermen" class="admin-section hidden">
            <h2 class="text-3xl font-black mb-6">Pêcheurs</h2>
            <div class="ultra-glass p-8 rounded-[40px]">
                <p class="text-slate-400 text-sm">Gestion des profils pêcheurs</p>
            </div>
        </section>

        <section id="settings" class="admin-section hidden">
            <h2 class="text-3xl font-black mb-6">Paramètres</h2>
            <div class="ultra-glass p-8 rounded-[40px]">
                <p class="text-slate-400 text-sm">Paramètres système & sécurité</p>
            </div>
        </section>

    </main>
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

            sections.forEach(section => section.classList.add('hidden'));
            document.getElementById(target).classList.remove('hidden');

            links.forEach(l => l.classList.remove('bg-white/5', 'text-cyan-400'));

            link.classList.add('bg-white/5', 'text-cyan-400');
        });
    });
</script>

</body>
</html>
