🕰️ Projet QClock
Enterprise-Grade Containerized Web Stack
1. Executive Summary

QClock est une implémentation de référence d’un stack web conteneurisé de niveau entreprise, construit intégralement from first principles.
Le projet vise la maîtrise complète du cycle de vie logiciel (SDLC), depuis l’OS jusqu’à l’interface utilisateur, avec un accent fort sur :

la disponibilité opérationnelle,

la sécurité de la supply chain,

la traçabilité et l’auditabilité,

la maintenabilité long terme.

Contrairement aux stacks génériques basés sur des images publiques opaques, chaque couche est construite et contrôlée sur une base Oracle Linux 9, répondant aux exigences des environnements critiques (banque, télécoms, infrastructures régulées).

2. Objectifs du Projet

Démontrer une approche industrielle de construction d’images Docker.

Mettre en œuvre des bonnes pratiques DevSecOps (non-root, images immuables, logs standardisés).

Fournir un socle pédagogique et opérationnel pour la compréhension des stacks web modernes.

Servir de référence interne pour des déploiements futurs en environnements contrôlés.

3. Architecture Générale

Le stack repose sur une hiérarchie d’images immuables, construites séquentiellement afin de garantir cohérence, sécurité et réutilisabilité.

3.1 Hiérarchie des Images
🔹 qclock-base

Base OS : Oracle Linux 9 Slim

Responsabilités :

Hardening minimal du système

Dépôts sécurisés

Certificats racines

Utilisateurs et groupes non-root standardisés

Objectif : point de vérité unique pour tout le stack

🔹 qclock-app

Stack applicatif : Apache 2.4 + PHP-FPM 8.2

Responsabilités :

Exécution PHP non privilégiée

Communication via socket Unix (performance & sécurité)

Exposition HTTP contrôlée

Interopérabilité :

PDO / MySQLi prêts pour intégration Core Systems

🔹 qclock-db

Base de données : MySQL 8.0

Responsabilités :

Persistance via volumes Docker

Configuration réseau explicite

Préparation à des scénarios DRP / backup

4. Interface Utilisateur & Expérience

Le projet inclut un Dashboard de supervision léger, conçu comme une vitrine opérationnelle.

Caractéristiques principales

UI moderne et sobre

Tailwind CSS

Responsive et lisible en contexte NOC / support

Monitoring applicatif

Statut PHP

Disponibilité des extensions critiques

Connectivité base de données

Identité visuelle entreprise

Bleu Nuit / Gris Slate

Lisibilité avant esthétique

5. Standards d’Ingénierie Appliqués
Sécurité

Exécution sans privilèges root

Chaîne d’approvisionnement maîtrisée (microdnf)

Images minimales, surface d’attaque réduite

Exploitabilité

Logs redirigés vers stdout / stderr

Compatibilité native avec outils de centralisation (SIEM, ELK)

Paramétrage via variables d’environnement

Gouvernance

Séparation claire des responsabilités par image

Build reproductible

Versionnement contrôlé

6. Déploiement & Runbook
6.1 Pré-requis

Docker Engine

Docker Compose (v2+)

Accès Internet (CDN UI)

6. Spécifications Techniques
Composant	Technologie	Justification
OS Base	Oracle Linux 9	Support entreprise long terme
Front-end	Tailwind CSS	Performance et agilité
Web Server	Apache 2.4	Robustesse éprouvée
Runtime	PHP 8.2	Stabilité et compatibilité
Base de données	MySQL 8.0	Fiabilité et performance

7. Structure du Repository
projet-qclock/
├── docker-compose.yml      # Orchestration, réseaux, volumes
├── images/
│   ├── base/               # Image OS durcie
│   ├── app/                # Apache + PHP-FPM
│   └── db/                 # MySQL sécurisé
├── src/                    # Code source du Dashboard
├── scripts/                # Scripts de build et d’automatisation
└── README.md               # Documentation principale


9. Procédure de Déploiement (Full Reset)

# 0. Forcer le téléchargement des images de sécurité
docker pull postgres:15
docker pull quay.io/keycloak/keycloak:23.0

# 1. Arrêt complet et purge des volumes
docker compose down -v

# 2. Build complet du stack (base → app → db)
# Force les permissions exécutables sur le script d'entrée de la DB
chmod +x images/db/docker-entrypoint.sh
# Nettoie les éventuels caractères Windows invisibles
sed -i 's/\r$//' images/db/docker-entrypoint.sh

chmod +x scripts/build-all.sh
./scripts/build-all.sh

# 3. Lancement des services
docker compose up -d

# 4. Attente de l'initialisation
echo "Initialisation des services..."
sleep 10

# 5. Vérification de la disponibilité
# Tester Keycloak (Port 8443)
curl -I http://localhost:8081/auth  
# Tester l'App (Port 8080)
curl -I http://localhost:8080

11. Demarrage tout à froid : 

docker compose down -v
docker build -t qclock-app:latest -f images/app/Dockerfile .
docker compose up -d

 Maintenance & Ownership

Auteur / Mainteneur
Ezechias KUMBU KUMBU
Ingénieur Systèmes & Support Applicatif
Spécialiste Cybersecurity & Core Banking System