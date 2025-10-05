## Backend Laravel Project V.12

# Install The Environment

- git clone https://your-repo.git
- composer install
- cp .env.example .env
- php artisan key:generate
- create your DB and name it in .env
- php artisan migrate
- php artisan db:seed

composer dump-autoload
php artisan cache:clear
php artisan view:clear
php artisan config:clear
php artisan config:cache
php artisan route:clear
php artisan route:cache
php artisan optimize:clear
php artisan optimize

