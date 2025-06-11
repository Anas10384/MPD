FROM php:8.2-apache

# Install FFmpeg
RUN apt-get update && apt-get install -y ffmpeg

# Enable Apache mods (optional)
RUN a2enmod rewrite

# Copy everything into web root
COPY . /var/www/html/

# Make script executable
RUN chmod +x /var/www/html/start.sh

# Run custom start
CMD ["/var/www/html/start.sh"]
