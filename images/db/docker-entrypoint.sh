#!/bin/bash
set -e

DATADIR="/var/lib/mysql"
echo "🚩 [QCLOCK-DB] Initialisation du cycle de vie..."

# Sécurité : Fix des permissions sur les volumes montés
chown -R mysql:mysql $DATADIR /var/run/mysqld

# Initialisation si répertoire vide
if [ ! -d "$DATADIR/mysql" ]; then
    echo "📦 [QCLOCK-DB] Initialisation du stockage (First Run)..."
    mysqld --initialize-insecure --user=mysql --datadir=$DATADIR
    echo "✅ [QCLOCK-DB] Stockage initialisé."
fi

echo "🚀 [QCLOCK-DB] Transfert du contrôle à mysqld (PID 1)..."
# L'instruction exec garantit que le conteneur ne s'arrête pas (Code 0)
exec mysqld --user=mysql --datadir=$DATADIR --bind-address=0.0.0.0 --console