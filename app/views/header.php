<nav class="fixed top-0 w-full z-[100] p-6">
    <div class="max-w-[1600px] mx-auto ultra-glass rounded-full px-8 py-4 flex justify-between items-center">
        <div class="flex items-center space-x-2">
            <div class="w-10 h-10 bg-cyan-500 rounded-full flex items-center justify-center shadow-[0_0_20px_rgba(6,182,212,0.5)]">
                <i class="fa-solid fa-fish-fins text-black"></i>
            </div>
            <a href="<?= PATH_ROOT ?>/home">
                <span class="text-2xl font-black uppercase tracking-tighter text-white">Fish<span class="text-cyan-400">Masters</span></span>
            </a>
        </div>

        <div class="hidden lg:flex space-x-10 text-xs font-bold uppercase tracking-widest text-slate-400">
            <a href="<?= PATH_ROOT ?>/home" class="hover:text-cyan-400 transition">Accueil</a>
            <a href="<?= PATH_ROOT ?>/competition" class="hover:text-cyan-400 transition">Calendrier</a>
            <a href="<?= PATH_ROOT ?>/classement" class="hover:text-cyan-400 transition">Classement</a>
            <a href="<?= PATH_ROOT ?>/mes-prises" class="hover:text-cyan-400 transition">Mes Prises</a>
        </div>

        <div class="flex items-center space-x-6">
            <button class="relative text-slate-400 hover:text-cyan-400 transition">
                <i class="fa-solid fa-bell text-lg"></i>
                <span class="absolute -top-1 -right-1 w-2 h-2 bg-red-500 rounded-full border-2 border-[#0a0a0a]"></span>
            </button>

            <div class="flex items-center space-x-4 border-l border-white/10 pl-6">
                <div class="text-right hidden sm:block">
                    <p class="text-[10px] text-slate-500 uppercase font-bold leading-none">Pêcheur Pro</p>
                    <p class="text-xs text-white font-black italic">Nom_Utilisateur</p>
                </div>
                
                <div class="relative group">
                    <button class="w-10 h-10 rounded-full border-2 border-cyan-500/30 p-0.5 hover:border-cyan-400 transition duration-300">
                        <img src="https://ui-avatars.com/api/?name=User&background=06b6d4&color=fff" class="w-full h-full rounded-full object-cover" alt="Profile">
                    </button>
                    
                    <div class="absolute right-0 mt-2 w-48 bg-[#0f172a] border border-white/10 rounded-2xl py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 shadow-2xl">
                        <a href="<?= PATH_ROOT ?>/dashboard" class="block px-4 py-2 text-xs font-bold text-slate-300 hover:bg-cyan-500 hover:text-black transition">TABLEAU DE BORD</a>
                        <a href="<?= PATH_ROOT ?>/settings" class="block px-4 py-2 text-xs font-bold text-slate-300 hover:bg-cyan-500 hover:text-black transition">PARAMÈTRES</a>
                        <hr class="my-2 border-white/5">
                        <a href="<?= PATH_ROOT ?>/logout" class="block px-4 py-2 text-xs font-bold text-red-400 hover:bg-red-500 hover:text-white transition">DÉCONNEXION</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>