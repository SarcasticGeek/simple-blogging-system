## Install:

- `cd simple-blogging-system`
- `composer install`
- `cp .env-example .env` and open `.env` to change Database env vars
- `php artisan config:cache`
- `php artisan migrate`
- Register with any accout of yours and change in DB (select your user in `users` table and replace `is_admin` with 1)
- `php artisan serve`
