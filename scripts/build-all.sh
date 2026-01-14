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
echo "--------------------------------------------------"
echo "🚀 PHASE DE PUBLICATION"
echo "--------------------------------------------------"

# Push vers Docker Hub
echo "Voulez-vous pousser les images vers Docker Hub (ekumbu/qclock-*) ? (y/n)"
read docker_resp
if [ "$docker_resp" == "y" ]; then
    docker push ekumbu/qclock-base:latest
    docker push ekumbu/qclock-app:latest
    docker push ekumbu/qclock-db:latest
    echo "✅ Images publiées sur Docker Hub."
fi

# Push vers GitHub
echo "Voulez-vous synchroniser le code sur GitHub ? (y/n)"
read git_resp
if [ "$git_resp" == "y" ]; then
    git add .
    echo "Entrez votre message de commit :"
    read commit_msg
    git commit -m "$commit_msg"
    git push origin main
    echo "✅ Code synchronisé sur GitHub."
fi