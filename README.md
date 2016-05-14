# Wingify Cart

RestfulAPI for adding/deleting/editing items in Cart

### Setup Instructions

1. `git`, `php` and `composer` are required as prerequisites.
2. clone the repository in a folder, use
```
git clone https://github.com/mayank/wingify-cart.git
```
3. run command to start the server on localhost
```
php -S localhost:8000 index.php
```


### List of RestfulAPI methods


| paths | params | methods | description  |
|---|---|---|---|
| `/cart/items`  |  | GET | lists all the cart items for a user |
| `/login` | username, password | POST | authenticate user |
| `/cart/item` | itemId | POST | adds a new item to cart |
| `/cart/item/{id}` | itemId | DELETE | removes an item from the cart |
| `/cart/item/{id}` | itemId | PUT | edits an item in the cart |
| `/cart/items` | | DELETE | removes all the items from the cart |
