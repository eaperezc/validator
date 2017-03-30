# Validator

This project is a different way of validating data in the app. The idea was based on the way laravel Validation method works and I think it will help us a lot to have leaner code. 

So... instead of doing something like this:

```php
if ( !Lib_Utils::isEntityKey($data['template_id']) ) {
    $valid = false;
    $result['error'] = 'The error';
}

if ( !Lib_Utils::isEntityKey($data['group_id']) ) {
    $valid = false;
    $result['error'] = 'The error';
}

if ( !Lib_Utils::isEntityKey($data['page_id']) ) {
    $valid = false;
    $result['error'] = 'The error';
}

if ( !Lib_Utils::isEntityKey($data['layer_id']) ) {
    $valid = false;
    $result['error'] = 'The error';
}
```

We would do something like this:

```php
$errors = $validator->validate( $data, [
    'template_id' => 'entity_key',
    'group_id'    => 'entity_key',
    'page_id'     => 'entity_key',
    'layer_id'    => 'entity_key'
]);
```

And of course we can add more validations to this process. These are a couple of other validation rules that are available:

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
