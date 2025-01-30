# Utilisation d'une image PHP avec Apache
FROM php:7.4-apache

# Installation des extensions PHP nécessaires
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Mise à jour des paquets et installation des outils nécessaires
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install zip

# Copie des fichiers de l'application dans le conteneur
COPY . /var/www/html/

# Création du répertoire storage s'il n'existe pas déjà
RUN mkdir -p /var/www/html/storage

# Autorisation d'écriture pour le répertoire de stockage
RUN chown -R www-data:www-data /var/www/html/storage \
    && chmod -R 755 /var/www/html/storage

# Configuration d'Apache pour suivre les liens symboliques
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf \
    && a2enmod rewrite

# Exposition du port 80 pour le trafic HTTP
EXPOSE 80

# Commande de démarrage de Apache
CMD ["apache2-foreground"]