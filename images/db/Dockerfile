FROM qclock-base:latest

RUN microdnf install -y mysql-server && \
    microdnf clean all

RUN mkdir -p /var/lib/mysql /var/run/mysqld && \
    chown -R mysql:mysql /var/lib/mysql /var/run/mysqld

RUN echo -e "[mysqld]\nbind-address=0.0.0.0" > /etc/my.cnf.d/remote.cnf

COPY images/db/docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

EXPOSE 3306

ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["mysqld", "--user=mysql"]
