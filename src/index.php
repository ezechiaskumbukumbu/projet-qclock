<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rawbank | QClock Enterprise</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-slate-50">
    <nav class="bg-[#003366] text-white shadow-xl p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <div class="bg-red-600 p-2 rounded">
                    <i class="fas fa-shield-alt text-xl"></i>
                </div>
                <span class="text-xl font-bold tracking-widest">RAWBANK <span class="text-red-500 italic">QCLOCK</span></span>
            </div>
            <div class="hidden md:block text-sm font-light italic">Core Banking Monitoring System v1.0</div>
        </div>
    </nav>

    <main class="container mx-auto py-10 px-6">
        <div class="mb-8">
            <h2 class="text-3xl font-extrabold text-slate-800">État du Système</h2>
            <p class="text-slate-500 text-lg">Vérification en temps réel de l'infrastructure bancaire.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            <div class="bg-white rounded-2xl p-6 shadow-sm border-b-4 border-green-500 hover:shadow-lg transition-shadow">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-semibold text-slate-400 uppercase">Apache Status</p>
                        <h3 class="text-2xl font-bold text-slate-800 mt-1">Operational</h3>
                    </div>
                    <div class="bg-green-100 p-3 rounded-full"><i class="fas fa-check text-green-600"></i></div>
                </div>
            </div>
            
            <div class="bg-white rounded-2xl p-6 shadow-sm border-b-4 border-blue-500 hover:shadow-lg transition-shadow">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-semibold text-slate-400 uppercase">Local Time (Kinshasa)</p>
                        <h3 class="text-2xl font-bold text-slate-800 mt-1"><?php echo date('H:i:s'); ?></h3>
                    </div>
                    <div class="bg-blue-100 p-3 rounded-full"><i class="far fa-clock text-blue-600"></i></div>
                </div>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-sm border-b-4 border-red-500 hover:shadow-lg transition-shadow">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-semibold text-slate-400 uppercase">Database Link</p>
                        <h3 class="text-2xl font-bold text-slate-800 mt-1">Secured</h3>
                    </div>
                    <div class="bg-red-100 p-3 rounded-full"><i class="fas fa-database text-red-600"></i></div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
            <div class="bg-slate-800 p-6">
                <h3 class="text-white font-bold text-lg">Audit Technique du Stack</h3>
            </div>
            <div class="p-8">
                <table class="w-full">
                    <thead>
                        <tr class="text-left text-slate-400 text-sm border-b">
                            <th class="pb-4">Module Enterprise</th>
                            <th class="pb-4">Statut de Conformité</th>
                            <th class="pb-4">Version/Info</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="py-5 font-bold text-slate-700">PHP Extension: PDO_MYSQL</td>
                            <td><span class="bg-green-100 text-green-700 px-4 py-1 rounded-full text-xs font-bold uppercase"><?php echo extension_loaded('pdo_mysql') ? 'Validé' : 'Erreur'; ?></span></td>
                            <td class="text-slate-500 text-sm">Critical for Data Persistence</td>
                        </tr>
                        </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>