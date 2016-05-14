<?php

return array(
    # authentication
    'POST:/login'    => array('AuthController', 'authenticateUser'),

    # cart API
    'GET:/cart/items'       => array('CartController', 'showDetails'),
    'POST:/cart/item'       => array('CartController', 'addItem'),
    'POST:/cart/item/{id}'  => array('CartController', 'removeItem'),
    'DELETE:/cart/items'    => array('CartController', 'clearCart'),
    'PUT:/cart/item/{id}'   => array('CartController', 'editItem')
);

 ?>
