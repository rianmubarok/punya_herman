git clone https://github.com/rianmubarok/punya_herman.git
cd punya_herman
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm install && npm run build
php artisan serve
