FROM qclock-base:latest

# Installation des dépendances PHP pour MySQL
RUN microdnf install -y httpd php php-mysqli php-pdo php-json \
    && microdnf clean all

# Configuration PHP-FPM et logs
RUN mkdir -p /run/php-fpm && \
    sed -i 's|^user = apache|user = bankuser|' /etc/php-fpm.d/www.conf && \
    sed -i 's|^group = apache|group = bankgroup|' /etc/php-fpm.d/www.conf && \
    ln -sf /dev/stdout /var/log/httpd/access_log && \
    ln -sf /dev/stderr /var/log/httpd/error_log

# Copie du code source
COPY --chown=bankuser:bankgroup src/ /var/www/html/

# Script de démarrage
COPY images/app/start-app.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/start-app.sh

EXPOSE 80
CMD ["/usr/local/bin/start-app.sh"]