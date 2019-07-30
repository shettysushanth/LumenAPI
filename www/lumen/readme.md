
## Official Documentation

Documentation for the framework can be found on the [Lumen website](http://lumen.laravel.com/docs).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Lumen framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)


## ReadMe Documentation

The application is uploaded as zip file and it is dockerised. As mentioned the REST end point to manage products,users and providing suggestion of products is implemented. Steps to use the application:

- The project is built using Lumen Rest framework
- docker-compose.yml file is in the root directory
- Run "docker-compose up -d"
- Have attached the database.sql file for "database" backup, import the data to start on.
- The application file system is inside "www/lumen/" directory.
- The "database" directory in the file has seed files to add user, products, purchased products from the CSV.
- If required the seed files can be used to do the migrations, else the database sql file can be imported in directly.
- The http controller directory has the controlled end points to do all the operations.
- The phpunit TDD is added into the respective directories.
- I am not sure whether the view interface to use the REST endpoint is required or not, So I have added a basic "signin" inside public directory and also "dashboard" file which actually shows the purchased product and available recommendations.
:8080/signin.php
:8080/dashboard.php (after login will be redirected)
The interface can be done better , but I  have just kept this plain simple.


## Usage of endpoints

- /login is a POST API
    pass body parameters "email" & "password"
    Eg:email/password - mac94@moen.com/123456

    This will return the data with user json and also api_token

- /register is the POST API
    pass body parameters "username", "email", "name" & "password"


- /user is the GET API
    need to pass the authorisation "api_token" as authorisation key/value OR pass the "api_token" as the request param in URL.

    This returns logged in user details.

- /users is the GET API
    need to pass the authorisation "api_token" as authorisation key/value OR pass the "api_token" as the request param in URL.

    This returns all user details.

- /products is GET API

    Have kept these api as unauthenticated

- /product is post API

    To create a product using API

- /product/{id} has GET, PUT and DELETE API 

    This API can be used to manage products.

- /user/products has GET & POST

    This is an authenticated API and need to login as the user to use this API
    Example login - mac94@moen.com/123456 
    GET API will return all the user purchased products
    POST API will add a product to user's purchased list

- /user/products/suggestions

    This is an authenticated API and need to login as the user to use this API
    Example login - mac94@moen.com/123456
    GET API will return all the user suggestion products
    As we do not have category, subcategory or product class to map the suggested products, I have just used the product name mapping to show suggested products.