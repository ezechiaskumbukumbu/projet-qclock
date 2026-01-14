<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rawbank | Monitoring QClock</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'raw-blue': '#003366',
                        'raw-red': '#E30613',
                        'raw-gray': '#F4F7F9'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-raw-gray font-sans text-slate-800">

    <header class="bg-white border-b-4 border-raw-red shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <div class="text-raw-blue font-black text-3xl tracking-tighter">
                    RAWBANK<span class="text-raw-red font-light">.</span>
                </div>
                <div class="h-8 w-px bg-slate-200 mx-4 hidden md:block"></div>
                <span class="text-xs font-bold text-slate-400 uppercase tracking-widest hidden md:block">QClock Monitoring</span>
            </div>
            
            <div class="flex items-center space-x-6">
                <div class="text-right hidden sm:block">
                    <p class="text-[10px] text-slate-400 uppercase font-bold tracking-tighter">Serveur Node</p>
                    <p class="text-xs font-mono text-raw-blue"><?php echo gethostname(); ?></p>
                </div>
                <div class="bg-raw-blue text-white px-4 py-2 rounded-full text-xs font-bold shadow-lg shadow-blue-900/20">
                    SÉCURISÉ
                </div>
            </div>
        </div>
    </header>

    <main class="container mx-auto px-6 py-12">
        <div class="bg-raw-blue rounded-[2.5rem] p-12 text-white relative overflow-hidden mb-12 shadow-2xl">
            <div class="relative z-10 flex flex-col md:flex-row justify-between items-center">
                <div class="mb-8 md:mb-0">
                    <h2 class="text-4xl font-bold mb-2 italic">Bonjour, Ezechias</h2>
                    <p class="text-blue-200 text-lg">Bienvenue sur votre console de monitoring temps réel.</p>
                </div>
                <div class="text-center bg-white/10 backdrop-blur-md p-8 rounded-3xl border border-white/20">
                    <p class="text-xs uppercase tracking-[0.3em] text-blue-300 font-bold mb-2">Heure de Kinshasa</p>
                    <div class="text-6xl font-black tabular-nums tracking-tighter">
                        <?php echo date('H:i:s'); ?>
                    </div>
                    <p class="mt-2 text-sm font-medium text-red-400 uppercase tracking-widest"><?php echo date('d F Y'); ?></p>
                </div>
            </div>
            <div class="absolute top-0 right-0 opacity-10 transform translate-x-1/4 -translate-y-1/4">
                <i class="fas fa-landmark text-[25rem]"></i>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100 hover:shadow-xl transition-all">
                <div class="flex items-center space-x-4 mb-6">
                    <div class="bg-slate-100 p-4 rounded-2xl text-raw-blue"><i class="fas fa-server text-xl"></i></div>
                    <h3 class="font-bold text-lg">Web Server</h3>
                </div>
                <div class="flex items-center text-green-600 font-bold">
                    <span class="flex h-3 w-3 mr-3"><span class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-green-400 opacity-75"></span><span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span></span>
                    Apache 2.4 (OL9)
                </div>
            </div>

            <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100 hover:shadow-xl transition-all text-nowrap">
                <div class="flex items-center space-x-4 mb-6">
                    <div class="bg-slate-100 p-4 rounded-2xl text-raw-red"><i class="fas fa-database text-xl"></i></div>
                    <h3 class="font-bold text-lg">Base de données</h3>
                </div>
                <div class="text-slate-600 font-medium">
                    <i class="fas fa-link mr-2 text-blue-500"></i>MySQL 8.0 Connecté
                </div>
            </div>

            <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100 hover:shadow-xl transition-all">
                <div class="flex items-center space-x-4 mb-6">
                    <div class="bg-slate-100 p-4 rounded-2xl text-blue-500"><i class="fas fa-shield-virus text-xl"></i></div>
                    <h3 class="font-bold text-lg">Santé Stack</h3>
                </div>
                <div class="text-slate-600 font-medium">
                    <?php echo extension_loaded('pdo_mysql') ? '✅ Extensions Validées' : '❌ Erreur Drivers'; ?>
                </div>
            </div>
        </div>
    </main>

    <footer class="container mx-auto px-6 py-8 mt-12 border-t border-slate-200">
        <div class="flex flex-col md:flex-row justify-between items-center text-slate-400 text-sm italic">
            <p>&copy; 2026 Rawbank IT Delivery. Tout droit réservé.</p>
            <p class="mt-4 md:mt-0 font-bold text-raw-blue">RAWBANK - Ma banque, ma liberté.</p>
        </div>
    </footer>

</body>
</html>