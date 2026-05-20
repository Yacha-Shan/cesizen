#!/bin/sh
set -e

echo "=== Permissions sur var/ ==="
chmod -R 777 /var/www/html/var

echo "=== Installation des assets importmap ==="
php /var/www/html/bin/console importmap:install --env=prod

echo "=== Génération du cache Symfony ==="
php /var/www/html/bin/console cache:warmup --env=prod

echo "=== Création du schéma de base de données ==="
php /var/www/html/bin/console doctrine:schema:update --force --env=prod

echo "=== Démarrage Apache ==="
exec "$@"
