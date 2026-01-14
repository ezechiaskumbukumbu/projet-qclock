#!/bin/bash
echo "------------------------------------------"
echo "🚀 BUILD DU STACK PROJET-QCLOCK"
echo "------------------------------------------"

echo "📦 1. Build de l'image BASE..."
docker build -t qclock-base:latest -f images/base/Dockerfile .

echo "💻 2. Build de l'image APP (Apache/PHP)..."
docker build -t qclock-app:latest -f images/app/Dockerfile .

echo "🗄️ 3. Build de l'image DB (MySQL)..."
docker build -t qclock-db:latest -f images/db/Dockerfile .

echo "✅ Terminé ! Tape 'docker images' pour voir tes créations."