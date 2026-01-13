<?php
echo "<h1>🚀 Projet QClock : Stack Enterprise Opérationnel</h1>";
echo "<p><b>Serveur :</b> " . gethostname() . "</p>";
echo "<p><b>OS Base :</b> Oracle Linux 9 (Slim)</p>";

// Test des extensions critiques pour la banque
echo "<h2>🔍 Audit des Drivers :</h2>";
$extensions = ['pdo_mysql', 'oci8', 'mysqli'];

foreach (\$extensions as \$ext) {
    if (extension_loaded(\$ext)) {
        echo "✅ Extension <b>\$ext</b> : Installée<br>";
    } else {
        echo "❌ Extension <b>\$ext</b> : <span style='color:red'>Manquante</span><br>";
    }
}

echo "<h2>🕒 Heure locale (Kinshasa) :</h2>";
echo date('d-m-Y H:i:s');
?>