FROM php:7.1-cli

CMD ["/bin/bash"]

WORKDIR /var/www/app

COPY . /var/www/app