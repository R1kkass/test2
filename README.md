composer install
docker-compose up -d

# Создать таблицу users
docker-compose exec slim php -r 'include "src/Infrastructure/Repository/UserRepository/migrate.php"; (new Migrate)->createTableUser();'