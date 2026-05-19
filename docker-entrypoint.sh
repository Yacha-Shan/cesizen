#!/bin/sh
set -e

echo "=== Lancement des migrations ==="
php /var/www/html/bin/console doctrine:migrations:migrate --no-interaction --env=prod

echo "=== Démarrage Apache ==="
exec "$@"
