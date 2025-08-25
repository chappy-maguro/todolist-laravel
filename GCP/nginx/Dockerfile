# Receive the full PHP image name as a build argument
ARG PHP_IMAGE

# Use the pre-built PHP image as a builder stage
FROM ${PHP_IMAGE} AS php_builder

FROM nginx:1.26.3

# Copy the nginx configuration file
COPY ./GCP/nginx/default_production.conf /etc/nginx/conf.d/default.conf

# Copy the public directory (which contains assets) from the PHP image
COPY --from=php_builder /var/www/html/public /var/www/html/public