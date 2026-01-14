<?php
/**
 * QClock Intelligence Dashboard - Rawbank Official
 * @version 1.3.0 | @author Ezechias KUMBU KUMBU
 */
date_default_timezone_set('Africa/Kinshasa');
session_start();

function checkService($host, $port) {
    $fp = @fsockopen($host, $port, $errno, $errstr, 0.5);
    if ($fp) { fclose($fp); return true; }
    return false;
}

$services = [
    ['name' => 'MySQL Database', 'icon' => 'fa-database', 'status' => checkService('database', 3306)],
    ['name' => 'Keycloak IAM', 'icon' => 'fa-key', 'status' => checkService('qclock-auth-provider', 8080)],
    ['name' => 'PHP 8.2 Engine', 'icon' => 'fa-code', 'status' => true],
    ['name' => 'Oracle Linux 9', 'icon' => 'fa-linux', 'status' => true]
];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Rawbank | QClock Intelligence</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { font-family: 'Montserrat', sans-serif; background: #F3F4F6; }
        .hero-gradient { background: linear-gradient(135deg, #1A1A1B 0%, #003366 100%); }
        .rb-bars { height: 24px; width: 4px; background-color: #FDB813; transform: skewX(-15deg); margin-left: 3px; }
        .status-pill { font-size: 0.65rem; padding: 3px 10px; border-radius: 99px; font-weight: 800; color: white; }
        .online { background: #10B981; } .offline { background: #EF4444; animation: pulse 2s infinite; }
        @keyframes pulse { 0%, 100% { opacity: 1; } 50% { opacity: 0.5; } }
    </style>
</head>
<body class="antialiased">
    <header class="bg-white border-b-2 border-rb-yellow sticky top-0 z-50 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center">
                <span class="font-black text-2xl uppercase">Rawbank</span>
                <div class="flex ml-2"><div class="rb-bars"></div><div class="rb-bars"></div></div>
            </div>
            <span class="text-[10px] font-mono bg-blue-50 px-3 py-1 rounded border border-blue-200">NODE: <?= substr(gethostname(), 0, 8) ?></span>
        </div>
    </header>

    <main class="container mx-auto px-6 py-10">
        <div class="hero-gradient rounded-[2.5rem] p-12 text-white mb-12 shadow-2xl border-b-8 border-[#FDB813]">
            <div class="flex flex-col lg:flex-row justify-between items-center">
                <div>
                    <h2 class="text-5xl font-black mb-4">Console de <br><span class="text-[#FDB813] italic">Pilotage Digital.</span></h2>
                    <p class="text-slate-300 border-l-2 border-[#FDB813] pl-4">Supervision critique <span class="text-white font-bold">QCLOCK</span>.</p>
                </div>
                <div class="bg-black/30 backdrop-blur-md p-8 rounded-3xl text-center min-w-[300px]">
                    <div class="text-6xl font-black mb-2"><?= date('H:i:s') ?></div>
                    <p class="text-xs tracking-[0.3em] text-[#FDB813] uppercase"><?= date('d F Y') ?></p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
            <?php foreach ($services as $s): ?>
            <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 <?= $s['status'] ? 'border-green-500' : 'border-red-500' ?>">
                <div class="flex justify-between mb-4">
                    <i class="fas <?= $s['icon'] ?> text-2xl text-[#003366]"></i>
                    <span class="status-pill <?= $s['status'] ? 'online' : 'offline' ?>"><?= $s['status'] ? 'UP' : 'DOWN' ?></span>
                </div>
                <h4 class="font-bold text-xs uppercase"><?= $s['name'] ?></h4>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="bg-[#003366] p-8 rounded-3xl text-white flex justify-between items-center">
            <div>
                <h4 class="text-[#FDB813] font-bold text-xs uppercase tracking-widest mb-4">Accréditations Keycloak (IAM)</h4>
                <p class="text-sm">Manager : <strong>Donald MBASSA</strong> (AUDIT_VIEWER)</p>
            </div>
            <a href="export_pdf.php" target="_blank" class="bg-[#FDB813] text-[#003366] px-6 py-3 rounded-xl font-black text-xs uppercase hover:scale-105 transition-transform">
                Générer Rapport PDF
            </a>
        </div>
    </main>
    <script>setTimeout(() => { window.location.reload(); }, 30000);</script>
</body>
</html>