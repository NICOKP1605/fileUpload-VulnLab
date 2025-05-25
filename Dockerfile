# Gunakan base OS Debian Minimal
FROM debian:latest

# Install Apache, PHP, dan modul yang dibutuhkan
RUN apt-get update && apt-get install -y \
    apache2 \
    php libapache2-mod-php php-mysqli \
	zip \
 	git \
    && apt-get clean

RUN mkdir -p /home/backup/ && \
	git clone https://github.com/natanaeltegar/ourfiles_backup.git /home/backup

RUN chmod 777 /var/www/html/uploads 

# Set document root ke folder default Apache
WORKDIR /var/www/html

# Expose port 80 untuk akses HTTP
EXPOSE 80

# Start Apache saat container berjalan
CMD ["apachectl", "-D", "FOREGROUND"]
