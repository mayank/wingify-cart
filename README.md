# Wingify Cart

RestfulAPI for adding/deleting/editing items in Cart

### Setup Instructions

> Using Docker Image

* build docker image and deploy

```
$ docker build -t wingify . 
$ docker run -p8000:8000 -d wingify
```

OR

> Native Setup

* `git`, `php`, `mysql` and `composer` are required as prerequisites.
* clone the repository in a folder, use

```
git clone https://github.com/mayank/wingify-cart.git
```

* change directory to the project directory

```
cd wingify-cart
```

* run command to dump the mysql database

```
mysql -u<your-username> -p<your-password> < sql/dump.sql
```

* run composer autoloader command to autoload classes

```
composer dump-autoload
```

* replace database configurations in `config/database.php` file
* run command to start the server on localhost listening to 8000 port

```
php -S localhost:8000 index.php
```



### List of RestfulAPI methods


| paths | params | methods | description  | response
|---|---|---|---|---|
| `/login` | username, password | POST | authenticate user | {"status":true,"message":"Already LoggedIn"} |
| `/item`  |  | GET | lists all the items | {"items":[{"itemId":"6","itemName":"Music CD","price":"300"}]}
| `/item/{id}` | itemId | GET | shows details of item of given itemId | {"item":{"itemId":"6","itemName":"Music CD","price":"300"}} |
| `/item` | price, itemName | POST | adds a new item | {"item":{"itemName":"Music CD","price":"300","itemId":"6"}} |
| `/item/{id}` | itemId | POST | updates existing details of item |  {"item":{"itemId":"6","itemName":"Game of Thrones Book","price":"500"}} |
| `/item/{id}` | | DELETE | deletes a specific item | { "status": true } |

here is [link to postman][] for more details


[link to postman]: https://www.getpostman.com/collections/3a118cb196e1e2cd6f5e
