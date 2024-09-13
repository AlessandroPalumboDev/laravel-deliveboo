## Start

```bash
composer i
npm i

php artisan storage:link
php artisan db:seed migrate

php artisan db:seed --class UsersTableSeeder
php artisan db:seed --class RestaurantsSeeder
php artisan db:seed --class TypesSeeder
php artisan db:seed --class PlateSeeder
php artisan db:seed --class OrdersTableSeeder
php artisan db:seed --class RestaurantTypeSeeder
php artisan db:seed --class PlateOrderSeeder

npm run dev
php artisan serve
```
