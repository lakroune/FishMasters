<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FISHMASTERS X — Register</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-[#02040a] text-white antialiased">

    <!-- NAVBAR -->
    <nav class="fixed top-0 w-full z-50 p-6">
        <div class="max-w-[1600px] mx-auto bg-black/40 backdrop-blur-xl border border-white/5 rounded-full px-8 py-4 flex items-center">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-cyan-400 rounded-full flex items-center justify-center">
                    <i class="fa-solid fa-fish-fins text-black"></i>
                </div>
                <span class="text-2xl font-black uppercase tracking-tight">
                    Fish<span class="text-cyan-400">Masters</span>
                </span>
            </div>
        </div>
    </nav>

    <!-- REGISTER FORM -->
    <main class="min-h-screen flex items-center justify-center px-4 pt-24">
        <div class="w-full max-w-md bg-gray-800 rounded-2xl shadow-2xl">

            <div class="p-6 space-y-4">
                <div>
                    <h2 class="text-xl font-semibold">Create Account</h2>
                    <p class="text-sm text-gray-400">Join the FishMasters community</p>
                </div>

                <form method="POST"  action="<?= PATH_ROOT ?>/singup/singup" enctype="multipart/form-data"
                          class="space-y-4">

                    <!-- NOM -->
                    <div>
                        <label class="text-xs text-gray-300">Nom</label>
                        <input type="text" name="nomUser" required
                            class="w-full mt-1 px-3 py-2 text-sm rounded-lg bg-gray-700 focus:ring-2 focus:ring-cyan-400 outline-none">
                    </div>

                    <!-- PRENOM -->
                    <div>
                        <label class="text-xs text-gray-300">Prénom</label>
                        <input type="text" name="prenomUser" required
                            class="w-full mt-1 px-3 py-2 text-sm rounded-lg bg-gray-700 focus:ring-2 focus:ring-cyan-400 outline-none">
                    </div>

                    <!-- EMAIL -->
                    <div>
                        <label class="text-xs text-gray-300">Email</label>
                        <input type="email" name="emailUser" required
                            class="w-full mt-1 px-3 py-2 text-sm rounded-lg bg-gray-700 focus:ring-2 focus:ring-cyan-400 outline-none">
                    </div>

                    <!-- PASSWORD -->
                    <div>
                        <label class="text-xs text-gray-300">Password</label>
                        <input type="password" name="passwordUser" required
                            class="w-full mt-1 px-3 py-2 text-sm rounded-lg bg-gray-700 focus:ring-2 focus:ring-cyan-400 outline-none">
                    </div>

                    <!-- ROLE -->
                    <div>
                        <label class="text-xs text-gray-300">Rôle</label>
                        <select id="roleSelect" name="roleUser" required
                            class="w-full mt-1 px-3 py-2 text-sm rounded-lg bg-gray-700 focus:ring-2 focus:ring-cyan-400 outline-none">
                            <option value="">Sélectionner</option>
                            <option value="FAN">Fan</option>
                            <option value="PECHEUR">Pêcheur</option>
                        </select>
                    </div>

                    <!-- CHAMPS PECHEUR -->
                    <div id="pecheurFields" class="space-y-4 hidden">

                        <!-- REGION -->
                        <div>
                            <label class="text-xs text-gray-300">Région</label>
                            <select name="region"
                                class="w-full mt-1 px-3 py-2 text-sm rounded-lg bg-gray-700 focus:ring-2 focus:ring-cyan-400 outline-none">
                                <option value="">Sélectionner</option>
                                <option value="nord">Nord</option>
                                <option value="sud">Sud</option>
                                <option value="est">Est</option>
                                <option value="ouest">Ouest</option>
                            </select>
                        </div>

                        <!-- TYPE PECHE -->
                        <div>
                            <label class="text-xs text-gray-300">Type de pêche favorite</label>
                            <select name="type_peche_favorite"
                                class="w-full mt-1 px-3 py-2 text-sm rounded-lg bg-gray-700 focus:ring-2 focus:ring-cyan-400 outline-none">
                                <option value="">Sélectionner</option>
                                <option value="mer">Mer</option>
                                <option value="rivière">Rivière</option>
                                <option value="lac">Lac</option>
                                <option value="sportive">Sportive</option>
                            </select>
                        </div>

                        <!-- PHOTO -->
                        <div>
                            <label class="text-xs text-gray-300">Photo</label>
                            <input type="file" name="photoPecheur" accept="image/*" 
                                class="w-full mt-1 text-sm text-gray-300
                                       file:bg-cyan-400 file:text-black
                                       file:border-0 file:px-3 file:py-1
                                       file:rounded-lg file:font-semibold
                                       hover:file:bg-cyan-500">
                        </div>
                    </div>

                    <!-- SUBMIT -->
                    <button type="submit" name="singup"
                        class="w-full bg-cyan-400 text-gray-900 py-2 text-sm rounded-lg font-semibold hover:bg-cyan-500 transition">
                        Create Account
                    </button>
                </form>

                <p class="text-xs text-center text-gray-400">
                    Already have an account?
                    <a href="#" class="text-cyan-400 hover:underline">Login</a>
                </p>
            </div>
        </div>
    </main>

    <!-- JS -->
    <script>
        const roleSelect = document.getElementById('roleSelect');
        const pecheurFields = document.getElementById('pecheurFields');

        roleSelect.addEventListener('change', () => {
            pecheurFields.classList.toggle(
                'hidden',
                roleSelect.value !== 'PECHEUR'
            );
        });
    </script>

</body>
</html>
