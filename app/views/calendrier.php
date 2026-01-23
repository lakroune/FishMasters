<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendrier des Compétitions — FISHMASTERS X</title>
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
        }

        .font-mono {
            font-family: 'Space Grotesk', sans-serif;
        }

        /* Glassmorphism 2026 */
        .ultra-glass {
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        .neo-button {
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .neo-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 0 20px rgba(0, 242, 255, 0.4);
        }

        .stat-glow {
            text-shadow: 0 0 15px rgba(0, 242, 255, 0.5);
        }

        /* Bento Layout Custom */
        .bento-header {
            grid-area: h;
        }

        .bento-live {
            grid-area: l;
        }

        .bento-rank {
            grid-area: r;
        }

        .bento-stats {
            grid-area: s;
        }

        .custom-grid {
            display: grid;
            grid-template-areas: "h h l" "r s l";
            grid-template-columns: 1fr 1fr 0.8fr;
            gap: 1.5rem;
        }

        @media (max-width: 1024px) {
            .custom-grid {
                grid-template-areas: "h" "l" "r" "s";
                grid-template-columns: 1fr;
            }
        }

        /* Filtres actifs */
        .filter-active {
            background: #00f2ff !important;
            color: #000 !important;
            box-shadow: 0 0 15px rgba(0, 242, 255, 0.5);
        }

        /* Animation pour les événements à venir */
        @keyframes pulse-glow {

            0%,
            100% {
                box-shadow: 0 0 5px rgba(0, 242, 255, 0.3);
            }

            50% {
                box-shadow: 0 0 20px rgba(0, 242, 255, 0.6);
            }
        }

        .upcoming-event {
            animation: pulse-glow 2s infinite;
        }

        /* Badges de type de compétition */
        .badge-mer {
            background: linear-gradient(135deg, #00f2ff20, #0066ff20);
            border-left: 4px solid #00f2ff;
        }

        .badge-lac {
            background: linear-gradient(135deg, #00ffaa20, #00cc8820);
            border-left: 4px solid #00ffaa;
        }

        .badge-barrage {
            background: linear-gradient(135deg, #ffaa0020, #ff660020);
            border-left: 4px solid #ffaa00;
        }

        .badge-riviere {
            background: linear-gradient(135deg, #aa00ff20, #6600cc20);
            border-left: 4px solid #aa00ff;
        }
    </style>
</head>

<body class="antialiased selection:bg-cyan-500 selection:text-black">

    <?php include "header.php"; ?>
    <main class="max-w-[1600px] mx-auto px-6 pt-32 space-y-16">

        <!-- En-tête du calendrier -->
        <section>
            <div class="ultra-glass p-12 rounded-[40px] flex flex-col justify-center relative overflow-hidden">
                <div class="absolute top-0 right-0 p-8 opacity-10 text-9xl font-black italic">2026</div>
                <h1 class="text-7xl font-black leading-none mb-6">CALENDRIER <br> <span class="text-cyan-500">DES COMPÉTITIONS</span></h1>
                <p class="text-slate-400 max-w-2xl mb-8">Consultez toutes les compétitions de pêche sportive 2026 au Maroc : dates, lieux (mer, lacs, barrages, rivières) et types de compétitions. Filtrez et inscrivez-vous aux événements.</p>
                <div class="flex flex-wrap gap-4">
                    <div class="flex items-center">
                        <div class="w-4 h-4 rounded-full bg-cyan-500 mr-2"></div>
                        <span class="text-sm">Mer</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-4 h-4 rounded-full bg-emerald-500 mr-2"></div>
                        <span class="text-sm">Rivière</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Filtres -->
        <section>
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-4xl font-black uppercase">Filtrer par <span class="text-cyan-500">Type</span></h2>
                <div class="text-slate-400 text-sm">
                    <span id="event-count">12</span> compétitions programmées
                </div>
            </div>

            <div class="flex flex-wrap gap-3">
                <button class="filter-btn px-6 py-3 ultra-glass rounded-full text-sm font-bold hover:bg-cyan-500 hover:text-black transition filter-active" data-filter="all">TOUTES LES COMPÉTITIONS</button>
                <button class="filter-btn px-6 py-3 ultra-glass rounded-full text-sm font-bold hover:bg-cyan-500 hover:text-black transition" data-filter="mer"><i class="fa-solid fa-water mr-2"></i> MER</button>
                <button class="filter-btn px-6 py-3 ultra-glass rounded-full text-sm font-bold hover:bg-cyan-500 hover:text-black transition" data-filter="lac"><i class="fa-solid fa-water mr-2"></i> LACS</button>
                <button class="filter-btn px-6 py-3 ultra-glass rounded-full text-sm font-bold hover:bg-cyan-500 hover:text-black transition" data-filter="barrage"><i class="fa-solid fa-dam mr-2"></i> BARRAGES</button>
                <button class="filter-btn px-6 py-3 ultra-glass rounded-full text-sm font-bold hover:bg-cyan-500 hover:text-black transition" data-filter="riviere"><i class="fa-solid fa-water mr-2"></i> RIVIÈRES</button>
                <button class="filter-btn px-6 py-3 ultra-glass rounded-full text-sm font-bold hover:bg-cyan-500 hover:text-black transition" data-filter="upcoming"><i class="fa-solid fa-bolt mr-2"></i> À VENIR</button>
            </div>
        </section>

        <!-- Calendrier des compétitions -->
        <section id="calendar">
            <div class="grid lg:grid-cols-2 gap-6">

                <?php foreach ($competitions as $competition) {
                    $debut = new DateTime($competition->getDateDebut());
                    $fin = new DateTime($competition->getDateFin());
                    $interval = $debut->diff($fin);
                    $duree = $interval->days;
                ?>

                    <div class="ultra-glass p-8 rounded-[35px] flex flex-col group cursor-pointer hover:border-cyan-500/50 transition duration-500 competition-item" data-types="mer" data-upcoming="true">
                        <div class="flex items-start justify-between mb-6">
                            <div class="w-20 h-20 bg-cyan-500/10 rounded-3xl flex flex-col items-center justify-center border border-cyan-500/20">
                                <span class="text-2xl font-black"><?= $duree ?></span>
                                <span class="text-[10px] uppercase font-bold">jours</span>
                            </div>
                            <div class="flex flex-col items-end space-y-2">
                                <span class="px-3 py-1 bg-cyan-500/20 text-cyan-400 rounded-full text-xs font-bold uppercase"><?= $competition->getType() ?></span>
                                <div class="flex items-center text-slate-500 text-sm">
                                    <i class="fa-solid fa-users mr-1"></i>
                                    <span><?= $competition->getNbParticipants() ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-6">
                            <span class="text-cyan-500 text-[10px] font-bold uppercase tracking-widest">Mer • Atlantique</span>
                            <h4 class="text-2xl font-black uppercase group-hover:text-cyan-400 transition"><?= $competition->getNom() ?></h4>
                            <p class="text-sm text-slate-500 font-medium mb-4">Plage d'Oum El Bouir, Dakhla • Eaux libres</p>
                            <p class="text-slate-400 text-sm">de <?= $competition->getDateDebut() ?> a <?= $competition->getDateFin() ?></p>
                        </div>

                        <div class="flex justify-between items-center mt-auto">
                            <div class="flex items-center">
                                <i class="fa-solid fa-trophy text-amber-500 mr-2"></i>
                                <span class="text-xs font-bold">Prix: 25.000 DH</span>
                            </div>
                            <button class="bg-cyan-500 text-black text-xs font-bold px-6 py-3 rounded-full uppercase neo-button">S'inscrire</button>
                        </div>
                    </div>
                <?php } ?>
        </section>

        <section class="grid lg:grid-cols-2 gap-20">
            <div class="ultra-glass p-8 rounded-[40px]">
                <div class="flex items-center">
                    <div class="w-16 h-16 bg-cyan-500/20 rounded-3xl flex items-center justify-center mr-6">
                        <i class="fa-solid fa-calendar-check text-cyan-500 text-2xl"></i>
                    </div>
                    <div>
                        <p class="text-4xl font-black stat-glow"><?= count($competitions) ?></p>
                        <p class="text-[10px] text-slate-500 uppercase font-bold">Compétitions 2026</p>
                    </div>
                </div>
            </div>

            <div class="ultra-glass p-8 rounded-[40px]">
                <div class="flex items-center">
                    <div class="w-16 h-16 bg-amber-500/20 rounded-3xl flex items-center justify-center mr-6">
                        <i class="fa-solid fa-fish text-amber-500 text-2xl"></i>
                    </div>
                    <div>
                        <?php
                        $autorise = [];

                        foreach ($reglements as $reglement) {
                            $pgarray = $reglement->getEspecesAutorisees();
                            $pgarray = explode(',', trim($pgarray, '{}'));

                            $autorise = array_merge($autorise, $pgarray);
                        }

                        // print_r($autorise);
                        ?>
                        <p class="text-4xl font-black"> <?= count($autorise) ?></p>
                        <p class="text-[10px] text-slate-500 uppercase font-bold">Espèces ciblées</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Carte des lieux -->
        <section class="ultra-glass p-8 rounded-[40px]">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-4xl font-black uppercase">Lieux des <span class="text-cyan-500">Compétitions</span></h2>
                <div class="text-slate-400 text-sm">
                    <i class="fa-solid fa-map mr-2"></i> Carte interactive
                </div>
            </div>

            <div class="grid lg:grid-cols-4 gap-6">
                <?php foreach ($spotsPeches as $spotsPeche) { ?>
                    <div class="p-6 bg-white/5 rounded-3xl border border-white/10">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-cyan-500/20 rounded-2xl flex items-center justify-center mr-4">
                                <i class="fa-solid fa-water text-cyan-500"></i>
                            </div>
                            <div>
                                <p class="font-bold"><?= $spotsPeche->getNomSpot() ?></p>
                                <p class="text-[10px] text-slate-500 uppercase"><?= $spotsPeche->getTypeEau() ?></p>
                            </div>
                        </div>
                        <p class="text-sm text-slate-400"><strong class="text-slate-300 text-[15px]">Localisation:</strong> <?= $spotsPeche->getLocalisation() ?></p>
                    </div>
                <?php } ?>
            </div>
        </section>

    </main>

    <footer class="mt-24 py-12 border-t border-white/5 text-center">
        <p class="text-[10px] font-bold tracking-[0.6em] text-slate-600 uppercase">Fédération Royale Marocaine de Pêche Sportive © 2026</p>
    </footer>

    <script>
        // Interaction Scroll: Navigation se réduit
        window.onscroll = function() {
            const nav = document.querySelector('nav div');
            if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                nav.classList.remove('p-6');
                nav.classList.add('py-2', 'px-6', 'shadow-2xl', 'bg-black/80');
            } else {
                nav.classList.add('p-6');
                nav.classList.remove('py-2', 'px-6', 'shadow-2xl', 'bg-black/80');
            }
        };

        // Filtrage des compétitions
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.filter-btn');
            const competitionItems = document.querySelectorAll('.competition-item');
            const eventCount = document.getElementById('event-count');

            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Retirer la classe active de tous les boutons
                    filterButtons.forEach(btn => btn.classList.remove('filter-active'));

                    // Ajouter la classe active au bouton cliqué
                    this.classList.add('filter-active');

                    const filter = this.getAttribute('data-filter');
                    let visibleCount = 0;

                    // Filtrer les compétitions
                    competitionItems.forEach(item => {
                        const types = item.getAttribute('data-types');
                        const upcoming = item.getAttribute('data-upcoming') === 'true';

                        let shouldShow = false;

                        if (filter === 'all') {
                            shouldShow = true;
                        } else if (filter === 'upcoming') {
                            shouldShow = upcoming;
                        } else {
                            shouldShow = types.includes(filter);
                        }

                        if (shouldShow) {
                            item.style.display = 'flex';
                            visibleCount++;
                        } else {
                            item.style.display = 'none';
                        }
                    });

                    // Mettre à jour le compteur
                    eventCount.textContent = visibleCount;
                });
            });

            // Simuler un clic sur "À VENIR" au chargement
            document.querySelector('[data-filter="upcoming"]').click();
        });
    </script>
</body>

</html>