# On hérite de NOTRE image de base, pas d'une image publique
FROM qclock-base:latest

# Installation manuelle d'Apache et PHP
# On ajoute le repo Oracle Instant Client pour la connexion à la DB Amplitude
RUN microdnf install -y \
    httpd \
    php \
    php-mysqli \
    php-pdo \
    oracle-instantclient-release-el9 && \
    microdnf install -y \
    oracle-instantclient-basic \
    php-oci8-21c && \
    microdnf clean all

# Configuration des logs vers la console (Observabilité)
# On force Apache à envoyer ses erreurs vers /dev/stderr
RUN ln -sf /dev/stdout /var/log/httpd/access_log && \
    ln -sf /dev/stderr /var/log/httpd/error_log

# Copie du code source
COPY --chown=bankuser:bankgroup src/ /var/www/html/

# On expose le port 80 (HTTP)
EXPOSE 80

# On lance Apache en mode premier plan
CMD ["/usr/sbin/httpd", "-D", "FOREGROUND"]