<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>



## About Laravel Task 

 this project is to implement a building a fleet-management system (bus-booking system) using the latest version of the Laravel Framework.

- Using Docker by Laravel Sail  in the repository.
- Using Factory to seed the table using the command `php artisan db: seed`  in the repository.
- implementing 3 endpoints for bus booking.
- implementing test cases for each model 





## Descriptipn 

## Book a Seat

### Endpoint
POST localhost/api/seats/book

### Description

Books a seat on a bus trip for a specified user.

### Request Body

| Parameter | Type | Description |
|---|---|---|
| trip_id | integer | The ID of the trip |
| bus_id | integer | The ID of the bus |
| user_id | integer | The ID of the user |
| end_station_id | integer | The ID of the end station |

### Response Body

| Parameter | Type | Description |
|---|---|---|
| message | string | Success message if the seat is booked successfully |
| error | string | Error message if the seat booking fails |











