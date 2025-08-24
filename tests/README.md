# LogHttp Package Tests

This directory contains the automated tests for the LogHttp package using Pest.

## Test Structure

```
tests/
├── Attributes/
│   └── InterceptTest.php          # Tests for the Intercept attribute
├── Contracts/
│   └── LogStrategyTest.php        # Tests for the LogStrategy interface
├── Exceptions/
│   └── InterceptorExceptionTest.php # Tests for the custom exception
├── InterceptorTest.php            # Tests for the Interceptor class
├── InterceptMiddlewareTest.php    # Tests for the middleware
├── LogHttpServiceProviderTest.php # Tests for the service provider
├── LogRequestStrategyTest.php     # Tests for the request logging strategy
├── LogResponseStrategyTest.php    # Tests for the response logging strategy
├── LoggerContextTest.php          # Tests for the logging context
├── TestCase.php                   # Base test class
└── Pest.php                       # Pest configuration

```

## Running the Tests

```bash
# Run all tests
composer test

#  Run with coverage
composer test:coverage
```

## Test Coverage

The tests cover:

- ✅ **Attributes**: Creation and configuration of the `Intercept` attribute
- ✅ **Contracts**: The `LogStrategy`interface and its methods
- ✅ **Exceptions**: Custom `InterceptorException`
- ✅ **LoggerContext**: Strategy pattern for logging
- ✅ **LogRequestStrategy**: Strategy for logging requests
- ✅ **LogResponseStrategy**: Strategy for logging responses
- ✅ **Interceptor**: Core interception class
- ✅ **InterceptMiddleware**: Laravel middleware
- ✅ **LogHttpServiceProvider**: The package service provider

## Technologies Used

- **Pest**: Modern and expressive testing framework
- **Orchestra Testbench**: For testing Laravel packages
- **Mockery**: For creating mocks
- **PHPUnit**: Pest's underlying testing engine

## Important Notes

- Tests focus on the structure and interfaces of the classes
- Mocks are used to avoid external dependencies
- Integration tests with Laravel are limited to keep complexity low
- All core package classes are thoroughly tested