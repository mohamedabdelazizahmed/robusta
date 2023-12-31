<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>



## About Laravel Task 

 this project is to implement a building a fleet-management system (bus-booking system) using the latest version of the Laravel Framework.

- Using Docker by Laravel Sail  in the repository.
- Using Factory to seed the table using the command `sail php artisan db: seed`  in the repository.
- implementing 3 endpoints for bus booking.
- implementing test cases for each model using the command `sail php artisan test` to run successfully test case 
- implementing  the Authentication using Laravel Sanctum package 





## Descriptipn 

## Book a Seat

### Endpoint
POST localhost/api/v1/seats/book

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

<hr/>
### Get Available Seats

### Endpoint
GET /api/v1/seats/available/{tripId?}/{BusId?}



### Description

Retrieves the available seats for a specified trip and bus (optional).

### Request Parameters

| Parameter | Type | Description |
|---|---|---|
| tripId | integer (optional) | The ID of the trip (optional) |
| BusId | integer (optional) | The ID of the bus (optional) |

### Response Body

| Parameter | Type | Description |
|---|---|---|
| seats | array | An array of available seat IDs |

### Example Usage

GET /api/v1/seats/available/1
GET /api/v1/seats/available?BusId=2


### Error Codes

| Code | Description |
|---|---|
| 404 | Trip or bus not found |
