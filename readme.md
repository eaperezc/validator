# Validator

This project is a different way of validating data in the app. The idea was based on the way laravel Validation method works and I think it will help us a lot to have leaner code.

We would do something like this:

```php
$validator = new Validator();
$errors = $validator->validate( $data, [
    'id'            => 'required',
    'name'          => 'required',
    'is_active'     => 'boolean'
]);
```

Of course the idea is that you can combine multiple validation rules for a column as we show here.

```php
$validator = new Validator();
$errors = $validator->validate( $data, [
    'email_address' => 'required|email',
    'status'        => 'required',
    'is_alive'      => 'boolean'
]);
```

This also come with a static kinda Facade that you can use so you dont have to instantiate the $validator object. To do that you just call it this way:

```php
$errors = Validator::check($data, [
    'email_address' => 'email'
]);
```

## Rules

This are the available rules that we have on the library so far. More to come.

| Signature   | Validation                                                             |
|-------------|------------------------------------------------------------------------|
| required    | Validates that the value exists and is not empty                       |
| boolean     | The value must be true or false. Null is not valid                     |
| numeric     | Numeric values like float, integers and strings with numeric values    |
| email       | Only values that match an email address strings. e.g. test@example.com |
| max:param   | Value must be less than the passed parameter (param)                   |
| min:param   | Value must be greater than the passed parameter (param)                |


## Contributing

Just get the code and add more stuff.

Of course if you can add some tests to it, it would be awesome.
Hope you guys enjoy it.
