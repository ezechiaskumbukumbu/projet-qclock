<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>🚀 Projet QClock : Stack Enterprise Opérationnel</h1>";
echo "<p><b>Serveur :</b> " . gethostname() . "</p>";

echo "<h2>🔍 Audit des Drivers :</h2>";
$extensions = ['pdo_mysql', 'mysqli'];

foreach ($extensions as $ext) {
    if (extension_loaded($ext)) {
        echo "✅ Extension <b>$ext</b> : Installée<br>";
    } else {
        echo "❌ Extension <b>$ext</b> : <span style='color:red'>Manquante</span><br>";
    }
}

echo "<h2>🕒 Heure locale (Kinshasa) :</h2>";
echo date('d-m-Y H:i:s');
?>