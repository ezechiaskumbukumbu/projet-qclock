<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rawbank | QClock Intelligence</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { 'sans': ['Montserrat', 'sans-serif'] },
                    colors: {
                        'rb-yellow': '#FDB813',
                        'rb-black': '#1A1A1B',
                        'rb-blue': '#003366',
                        'rb-bg': '#F8F9FA'
                    }
                }
            }
        }
    </script>
    <style>
        .hero-gradient { background: linear-gradient(135deg, #1A1A1B 0%, #003366 100%); }
        .animate-flicker { animation: flicker 2s infinite; }
        @keyframes flicker { 0%, 100% { opacity: 1; } 50% { opacity: 0.5; } }
    </style>
</head>
<body class="bg-rb-bg font-sans text-rb-black antialiased">

    <header class="bg-white border-b border-slate-200 sticky top-0 z-50 shadow-sm">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <div class="flex items-center">
                    <span class="text-rb-black font-black text-2xl tracking-tighter uppercase">Rawbank</span>
                    <div class="flex ml-2 space-x-1">
                        <span class="w-1.5 h-6 bg-rb-yellow transform -skew-x-12"></span>
                        <span class="w-1.5 h-6 bg-rb-yellow transform -skew-x-12"></span>
                    </div>
                </div>
                <div class="h-6 w-px bg-slate-200 mx-4"></div>
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest hidden md:block italic">Infrastructure Monitoring</span>
            </div>
            
            <div class="flex items-center space-x-3">
                <span class="text-[10px] font-mono text-rb-blue bg-blue-50 px-2 py-1 rounded border border-blue-100 uppercase">Node: <?php echo substr(gethostname(), 0, 8); ?></span>
                <div class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></div>
            </div>
        </div>
    </header>

    <main class="container mx-auto px-6 py-10">
        
        <div class="hero-gradient rounded-[2.5rem] p-12 text-white relative overflow-hidden mb-12 shadow-2xl border-b-8 border-rb-yellow">
            <div class="relative z-10 flex flex-col lg:flex-row justify-between items-center">
                <div class="mb-10 lg:mb-0">
                    <h2 class="text-5xl font-black mb-4 leading-tight">Console de <br><span class="text-rb-yellow">Pilotage Digital.</span></h2>
                    <p class="text-slate-300 text-lg font-light max-w-md">Supervision en temps réel des couches microservices et de l'intégrité du stack QClock.</p>
                </div>
                
                <div class="bg-rb-black/40 backdrop-blur-xl p-10 rounded-3xl border border-white/10 text-center min-w-[300px]">
                    <p class="text-[10px] uppercase tracking-[0.4em] text-rb-yellow font-bold mb-4 italic">Kinshasa Time</p>
                    <div class="text-7xl font-black tabular-nums tracking-tighter mb-2">
                        <?php echo date('H:i:s'); ?>
                    </div>
                    <p class="text-sm font-medium text-slate-300 uppercase tracking-widest border-t border-white/10 pt-4 mt-4">
                        <?php echo date('d F Y'); ?>
                    </p>
                </div>
            </div>
            <i class="fas fa-fingerprint absolute -bottom-10 -left-10 text-[20rem] opacity-5 pointer-events-none"></i>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100 hover:shadow-xl transition-all">
                <div class="text-rb-blue mb-6"><i class="fas fa-server text-3xl"></i></div>
                <h3 class="font-bold text-xl mb-2">Middleware</h3>
                <p class="text-green-600 font-bold text-sm uppercase flex items-center">
                    <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span> Apache 2.4 Active
                </p>
            </div>

            <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100 hover:shadow-xl transition-all">
                <div class="text-rb-yellow mb-6"><i class="fas fa-database text-3xl"></i></div>
                <h3 class="font-bold text-xl mb-2">Persistance</h3>
                <p class="text-rb-blue font-bold text-sm uppercase">MySQL 8.0 Connected</p>
            </div>

            <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100 hover:shadow-xl transition-all">
                <div class="text-rb-black mb-6"><i class="fas fa-shield-alt text-3xl"></i></div>
                <h3 class="font-bold text-xl mb-2">Audit Drivers</h3>
                <p class="text-slate-500 font-bold text-sm uppercase">
                    <?php echo extension_loaded('pdo_mysql') ? '✅ PDO_MYSQL Validé' : '❌ Driver Manquant'; ?>
                </p>
            </div>
        </div>
    </main>

    <footer class="container mx-auto px-6 py-10 mt-10 border-t border-slate-200">
        <div class="flex justify-between items-center text-slate-400 text-[10px] font-bold uppercase tracking-widest">
            <span>&copy; 2026 Rawbank</span>
            <span class="text-rb-blue italic underline decoration-rb-yellow decoration-2">Audela d'une banque,.</span>
        </div>
    </footer>

</body>
</html>