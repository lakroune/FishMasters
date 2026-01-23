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
            <a href="<?= PATH_ROOT ?>/live" class="flex items-center space-x-2 text-rose-500 hover:text-white transition group">
                <span class="w-2 h-2 bg-rose-500 rounded-full animate-ping"></span>
                <span>En Direct</span>
            </a>
            <a href="<?= PATH_ROOT ?>/actualites" class="hover:text-pink-400 transition italic">Fil d'Actu</a>
            <a href="<?= PATH_ROOT ?>/pecheurs" class="hover:text-pink-400 transition">Mes Favoris</a>
            <a href="<?= PATH_ROOT ?>/boutique" class="hover:text-pink-400 transition border-b border-pink-500/30">Store ⚡</a>
        </div>

        <div class="flex items-center space-x-5">
            <button class="hidden md:block text-[10px] font-black bg-white text-black px-5 py-2 rounded-full hover:bg-pink-500 hover:text-white transition-all uppercase tracking-tighter">
                Supporter un Pro
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
                            <p class="text-[9px] text-pink-400 font-black uppercase tracking-widest">Niveau 12</p>
                            <p class="text-xs text-white font-bold">Fan Passionné</p>
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