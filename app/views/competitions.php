<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>🎣 Filtrer les compétitions — FishMasters X</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
</head>


<body class="bg-[#02040a]">
    
<?php require __DIR__ . '/../views/header.php'; ?>

<div class="bg-[#02040a] mt-28 text-white min-h-screen p-10">

<h1 class="text-4xl font-black italic uppercase text-center mb-10">
    🎣 Filtrer les compétitions
</h1>

<form method="get" action="/competition/index" class="max-w-4xl mx-auto mb-12 flex flex-wrap gap-6 justify-center">

    <select name="categorie" class="bg-white/5 border border-white/20 rounded-xl px-6 py-3 text-white text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
        <option value="">-- Choisir une catégorie --</option>
        <?php foreach ($categories as $cat): ?>
            <option value="<?= htmlspecialchars($cat) ?>" <?= (isset($_GET['categorie']) && $_GET['categorie'] === $cat) ? 'selected' : '' ?>>
                <?= htmlspecialchars($cat) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <select name="milieu" class="bg-white/5 border border-white/20 rounded-xl px-6 py-3 text-white text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
        <option value="">-- Choisir un milieu --</option>
        <?php foreach ($milieux as $milieu): ?>
            <option value="<?= htmlspecialchars($milieu) ?>" <?= (isset($_GET['milieu']) && $_GET['milieu'] === $milieu) ? 'selected' : '' ?>>
                <?= htmlspecialchars($milieu) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <select name="region" class="bg-white/5 border border-white/20 rounded-xl px-6 py-3 text-white text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500">
        <option value="">-- Choisir une région --</option>
        <?php foreach ($regions as $region): ?>
            <option value="<?= htmlspecialchars($region) ?>" <?= (isset($_GET['region']) && $_GET['region'] === $region) ? 'selected' : '' ?>>
                <?= htmlspecialchars($region) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit" class="bg-cyan-600 hover:bg-cyan-700 text-white font-black py-3 px-8 rounded-xl transition-colors duration-200">
        Filtrer
    </button>

</form>

<div class="max-w-4xl mx-auto grid gap-6">
    <?php if (empty($competitions)): ?>
        <p class="text-center text-slate-500 italic">Aucune compétition trouvée avec ces critères.</p>
    <?php else: ?>
        <?php foreach ($competitions as $comp): ?>
            <div class="bg-white/5 border border-white/20 rounded-3xl p-6">
                <h2 class="text-2xl font-bold mb-2"><?= htmlspecialchars($comp['nom_competition']) ?></h2>
                <p>Date début : <span class="font-mono"><?= htmlspecialchars($comp['date_debut']) ?></span></p>
                <p>Type : <span class="uppercase font-semibold"><?= htmlspecialchars($comp['type_competition']) ?></span></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php require __DIR__ . '/../partials/footer.php'; ?>

    </div>   
        </body>
</html>
