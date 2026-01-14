
# 🕰️ Projet QClock : Enterprise Container Stack

## 📋 Présentation du Projet

Dans le cadre de la montée en compétences sur les architectures modernes (post-Sopra Amplitude eBanking 2026), le **projet-qclock** est une implémentation de référence d'un stack web complet construit **"from scratch"**.

L'objectif principal est la maîtrise totale de la chaîne de livraison : nous n'utilisons aucune image pré-configurée du Docker Hub. Chaque couche (OS, middleware, base de données) est compilée et configurée manuellement pour répondre aux exigences de sécurité et d'audit du secteur bancaire.

## 🏗️ Architecture du Stack

Le projet repose sur une hiérarchie d'images construites séquentiellement :

* **Image Socle (`qclock-base`)** : Basée sur **Oracle Linux 9 Slim**. Elle intègre le durcissement système (hardening) et les certificats de sécurité.
* **Service Applicatif (`qclock-app`)** : Serveur Apache, moteur PHP 8.x et Oracle Instant Client 21c (indispensable pour les environnements Amplitude).
* **Service Data (`qclock-db`)** : Instance MySQL 8.0 installée manuellement avec gestion des volumes persistants pour la conformité DRP (Disaster Recovery Plan).

## 🛡️ Standards d'Ingénierie Bancaire

* **Supply Chain Security** : Audit complet des packages installés via le gestionnaire `microdnf`.
* **Non-Root Execution** : Les services ne disposent pas des droits `root` à l'intérieur des conteneurs.
* **Stateless App** : L'application est séparée de ses données, permettant une scalabilité horizontale immédiate.
* **Observabilité** : Centralisation des flux de logs (`access_log`, `error_log`) vers la sortie standard pour intégration SIEM.

---

## 🚀 Guide de Déploiement

### 1. Clonage du dépôt

```bash
git clone https://github.com/votre-compte/projet-qclock.git
cd projet-qclock

```

### 2. Construction du stack (Build from scratch)

Le script de build garantit que les images sont créées dans le bon ordre (Base -> App/DB) :

```bash
chmod +x scripts/build-all.sh
./scripts/build-all.sh

```

### 3. Lancement des services

```bash
docker-compose up -d

```

### 4. Accès au service

L'application QClock est immédiatement disponible sur :
👉 **URL :** `http://localhost:8080`

---

## 📂 Structure du Repository

```text
projet-qclock/
├── docker-compose.yml       # Orchestration des services
├── images/
│   ├── base/                # Définition de l'OS durci (Oracle Linux 9)
│   ├── app/                 # Stack Apache/PHP/Oracle Client
│   └── db/                  # Installation manuelle MySQL Server
├── src/                     # Code source de l'application QClock
├── scripts/                 # Automatisation du cycle de vie (Build/Push)
└── README.md                # Documentation technique

```

---

## 📊 Spécifications Techniques

| Composant | Technologie | Justification |
| --- | --- | --- |
| **Système Hôte** | Oracle Linux 9 | Standard de l'industrie pour les DB Oracle & Amplitude |
| **Serveur Web** | Apache (httpd) | Stabilité éprouvée en environnement transactionnel |
| **Runtime** | PHP 8.2 | Version LTS supportée pour les applications bancaires |
| **Base de Données** | MySQL 8.0 | Performance et compatibilité avec les outils d'audit |
| **Connectivité** | OCI8 / Oracle IC | Communication native avec le Core Banking |

---
Lancement du project
======================
# 1. On arrête tout et on supprime les volumes (données DB corrompues)
docker compose down -v

# 2. On rebuild les images pour intégrer le script de démarrage PHP-FPM
./scripts/build-all.sh

# 3. On lance
docker compose up -d

# 4. On attend 10 secondes que MySQL s'initialise
sleep 10

# 5. On vérifie la page
curl -I http://localhost:8080

## 👤 Contact & Maintenance

**Ezechias KUMBU KUMBU** *Core Banking System Support Officer* Département IT / Support Applicatif

