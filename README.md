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
### Available endpoints - (For now)

1- {{url}}/api/buses/1/available_seats
Check available seats on a (bus/trip)

2- {{url}}/api/bookings
Book a seat on bus  

3- {{url}}/api/trips
Show all trips  

4- {{url}}/api/trips/{trip}
Get trip and stoppages points   

![trip stoppages image](/public/images/trip_stoppages.png)

### postman for the project 
https://www.getpostman.com/collections/c0ea34976781ba255890

![postman image](/public/images/postman.png)

### TODO

1- Add test cases   

2- Change the order logic for trip->stoppages 


