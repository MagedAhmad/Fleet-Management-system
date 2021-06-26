### installation steps:

```
git clone git@github.com:MagedAhmad/Fleet-management-system.git
cd Fleet-management-system
cp .env.example .env
php artisan key:generate
composer install
```
Change db credentials then

```
php artisan migrate --seed
```


### TODO

1- Add test cases
2- Change the order logic for trip->stoppages 