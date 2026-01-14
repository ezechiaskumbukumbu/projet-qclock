FROM qclock-base:latest

# Installation Apache / PHP / Modules
RUN microdnf install -y httpd php php-mysqli php-pdo php-fpm && \
    microdnf clean all

# Configuration PHP-FPM (Socket et User)
# On force PHP-FPM à écouter sur un socket UNIX et à tourner sous 'bankuser'
RUN mkdir -p /run/php-fpm && \
    sed -i 's|^user = .*|user = bankuser|' /etc/php-fpm.d/www.conf && \
    sed -i 's|^group = .*|group = bankgroup|' /etc/php-fpm.d/www.conf && \
    sed -i 's|^listen = .*|listen = /run/php-fpm/www.sock|' /etc/php-fpm.d/www.conf && \
    sed -i 's|^listen.acl_users = .*|listen.acl_users = apache,nginx,bankuser|' /etc/php-fpm.d/www.conf

# Logs vers stdout
RUN ln -sf /dev/stdout /var/log/httpd/access_log && \
    ln -sf /dev/stderr /var/log/httpd/error_log

# Copie des sources
COPY --chown=bankuser:bankgroup src/ /var/www/html/

# Copie du script de démarrage
COPY images/app/start-app.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/start-app.sh

EXPOSE 80

# On lance notre script maitre
CMD ["/usr/local/bin/start-app.sh"]