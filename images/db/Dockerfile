FROM qclock-base:latest

# Installation (Module D)
RUN microdnf install -y mysql-server && \
    microdnf clean all

# Préparation des répertoires (Module E: Security)
RUN mkdir -p /var/lib/mysql /var/run/mysqld && \
    chown -R mysql:mysql /var/lib/mysql /var/run/mysqld

# Configuration MySQL distantes
RUN echo -e "[mysqld]\nbind-address=0.0.0.0\nskip-name-resolve" > /etc/my.cnf.d/remote.cnf

COPY images/db/docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh

# Fix format Windows et permissions
RUN sed -i 's/\r$//' /usr/local/bin/docker-entrypoint.sh && \
    chmod +x /usr/local/bin/docker-entrypoint.sh

USER mysql
EXPOSE 3306

# Appel explicite via bash pour éviter les problèmes d'interprétation
ENTRYPOINT ["/bin/bash", "/usr/local/bin/docker-entrypoint.sh"]