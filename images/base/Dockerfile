# On part de l'image la plus nue possible certifiée par Oracle
FROM oraclelinux:9-slim

# Mise à jour de sécurité immédiate (Audit Compliance)
# 'microdnf' est la version légère de 'dnf' présente dans les images minimales
RUN microdnf update -y && \
    microdnf install -y shadow-utils && \
    microdnf clean all

# Création d'un utilisateur non-privilégié 'bankuser'
# En banque, on ne fait JAMAIS tourner un service en tant que 'root' (UID 0)
RUN groupadd -g 1001 bankgroup && \
    useradd -u 1001 -g bankgroup -s /bin/bash -m bankuser

# Définition des variables d'environnement globales
ENV TZ=Africa/Kinshasa