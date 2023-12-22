# Use the official PHP with Apache image as the base image
FROM php:7.4-apache

# Create a directory named 'app' within the container
RUN mkdir /app

# Set the working directory to the 'app' directory
WORKDIR /app

# Copy the PHP application files from the host to the 'app' directory in the container
COPY . .

# Copy the contents from the 'app' directory to the Apache document root (/var/www/html)
RUN cp -R ./* /var/www/html/

# (Optional) Install necessary PHP extensions if required
RUN docker-php-ext-install mysqli

# Expose port 80 (default port for Apache)
EXPOSE 80
