FROM qclock-base:latest

RUN microdnf install -y mysql-server && \
    microdnf clean all

# Préparation des répertoires avec les droits appropriés
RUN mkdir -p /var/lib/mysql /var/run/mysqld && \
    chown -R mysql:mysql /var/lib/mysql /var/run/mysqld && \
    chmod 777 /var/run/mysqld

RUN echo -e "[mysqld]\nbind-address=0.0.0.0" > /etc/my.cnf.d/remote.cnf

COPY images/db/docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

EXPOSE 3306

# Utilisation du chemin absolu pour éviter les erreurs de PATH
ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]