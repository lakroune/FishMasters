<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FISHMASTERS X — Login</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Fonts & Custom Style -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&display=swap');

        body {
            font-family: 'Outfit', sans-serif;
            background-color: #02040a;
            color: white;
        }

        .ultra-glass {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
    </style>
</head>

<body class="antialiased">

    <!-- NAVBAR -->
    <nav class="fixed top-0 w-full z-50 p-6">
        <div class="max-w-[1600px] mx-auto  px-8 py-4 flex items-center">
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

    <!-- CENTERED LOGIN FORM -->
    <main class="min-h-screen flex items-center justify-center px-4">
        <div class="bg-gray-800 rounded-2xl shadow-2xl w-full max-w-md">

            <div class="p-6">
                <h2 class="text-xl font-semibold mb-2">System Access</h2>
                <p class="text-gray-400 text-sm mb-6">
                    Welcome back to the digital frontier.
                </p>

                <form method="POST" action="<?= PATH_ROOT ?>/login/login" class="space-y-4">
                    <div>
                        <label class="text-gray-300 text-xs">Email Address</label>
                        <input type="email" name="email" placeholder="name@company.com"
                            class="w-full mt-1 px-3 py-2 text-sm rounded-lg bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-cyan-400">
                    </div>

                    <div>
                        <label class="text-gray-300 text-xs">Password</label>
                        <input type="password" name="passwordUser" placeholder="********"
                            class="w-full mt-1 px-3 py-2 text-sm rounded-lg bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-cyan-400">
                    </div>

                    <button type="submit" name="login"
                        class="w-full bg-cyan-400 text-gray-900 py-2 text-sm rounded-lg font-semibold hover:bg-cyan-500 transition">
                        Authorize Access
                    </button>
                </form>

                <div class="my-4 text-center text-xs text-gray-400">
                    or continue with
                </div>

                <p class="text-center text-xs text-gray-400">
                    New to the platform?
                    <a href="#" class="text-cyan-400 hover:underline">
                        Create an account
                    </a>
                </p>
            </div>

        </div>
    </main>

</body>

</html>