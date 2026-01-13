#!/bin/bash
# Remplace 'ezekumb' par ton login Docker Hub
USER="ekumbu"

echo "--- Building Base Image ---"
docker build -t $USER/qclock-base:latest -f images/base/Dockerfile .

echo "--- Building App Image ---"
docker build -t $USER/qclock-app:latest -f images/app/Dockerfile .

echo "--- Building DB Image ---"
docker build -t $USER/qclock-db:latest -f images/db/Dockerfile .

# Connexion et Push
docker login
docker push $USER/qclock-base:latest
docker push $USER/qclock-app:latest
docker push $USER/qclock-db:latest