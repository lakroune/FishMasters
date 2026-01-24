
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
        body { font-family: 'Outfit', sans-serif; background-color: var(--bg); color: #fff; overflow-x: hidden; }

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
            background: rgba(0, 242, 255, 0.1) !important;
            color: #00f2ff !important;
            border-right: 3px solid #00f2ff;
        }

        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: rgba(0,242,255,0.2); border-radius: 10px; }

        dialog::backdrop {
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(8px);
        }
        
        .modal-input {
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.1);
            color: white;
            width: 100%;
            padding: 1rem;
            border-radius: 1rem;
            outline: none;
            transition: all 0.3s;
        }
        
        .modal-input:focus {
            border-color: #00f2ff;
            background: rgba(255,255,255,0.07);
        }

        /* Utilitaire pour masquer les sections proprement */
        .admin-section { display: none; }
        .admin-section.active-content { display: block; animation: fadeIn 0.4s ease; }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body class="antialiased custom-scrollbar">

<dialog id="addSpeciesModal" class="ultra-glass rounded-[40px] p-0 w-full max-w-lg bg-transparent border-none">
    <div class="p-10 text-white">
        <div class="flex justify-between items-center mb-8">
            <h3 class="text-2xl font-black italic uppercase">Nouvelle <span class="text-cyan-400">Espèce</span></h3>
            <button onclick="document.getElementById('addSpeciesModal').close()" class="text-slate-500 hover:text-white transition-colors">
                <i class="fa-solid fa-xmark text-xl"></i>
            </button>
        </div>

        <form method="POST" action="<?=PATH_ROOT?>/espece/ajauter" class="space-y-6">
            <div class="space-y-2">
                <label class="text-[10px] font-bold uppercase tracking-widest text-cyan-400/60 pl-2">Nom de l'espèce</label>
                <input name="espece" type="text" placeholder="ex: Espadon" class="modal-input" required>
            </div>

            <div class="space-y-2">
                <label class="text-[10px] font-bold uppercase tracking-widest text-cyan-400/60 pl-2">Coefficient Multiplicateur</label>
                <input type="number" name="coaficiant" step="0.1" placeholder="1.2" class="modal-input" required>
            </div>

            <div class="space-y-2">
                <label class="text-[10px] font-bold uppercase tracking-widest text-cyan-400/60 pl-2">Description</label>
                <textarea name="description" placeholder="Détails sur l'habitat..." class="modal-input min-h-[120px] resize-none"></textarea>
            </div>

            <div class="flex gap-4 pt-4">
                <button type="button" onclick="document.getElementById('addSpeciesModal').close()" class="flex-1 py-4 rounded-2xl text-xs font-bold uppercase border border-white/10 hover:bg-white/5 transition-all">Annuler</button>
                <button type="submit" class="flex-1 bg-cyan-500 text-black text-xs font-black py-4 rounded-2xl neo-button uppercase">Enregistrer</button>
            </div>
        </form>
    </div>
</dialog>

<nav class="fixed top-0 w-full z-[100] p-6">
    <div class="max-w-[1600px] mx-auto ultra-glass rounded-full px-8 py-4 flex justify-between items-center">
        <div class="flex items-center gap-2">
            <div class="w-10 h-10 bg-cyan-500 rounded-full flex items-center justify-center">
                <i class="fa-solid fa-fish-fins text-black"></i>
            </div>
            <span class="text-2xl font-black uppercase tracking-tighter">
                Fish<span class="text-cyan-400">Masters</span>
                <span class="text-[10px] bg-white/10 px-2 py-1 rounded ml-2 text-slate-400 uppercase tracking-widest">Admin</span>
            </span>
        </div>
        <div class="flex items-center gap-6">
            <div class="hidden md:flex flex-col text-right border-r border-white/10 pr-6">
                <span class="text-[10px] font-bold text-cyan-400 uppercase">Administrateur</span>
                <span class="text-xs opacity-70">Resp. Fédération</span>
            </div>
            <button class="text-xs font-bold px-6 py-2 bg-white/5 border border-white/10 hover:bg-red-500/20 hover:border-red-500/50 transition-all rounded-full uppercase">Logout</button>
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
            <button data-section="species" class="sidebar-link w-full flex items-center gap-3 p-4 rounded-2xl transition-all">
                <i class="fa-solid fa-dna"></i> Gestion Espèces
            </button>
            <button data-section="catches" class="sidebar-link w-full flex items-center gap-3 p-4 rounded-2xl transition-all">
                <i class="fa-solid fa-clipboard-check"></i> Prises & Photos
            </button>
            <button data-section="fishermen" class="sidebar-link w-full flex items-center gap-3 p-4 rounded-2xl transition-all">
                <i class="fa-solid fa-users-gear"></i> Pêcheurs
            </button>
        </nav>
    </aside>

    <main class="flex-1 space-y-10 pb-20">

        <section id="dashboard" class="admin-section active-content">
            <h2 class="text-4xl font-black mb-8 italic uppercase text-white">Vue <span class="text-cyan-400">D'ensemble</span></h2>
            <div class="grid lg:grid-cols-4 gap-6">
                <div class="ultra-glass p-6 rounded-[30px] border-l-4 border-cyan-500">
                    <p class="text-[10px] uppercase text-slate-400 font-bold mb-1">Total Prises</p>
                    <p class="text-4xl font-black">1,420</p>
                    <p class="text-[10px] text-green-400 mt-2 font-bold"><i class="fa-solid fa-arrow-up"></i> +12%</p>
                </div>
                <div class="ultra-glass p-6 rounded-[30px]">
                    <p class="text-[10px] uppercase text-slate-400 font-bold mb-1">Poids Global</p>
                    <p class="text-4xl font-black">2.1 <span class="text-lg font-light text-slate-400">T</span></p>
                </div>
                <div class="ultra-glass p-6 rounded-[30px]">
                    <p class="text-[10px] uppercase text-slate-400 font-bold mb-1">Moyenne Points</p>
                    <p class="text-4xl font-black">412</p>
                </div>
                <div class="ultra-glass p-6 rounded-[30px] border-l-4 border-green-400">
                    <p class="text-[10px] uppercase text-slate-400 font-bold mb-1">Efficacité No-Kill</p>
                    <p class="text-4xl font-black text-green-400">94%</p>
                </div>
            </div>
        </section>

        <section id="species" class="admin-section">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
                <div>
                    <h2 class="text-4xl font-black italic uppercase">Gestion <span class="text-cyan-400">Espèces</span></h2>
                    <p class="text-slate-500 text-[10px] font-black uppercase tracking-[0.3em]">Paramétrage du barème simplifié</p>
                </div>
                <button onclick="document.getElementById('addSpeciesModal').showModal()" class="bg-cyan-500 text-black text-xs font-black px-8 py-4 rounded-2xl neo-button uppercase flex items-center gap-3">
                    <i class="fa-solid fa-plus-circle text-lg"></i> Ajouter une espèce
                </button>
            </div>

            <div class="ultra-glass rounded-[40px] overflow-hidden">
                <table class="w-full text-left">
                    <thead class="bg-white/[0.03]">
                        <tr class="text-slate-500 uppercase text-[10px] font-black tracking-widest border-b border-white/5">
                            <th class="px-8 py-6">Espèce</th>
                            <th class="px-6 py-6">Description</th>
                            <th class="px-6 py-6 text-center">Coefficient</th>
                            <th class="px-8 py-6 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        <?php if(isset($especes) && count($especes) > 0): ?>
                            <?php foreach($especes as $row): 
                                if($row['id_delete']=='0'):

                               
                                ?>
                            <tr class="group hover:bg-cyan-500/[0.02] transition-all">
                                <td class="px-8 py-5">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 rounded-2xl bg-cyan-500/10 flex items-center justify-center border border-white/5 group-hover:border-cyan-500/50">
                                            <i class="fa-solid fa-fish text-cyan-400"></i>
                                        </div>
                                        <p class="font-bold text-slate-100"><?= htmlspecialchars($row['nom_espece'] ?? 'N/A') ?></p>
                                    </div>
                                </td>
                                <td class="px-6 py-5 text-sm text-slate-400">
                                    <?= htmlspecialchars($row['description'] ?? 'Pas de description') ?>
                                </td>
                                <td class="px-6 py-5 text-center">
                                    <span class="text-cyan-400 font-black italic text-xl">x <?= $row['coefficient'] ?? '1.0' ?></span>
                                </td>
                                <td class="px-8 py-5">
                                    <div class="flex justify-end gap-2 opacity-30 group-hover:opacity-100 transition-opacity">
                                       <a href="<?=PATH_ROOT?>/espece/getEspece?id=<?= $row['id_espece'] ?>">
                                         <button class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center hover:bg-cyan-500 hover:text-black transition-all">
                                            <i class="fa-solid fa-edit"></i>
                                        </button>
                                       </a>
                                   

                                        <a href="<?=PATH_ROOT?>/espece/supprimer?id=<?= $row['id_espece'] ?>">
                                            <button class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center hover:bg-red-500 transition-all">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                        </a>
                                        
                                    </div>
                                </td>
                            </tr>
                            <?php   endif; ?>
                            <?php  endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="px-8 py-20 text-center text-slate-500 italic">Aucune espèce enregistrée pour le moment.</td>
                            </tr>
                        <?php endif; 
                        
                        ?>
                    </tbody>
                </table>
            </div>
        </section>

        <section id="competitions" class="admin-section">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
                <div>
                    <h2 class="text-4xl font-black italic uppercase">Gestion <span class="text-cyan-400">Compétitions</span></h2>
                    <p class="text-slate-500 text-[10px] font-black uppercase tracking-[0.3em]">
                        Création & calendrier des compétitions
                    </p>
                </div>
            
                <div class="flex gap-4">
                    <a href="./addCompetition" target="_blank"
                    class="bg-cyan-500 text-black text-xs font-black px-8 py-4 rounded-2xl neo-button uppercase flex items-center gap-3">
                        <i class="fa-solid fa-plus"></i> Nouvelle compétition
                    </a>

                    <a href="./competition" target="_blank"
                    class="px-8 py-4 rounded-2xl text-xs font-bold uppercase border border-white/10 hover:bg-white/5 transition-all flex items-center gap-3">
                        <i class="fa-solid fa-calendar-days"></i> Calendrier
                    </a>
                </div>

            </div>
            
            <div class="ultra-glass p-12 rounded-[40px] text-center text-slate-400 italic">
                Consultez le calendrier, ajoutez ou modifiez les compétitions existantes.
            </div>
        </section>


        <section id="catches" class="admin-section">
            <h2 class="text-4xl font-black mb-6 uppercase italic text-white">Validation Prises</h2>
            <div class="ultra-glass p-12 rounded-[40px] text-center text-slate-500 italic">Aucune prise en attente de validation.</div>
        </section>

        <section id="fishermen" class="admin-section">
            <h2 class="text-4xl font-black mb-6 uppercase italic text-white">Pêcheurs</h2>
            <div class="ultra-glass p-12 rounded-[40px] text-center text-slate-500 italic">Liste des licenciés...</div>
        </section>

    </main>
</div>

<footer class="mt-20 py-12 border-t border-white/5 text-center">
    <p class="text-[10px] font-bold tracking-[0.8em] text-slate-500 uppercase">
        Fédération Royale Marocaine de Pêche Sportive © 2026
    </p>
</footer>

<script>
    const links = document.querySelectorAll('.sidebar-link');
    const sections = document.querySelectorAll('.admin-section');

    links.forEach(link => {
        link.addEventListener('click', () => {
            const targetSectionId = link.dataset.section;

          
            sections.forEach(section => {
                section.classList.remove('active-content');
            });
            
       
            const targetSection = document.getElementById(targetSectionId);
            if(targetSection) {
                targetSection.classList.add('active-content');
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }

            
            links.forEach(l => l.classList.remove('active'));
            link.classList.add('active');
        });
    });

    
    const modal = document.getElementById('addSpeciesModal');
    modal.addEventListener('click', (e) => {
        if (e.target === modal) modal.close();
    });
</script>

</body>
</html>