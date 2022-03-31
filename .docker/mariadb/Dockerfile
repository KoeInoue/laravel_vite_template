FROM mariadb:10.6

# alias settings
RUN echo -e "\n\
    alias ll='ls -la --color'\n\
    " >> ~/.bashrc

COPY .docker/mariadb/my.cnf /etc/mysql/conf.d/my.cnf
