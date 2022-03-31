#=========================================
# Common stage
#=========================================
FROM phpmyadmin/phpmyadmin:5.1.1 AS builder

# alias settings
RUN echo -e "\n\
    alias ll='ls -la --color'\n\
    " >> ~/.bashrc

# apacheバージョン、portなどの非表示
RUN sed -i -e "s|ServerTokens OS|ServerTokens Prod|" /etc/apache2/conf-available/security.conf
RUN sed -i -e "s|ServerSignature On|ServerSignature Off|" /etc/apache2/conf-available/security.conf

CMD ["apache2-foreground"]
