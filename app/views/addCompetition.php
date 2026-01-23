<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une compétition — FishMasters Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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

        input, select, textarea {
            background: rgba(255,255,255,.05);
            border: 1px solid rgba(255,255,255,.1);
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
        <a href="admin_dashboard.php"
           class="text-xs font-bold px-6 py-2 bg-cyan-500 text-black rounded-full neo-button uppercase">
            Retour
        </a>
    </div>
</nav>

                   
        <!-- $stmt->bindValue(':type_competition', $this->type_competition);
        $stmt->bindValue(':nb_matchs', $this->nb_matchs);
        $stmt->bindValue(':nb_participants', $this->nb_participants);
        $stmt->bindValue(':id_categorie', $this->id_categorie); -->

<main class="max-w-[1100px] mx-auto pt-32 px-6">

    <form method="POST"
          class="ultra-glass p-10 rounded-[45px] space-y-10">

        <h1 class="text-4xl font-black uppercase">Ajouter une compétition</h1>

        <div class="grid lg:grid-cols-2 gap-6">
            <div>
                <label class="text-xs uppercase text-slate-400">Nom de la compétition</label>
                <input type="text" name="name" required
                       class="w-full mt-2 px-4 py-3 rounded-xl outline-none focus:border-cyan-500">
            </div>
            <div>
                <label class="text-xs uppercase text-slate-400">Date Debut</label>
                <input type="date" name="dateDebut" required
                       class="w-full mt-2 px-4 py-3 rounded-xl outline-none focus:border-cyan-500">
            </div>

            <div>
                <label class="text-xs uppercase text-slate-400">Date Fin</label>
                <input type="date" name="dateFin" required
                       class="w-full mt-2 px-4 py-3 rounded-xl outline-none focus:border-cyan-500">
            </div>
        </div>

        <div class="grid lg:grid-cols-2 gap-6">
            <div>
                <label class="text-xs uppercase text-slate-400">Type de Competition</label>
                <select name="Competition" required
                        class="w-full mt-2 px-4 py-3 rounded-xl outline-none focus:border-cyan-500">
                    <option value="" disabled>-- Choisir --</option>
                    <option class="text-black" value="Equipee">Equipee</option>
                    <option class="text-black" value="Individuelle">Individuelle</option>
                </select>
            </div>

            <div>
                <label class="text-xs uppercase text-slate-400">Catégorie</label>
                <select name="category" required
                        class="w-full mt-2 px-4 py-3 rounded-xl outline-none focus:border-cyan-500">
                    <option class="text-black" value="" disabled>-- Choisir --</option>
                    <?php foreach($categories as $catt): ?>
                    <option class="text-black" value="<?= htmlspecialchars($catt->getId()) ?>"><?= htmlspecialchars($catt->getNom()) ?></option>
                    <?php endforeach; ?>
                    
                </select>
            </div>
        </div>

        <div class="flex justify-end gap-4">
            <a href="Admin"
               class="px-8 py-3 border border-white/20 rounded-full text-xs font-bold uppercase">
                Annuler
            </a>
            <button type="submit" name="submit"
                    class="bg-cyan-500 text-black px-8 py-3 rounded-full text-xs font-bold uppercase neo-button">
                Enregistrer
            </button>
        </div>

    </form>
</main>

<footer class="mt-24 py-12 border-t border-white/5 text-center">
    <p class="text-[10px] font-bold tracking-[0.6em] text-slate-600 uppercase">
        Fédération Royale Marocaine de Pêche Sportive © 2026
    </p>
</footer>

</body>
</html>
