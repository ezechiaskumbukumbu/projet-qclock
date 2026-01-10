# 1. Utiliser une image Apache existante (le serveur web)
FROM httpd:2.4

# 2. Copier notre fichier index.html dans le dossier web d'Apache
COPY ./index.html /usr/local/apache2/htdocs/

# 3. Dire à Docker d'ouvrir le port 80 (standard pour le web)
EXPOSE 80