<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NOTIFICATIONS — FISHMASTERS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;900&display=swap');

        body {
            font-family: 'Outfit', sans-serif;
            background: #02040a;
            color: #fff;
        }

        .ultra-glass {
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .unread {
            border-left: 4px solid #f43f5e;
            background: rgba(244, 63, 94, 0.05);
        }

        .notification-item {
            transition: all 0.3s ease;
        }

        .notification-item:hover {
            background: rgba(255, 255, 255, 0.05);
            transform: translateX(5px);
        }
    </style>
</head>

<body class="antialiased pb-20">
    <?php include "header.php"; ?>

    <main class="max-w-3xl mx-auto px-6 pt-32">
        <div class="flex justify-between items-center mb-10">
            <div>
                <h1 class="text-4xl font-black uppercase italic tracking-tighter text-white">Inbox<span class="text-pink-500">.</span></h1>
                <p class="text-slate-500 text-[10px] font-bold uppercase tracking-[0.4em] mt-1">Vos dernières activités</p>
            </div>
            <button class="text-[10px] font-black uppercase tracking-widest text-slate-500 hover:text-white transition">
                Tout effacer
            </button>
        </div>

        <div class="space-y-4">
            <?php if (empty($notifications)): ?>
                <div class="ultra-glass rounded-[40px] p-16 text-center border-dashed border-2 border-white/5">
                    <i class="fa-solid fa-bell-slash text-4xl text-slate-800 mb-4"></i>
                    <p class="text-slate-500 font-bold uppercase text-xs italic tracking-widest">Aucune notification pour le moment</p>
                </div>
            <?php else: ?>
                <?php foreach ($notifications as $notif): ?>
                    <div class="ultra-glass p-6 rounded-[30px] notification-item flex items-start gap-5 <?= $notif->is_read ? '' : 'unread' ?>">
                        <div class="w-12 h-12 rounded-2xl flex items-center justify-center shrink-0 
                            <?= $notif->type == 'LIKE' ? 'bg-pink-500/10 text-pink-500' : 'bg-cyan-500/10 text-cyan-400' ?>">
                            <i class="<?= $notif->type == 'LIKE' ? 'fa-solid fa-heart' : 'fa-solid fa-trophy' ?>"></i>
                        </div>

                        <div class="flex-1">
                            <div class="flex justify-between items-start">
                                <h3 class="text-sm font-black uppercase italic tracking-tight text-slate-200">
                                    <?= htmlspecialchars($notif->titre) ?>
                                </h3>
                                <span class="text-[9px] font-bold text-slate-600 uppercase">
                                    <?= $notif->date_diff ?>
                                </span>
                            </div>
                            <p class="text-xs text-slate-400 mt-1 leading-relaxed">
                                <?= htmlspecialchars($notif->message) ?>
                            </p>
                        </div>

                        <div class="self-center">
                            <div class="w-2 h-2 rounded-full <?= $notif->is_read ? 'bg-transparent' : 'bg-pink-500' ?>"></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </main>

    <script>
    </script>
</body>

</html>