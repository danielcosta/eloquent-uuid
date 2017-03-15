# Eloquent UUID Model

If you want your eloquent models to have the primary key as an UUID instead of the default incremental integer, you must use this abstract model on top of your models to convert them to an *Eloquent UUID Model*.

## Install

Just require this package within your composer:

    composer require danielcosta/eloquent-uuid:^1.0

## Sample usage

Using *Eloquent UUID Model* is as simple as just extending the abstract `UUIDEloquentModel`.

```php
use DCST\Database\Eloquent\Models\UUIDEloquentModel;

class Product extends UUIDEloquentModel
{
    // your class model
}

$product = new Product;
$product->name = 'My Awesome Product';
$product->save();

var_dump($product->id); // 55d53549-e772-4765-9467-5a75d33cbf6a
```
