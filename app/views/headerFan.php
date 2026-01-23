<nav class="fixed top-0 w-full z-[100] p-6">
    <div class="max-w-[1600px] mx-auto ultra-glass rounded-full px-8 py-4 flex justify-between items-center border border-pink-500/10">

        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 bg-gradient-to-tr from-pink-500 to-rose-400 rounded-full flex items-center justify-center shadow-[0_0_20px_rgba(244,63,94,0.4)]">
                <i class="fa-solid fa-heart text-white animate-pulse"></i>
            </div>
            <a href="<?= PATH_ROOT ?>/home">
                <span class="text-2xl font-black uppercase tracking-tighter text-white">Fish<span class="text-pink-500">Fan</span></span>
            </a>
        </div>

        <div class="hidden lg:flex space-x-10 text-xs font-bold uppercase tracking-widest text-slate-300">
            <a href="<?= PATH_ROOT ?>/actualites" class="hover:text-pink-400 transition italic">Fil d'Actu</a>
            <a href="<?= PATH_ROOT ?>/competition" class="hover:text-cyan-400 transition text-cyan-400">Calendrier</a>
            <a href="<?= PATH_ROOT ?>/about" class="hover:text-cyan-400 transition">Decouvrir </a>
            <a href="<?= PATH_ROOT ?>/classement" class="hover:text-cyan-400 transition">Classement</a>
        </div>

        <div class="flex items-center space-x-5">

            <button class="relative text-slate-400 hover:text-cyan-400 transition">
                <i class="fa-solid fa-bell text-lg"></i>
                <span class="absolute -top-1 -right-1 w-2 h-2 bg-red-500 rounded-full border-2 border-[#0a0a0a]"></span>
            </button>

            <div class="flex items-center space-x-4 border-l border-white/10 pl-5">

                <div class="relative group">
                    <button class="flex items-center space-x-2 focus:outline-none">
                        <div class="w-10 h-10 rounded-full border-2 border-pink-500 overflow-hidden shadow-[0_0_15px_rgba(244,63,94,0.2)]">
                            <img src="https://ui-avatars.com/api/?name=Fan&background=f43f5e&color=fff" class="w-full h-full object-cover" alt="Fan Avatar">
                        </div>
                        <i class="fa-solid fa-angle-down text-slate-500 text-[10px]"></i>
                    </button>

                    <div class="absolute right-0 mt-4 w-52 bg-[#0f172a]/95 backdrop-blur-xl border border-white/5 rounded-3xl py-3 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 shadow-2xl">
                        <div class="px-4 py-2 border-b border-white/5 mb-2">
                        </div>
                        <a href="<?= PATH_ROOT ?>/mes-favoris" class="block px-4 py-2 text-[11px] font-bold text-slate-300 hover:text-pink-400 transition">❤️ MES FAVORIS</a>
                        <a href="<?= PATH_ROOT ?>/mes-billets" class="block px-4 py-2 text-[11px] font-bold text-slate-300 hover:text-pink-400 transition">🎟️ MES BILLETS</a>
                        <a href="<?= PATH_ROOT ?>/parametres" class="block px-4 py-2 text-[11px] font-bold text-slate-300 hover:text-pink-400 transition">PARAMÈTRES</a>
                        <hr class="my-2 border-white/5">
                        <a href="<?= PATH_ROOT ?>/logout" class="block px-4 py-2 text-[11px] font-bold text-slate-500 hover:text-white transition">DECONNEXION</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>