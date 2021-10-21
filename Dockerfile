FROM php:7.3-cli

RUN apt-get update && apt-get upgrade -y && apt-get install -y --no-install-recommends \
    sudo git libicu-dev zlib1g-dev zip unzip vim libpng-dev ssh-client

RUN docker-php-ext-configure intl && \
	docker-php-ext-install intl mysqli pdo pdo_mysql pcntl bcmath gd

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

ADD docker-entrypoint.sh /bin/entrypoint.sh
RUN chmod +x /bin/entrypoint.sh

RUN useradd -m -u 1000 fabdeljaoued && usermod -aG sudo fabdeljaoued
USER fabdeljaoued

ENTRYPOINT [ "/bin/entrypoint.sh" ]
