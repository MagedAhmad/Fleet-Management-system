# Fleet-management system (bus-booking system) .  

![bookings image](/public/images/bookings.png)

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
![bookings image](/public/images/trip_stoppages.png)

### postman for the project 
https://www.getpostman.com/collections/c0ea34976781ba255890

### TODO

1- Add test cases
2- Change the order logic for trip->stoppages 


