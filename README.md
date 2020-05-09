## TokenAPI

* Create a Token Economy easy by using TokenAPI.

## Usage

```php
 <?php
 use `Inaayat\Token\TokenAPI;
 ```
 
## You can create an instance by doing:
```php
$token = TokenAPI::getInstance();
```
 
### check the player token by:
```php
$token->myToken($player);
```

### add the player token by:
```php
$token->addToken($player, "50");
```

### reduce the player token by:
```php
$token->reduceToken($player, "50");
```

### set the player token by:
```php
$token->setToken($player, "250");
```

#TokenAPI maked in love by Inaayat.
