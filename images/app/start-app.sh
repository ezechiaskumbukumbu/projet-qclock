#!/bin/bash
set -e

echo "🚀 Démarrage du Stack Applicatif..."

# 1. Préparation du dossier pour le socket PHP-FPM
# On s'assure qu'il existe, sinon PHP-FPM refuse de démarrer
if [ ! -d /run/php-fpm ]; then
    mkdir -p /run/php-fpm
fi

# 2. Démarrage de PHP-FPM en arrière-plan (Daemon)
echo "🐘 Démarrage de PHP-FPM..."
php-fpm -D

# 3. Démarrage d'Apache en avant-plan (Bloquant)
# C'est ce processus qui garde le conteneur en vie
echo "🔥 Démarrage d'Apache..."
httpd -D FOREGROUND