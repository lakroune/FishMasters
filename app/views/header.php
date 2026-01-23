 <nav class="fixed top-0 w-full z-[100] p-6">
     <div class="max-w-[1600px] mx-auto ultra-glass rounded-full px-8 py-4 flex justify-between items-center">
         <div class="flex items-center space-x-2">
             <div class="w-10 h-10 bg-cyan-500 rounded-full flex items-center justify-center shadow-[0_0_20px_rgba(6,182,212,0.5)]">
                 <i class="fa-solid fa-fish-fins text-black"></i>
             </div>
             <span class="text-2xl font-black uppercase tracking-tighter">Fish<span class="text-cyan-400">Masters</span></span>
         </div>

         <div class="hidden lg:flex space-x-10 text-xs font-bold uppercase tracking-widest text-slate-400">
             <a href="<?= PATH_ROOT ?>/home" class="hover:text-cyan-400 transition">Accueil</a>
             <a href="<?= PATH_ROOT ?>/competition" class="hover:text-cyan-400 transition text-cyan-400">Calendrier</a>
             <a href="<?= PATH_ROOT ?>/classement" class="hover:text-cyan-400 transition">Liste Des pecheurs</a>
             <a href="<?= PATH_ROOT ?>/classement" class="hover:text-cyan-400 transition">Classement</a>
         </div>

         <div class="flex items-center space-x-4">
             <button class="text-xs font-bold px-6 py-2 border border-white/10 rounded-full hover:bg-white hover:text-black transition uppercase">Login</button>
             <button class="text-xs font-bold px-6 py-2 bg-cyan-500 text-black rounded-full neo-button uppercase">Register</button>
         </div>
     </div>
 </nav>