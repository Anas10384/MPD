FROM php:8.2-apache

# Install FFmpeg
RUN apt-get update && apt-get install -y ffmpeg

# Enable Apache rewrite (optional)
RUN a2enmod rewrite

# Copy app files
COPY . /var/www/html/

# Make script executable
RUN chmod +x /var/www/html/start.sh

# Run script + apache
CMD ["/var/www/html/start.sh"]
