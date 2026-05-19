#!/usr/bin/env bash
set -e  # Arrête le script si une commande échoue

echo "=== Installation des dépendances ==="
composer install --no-dev --optimize-autoloader

echo "=== Vider le cache Symfony ==="
php bin/console cache:clear --env=prod

echo "=== Exécution des migrations ==="
php bin/console doctrine:migrations:migrate --no-interaction --env=prod

echo "=== Compilation des assets ==="
# Décommente si tu utilises Webpack Encore
# npm install && npm run build

echo "=== Déploiement terminé ==="
