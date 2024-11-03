# Log-http
Log HTTP requests and responses in Laravel applications using PHP attributes.


# How to install 
```php
composer require shoesten-tag/log-http
```
# Notes
* The default setting for both request and response logging is false. You can enable both by setting them to true or enable only one of them as needed.

* Currently, logging is done only in the Laravel log file. However, if you change the logging channel, logs will be sent to the specified channel instead.

* __Not recommended for production use__!

# How to use 

Add middleware to your routes


```php
//Example
Route::resource('/dashboard', DashboardController::class)->middleware('log-http');
```

## Log the response within the method
```php
  #[Intercept(response: true)]
    public function index(){
        return new Collection(Employee::all());
    }
```

## Log the request within the method
```php
  #[Intercept(request: true)]
    public function index(){
        return new Collection(Employee::all());
    }
```

## Enable logging of requests and responses within the class
```php
#[Intercept(request: true, response: true)]
class EmployeeController extends Controller
{
     public function index(){
        return new Collection(Employee::all());
    }
}



