FROM nginx
COPY nginx.conf /etc/nginx/conf.d/default.conf

# Copy PHP files to NGINX's HTML directory
COPY . /usr/share/nginx/html

# (Optional) Install necessary PHP extensions if required
RUN docker-php-ext-install mysqli

# Expose port 80
EXPOSE 80

# Command to start NGINX (daemon off keeps NGINX running in the foreground)
CMD ["nginx", "-g", "daemon off;"]



