# Validator

This project is a different way of validating data in the app. The idea was based on the way laravel Validation method works and I think it will help us a lot to have leaner code.

We would do something like this:

```php
$errors = $validator->validate( $data, [
    'id'            => 'required',
    'name'          => 'required',
    'is_active'     => 'boolean'
]);
```

Of course the idea is that you can combine multiple validation rules for a column as we show here.

```php
$errors = $validator->validate( $data, [
    'account_id' => 'required|entity_key',
    'status'     => 'required',
    'is_alive'   => 'boolean'
]);
```






## Contributing

Just get the code and add more stuff.

Of course if you can add some tests to it, it would be awesome.
Hope you guys enjoy it.
