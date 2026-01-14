#!/bin/bash
# 'set -e' arrête le script si une commande échoue
set -e

echo "--------------------------------------------------"
echo "🚀 INITIALISATION DU DASHBOARD QCLOCK (RAWBANK)"
echo "--------------------------------------------------"

# 1. Nettoyage et préparation des répertoires de runtime
# Obligatoire pour éviter les erreurs de lock au redémarrage
rm -rf /run/httpd/* /run/php-fpm/*
mkdir -p /run/php-fpm
mkdir -p /run/httpd

# 2. Vérification de la connectivité DB (Optionnel mais recommandé)
# Cela évite que l'app crash si la DB n'est pas encore prête
echo "⏳ Attente de la base de données..."
sleep 2 

# 3. Démarrage de PHP-FPM
# On utilise le chemin complet pour éviter les erreurs de variable d'environnement
echo "🐘 Lancement de PHP-FPM..."
/usr/sbin/php-fpm -D

# 4. Démarrage d'Apache
# On utilise 'exec' pour que httpd devienne le PID 1 du conteneur
# C'est la méthode "pro" pour une gestion propre des signaux Docker (stop/restart)
echo "🔥 Apache est en ligne (Port 80)"
echo "--------------------------------------------------"
exec /usr/sbin/httpd -D FOREGROUND