FROM ubuntu:16.04

RUN apt-get update -y

RUN ["/bin/bash", "-c", "debconf-set-selections <<< 'mysql-server mysql-server/root_password password root'"]
RUN ["/bin/bash", "-c", "debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password root'"]

RUN apt-get install curl mysql-server php php-mysql php-mcrypt -y
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

ADD . /wingify
WORKDIR /wingify

RUN composer dump-autoload

CMD ["/bin/bash","/wingify/start.sh"]
