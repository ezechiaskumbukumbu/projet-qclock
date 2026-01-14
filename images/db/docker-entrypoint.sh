#!/bin/bash
set -e

echo "🔍 Vérification du datadir MySQL..."

if [ ! -d "/var/lib/mysql/mysql" ]; then
    echo "📦 Datadir non initialisé → initialisation MySQL"
    mysqld --initialize-insecure --user=mysql --datadir=/var/lib/mysql
fi

echo "🚀 Lancement MySQL..."
exec "$@"
    