
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FISHMASTERS X — Modifier Espèce</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@100;400;900&display=swap');
        :root { --accent: #00f2ff; --bg: #02040a; }
        body { font-family: 'Outfit', sans-serif; background-color: var(--bg); color: #fff; }

        .ultra-glass {
            background: rgba(255,255,255,0.02);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255,255,255,0.05);
            box-shadow: 0 25px 50px -12px rgba(0,0,0,0.5);
        }

        .neo-button { transition: all .4s cubic-bezier(.23,1,.32,1); }
        .neo-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 0 20px rgba(0,242,255,.4);
        }

        .modal-input {
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.1);
            color: white;
            width: 100%;
            padding: 1.2rem;
            border-radius: 1.2rem;
            outline: none;
            transition: all 0.3s;
        }
        
        .modal-input:focus {
            border-color: #00f2ff;
            background: rgba(255,255,255,0.07);
            box-shadow: 0 0 15px rgba(0, 242, 255, 0.1);
        }
    </style>
</head>

<body class="antialiased min-h-screen flex items-center justify-center p-6">

    <div class="fixed top-[-10%] left-[-10%] w-[40%] h-[40%] bg-cyan-500/10 blur-[120px] rounded-full z-[-1]"></div>
    <div class="fixed bottom-[-10%] right-[-10%] w-[30%] h-[30%] bg-blue-600/10 blur-[100px] rounded-full z-[-1]"></div>

    <main class="w-full max-w-2xl">
        <a href="javascript:history.back()" class="inline-flex items-center gap-2 text-slate-500 hover:text-cyan-400 transition-colors mb-8 group font-bold text-sm uppercase tracking-widest">
            <i class="fa-solid fa-arrow-left transition-transform group-hover:-translate-x-1"></i>
            Retour à la gestion
        </a>

        <div class="ultra-glass rounded-[40px] p-10 md:p-16 border border-white/10 relative overflow-hidden">
            <i class="fa-solid fa-dna absolute top-10 right-10 text-white/[0.02] text-9xl -rotate-12 pointer-events-none"></i>

            <div class="relative z-10">
                <header class="mb-10">
                    <h1 class="text-4xl font-black italic uppercase tracking-tighter">
                        Modifier <span class="text-cyan-400">l'espèce</span>
                    </h1>
                    <p class="text-slate-500 text-[10px] font-black uppercase tracking-[0.3em] mt-2">
                        Mise à jour des paramètres du barème
                    </p>
                </header>

                <form method="POST" action="<?=PATH_ROOT?>/espece/modifier" class="space-y-8">
                    <input type="hidden" name="id_espece" value="<?= $espece_to_edit['id_espece'] ?? '' ?>">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-[10px] font-bold uppercase tracking-widest text-cyan-400/60 pl-2">Nom de l'espèce</label>
                            <input name="espece" type="text" 
                                   value="<?= htmlspecialchars($espece_to_edit['nom_espece'] ?? '') ?>" 
                                   class="modal-input" required>
                        </div>

                        <div class="space-y-2">
                            <label class="text-[10px] font-bold uppercase tracking-widest text-cyan-400/60 pl-2">Coefficient</label>
                            <div class="relative">
                                <input type="number" name="coaficiant" step="0.1" 
                                       value="<?= $espece_to_edit['coefficient'] ?? '1.0' ?>" 
                                       class="modal-input" required>
                                <span class="absolute right-5 top-1/2 -translate-y-1/2 text-cyan-400/30 font-black italic">X</span>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-[10px] font-bold uppercase tracking-widest text-cyan-400/60 pl-2">Description détaillée</label>
                        <textarea name="description" class="modal-input min-h-[150px] resize-none"><?= htmlspecialchars($espece_to_edit['description'] ?? '') ?></textarea>
                    </div>

                    <div class="flex flex-col md:flex-row gap-4 pt-6">
                     
                             <button type="submit" class="flex-[2] bg-cyan-500 text-black text-xs font-black py-5 rounded-2xl neo-button uppercase tracking-widest flex items-center justify-center gap-3">
                            <i class="fa-solid fa-check-double text-lg"></i>
                            Enregistrer les modifications
                        </button>
                      
                       
                        
                        <button type="button" onclick="history.back()" class="flex-1 py-5 rounded-2xl text-xs font-bold uppercase border border-white/10 hover:bg-white/5 transition-all text-slate-400">
                            Annuler
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <p class="text-center mt-10 text-[9px] font-bold tracking-[0.5em] text-slate-600 uppercase">
            FishMasters X System • Security Layer V2
        </p>
    </main>

</body>
</html>