#!/bin/sh
set -e

echo "=== Création du schéma de base de données ==="
php /var/www/html/bin/console doctrine:schema:update --force --env=prod

echo "=== Démarrage Apache ==="
exec "$@"
