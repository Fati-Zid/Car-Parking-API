
# Car Parking API using Laravel Sanctum

This is a step-by-step guide to creating a real-life API for a car parking application using Laravel Sanctum. The API is designed to be used by a front-end client or a mobile app, with no visual layer.





## Table of Contents

 - [Installation](https://github.com/Fati-Zid/Car-Parking-API/edit/main/README.md#Installation)
 - [Features](https://github.com/Fati-Zid/Car-Parking-API/edit/main/README.md#Features)
 - [Usage](https://github.com/Fati-Zid/Car-Parking-API/edit/main/README.md#Usage)
 - [Tests](https://github.com/Fati-Zid/Car-Parking-API/edit/main/README.md#Tests)
 - [Documentation](https://github.com/Fati-Zid/Car-Parking-API/edit/main/README.md#Documentation)
 - [Contributing](https://github.com/Fati-Zid/Car-Parking-API/edit/main/README.md#Contributing)
 - [License](https://github.com/Fati-Zid/Car-Parking-API/edit/main/README.md#License)
 





## Installation

To get started with the project, follow these steps:

1. Clone the repository to your local machine:` git clone https://github.com/Fati-Zid/Car-Parking-API.git`
 2. Install dependencies by running `composer install`
3. Create a copy of the `.env.example` file and rename it to `.env`
4. Generate a new application key by running `php artisan key:generate`
5. Set up your database credentials in the `.env file`
6. Run migrations by running `php artisan migrate`
7. Start the server by running `php artisan serve`
 
## Features

Here are some of the features covered in this API:

- User registration and login
- Profile and password management
- Managing vehicles and parking start/stop events
- Non-public endpoints Auth protection by Laravel Sanctum



## Usage

To use the API, you can send HTTP requests to the endpoints described in the documentation.

## Tests
Automated PHPUnit tests have been included to ensure the API is working as expected. To run the tests, run `vendor/bin/phpunit`.

## Documentation
The documentation for the API has been generated using Swagger. You can view it by running the server and navigating to `/api/documentation`.

## Contributing
If you'd like to contribute to the project, feel free to submit a pull request. Please follow the coding standards and make sure your code passes the tests before submitting.

## License
This project is licensed under the MIT License - see the LICENSE file for details.

[![My Skills](https://skills.thijs.gg/icons?i=laravel,php,mysql)](https://skills.thijs.gg)
