FROM qclock-base:latest

# Installation du serveur MySQL
RUN microdnf install -y mysql-server &&     microdnf clean all

# Configuration pour accepter les connexions réseau
RUN echo -e "[mysqld]\nbind-address = 0.0.0.0\nskip-networking = 0" > /etc/my.cnf.d/remote.cnf

# Préparation du répertoire de données
RUN mkdir -p /var/lib/mysql && chown -m mysql:mysql /var/lib/mysql

# Initialisation de la base de données (système)
RUN mysqld --initialize-insecure --user=mysql

EXPOSE 3306

# On lance MySQL en mode safe
CMD ["mysqld", "--user=mysql"]
