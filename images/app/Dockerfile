FROM qclock-base:latest

# Installation du stack Web (Apache + PHP)
# Responsabilité unique : servir l'application QClock
RUN microdnf install -y \
    httpd \
    php \
    php-mysqli \
    php-pdo \
 && microdnf clean all

# Redirection des logs Apache vers stdout/stderr (Docker best practice)
RUN ln -sf /dev/stdout /var/log/httpd/access_log && \
    ln -sf /dev/stderr /var/log/httpd/error_log

# Déploiement de l'application
COPY --chown=bankuser:bankgroup src/ /var/www/html/

# Port HTTP
EXPOSE 80

# Lancement Apache en mode foreground (obligatoire en container)
CMD ["/usr/sbin/httpd", "-D", "FOREGROUND"]
