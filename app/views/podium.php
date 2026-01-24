<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title) ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>


<?php include "header.php"; ?>

<body class="bg-[#02040a]">

<div class="mt-28 bg-[#02040a]"></div>

<div class="bg-[#02040a] text-white min-h-screen p-10">

<h1 class="text-4xl font-black italic uppercase text-center mb-10">
    🏆 <?= htmlspecialchars($title) ?>
</h1>

<div class="flex justify-center mb-12">
    <select
        onchange="if(this.value) window.location.href=this.value"
        class="bg-white/5 border border-white/10 rounded-xl px-6 py-3 text-sm"
    >
        <option value="/podium">Classement général</option>
        <?php foreach ($competitions as $comp): ?>
            <option
                value="/podium/<?= $comp['id_competition'] ?>"
                <?= $currentCompetition === (int)$comp['id_competition'] ? 'selected' : '' ?>
            >
                <?= htmlspecialchars($comp['nom_competition']) ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>

<!-- Podium -->
<div class="grid md:grid-cols-3 gap-6 max-w-4xl mx-auto">

<?php
$labels = ['🥇 1er', '🥈 2ème', '🥉 3ème'];
foreach ($top3 as $i => $row):
?>
    <div class="bg-white/5 border border-white/10 rounded-3xl p-8 text-center">
        <div class="text-3xl font-black mb-4"><?= $labels[$i] ?></div>
        <p class="text-xl font-bold">
            <?= htmlspecialchars($row['prenom_user'] . ' ' . $row['nom_user']) ?>
        </p>
        <p class="text-cyan-400 font-black text-2xl mt-2">
            <?= (int)$row['total_points'] ?> pts
        </p>
    </div>
<?php endforeach; ?>

<?php if (count($top3) === 0): ?>
    <p class="col-span-3 text-center text-slate-500 italic">
        Aucun résultat disponible.
    </p>
<?php endif; ?>

</div>

</div>
</body>
</html>
