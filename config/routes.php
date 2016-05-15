<?php

return array(
    # authentication
    'POST:/login'    => array('AuthController', 'authenticateUser', false),
    # error
    'ERROR' => array('DefaultController', 'showError', false),

    # cart API
    'GET:/cart/items'       => array('CartController', 'showDetails', true),
    'POST:/cart/item'       => array('CartController', 'addItem', true),
    'DELETE:/cart/item/{id}'  => array('CartController', 'removeItem', true),
    'DELETE:/cart/items'    => array('CartController', 'clearCart', true),
    'PUT:/cart/item/{id}'   => array('CartController', 'editItem', true),
);

 ?>
