<?php

require __DIR__."/vendor/autoload.php";

use App\Model\Entity\Product;
use App\Model\Entity\CartItem;
// use App\Model\Entity\Size;
use App\Model\Entity\Color;
use App\Model\Cart;


$product = new Product(1, 120, 'Honda car');
$cartItem1 = new CartItem($product, 1, ['color' => new Color(1, 'red')]);
$cart = new Cart;
$cart->add($cartItem1);
var_dump($cart->getItem(0)->getProduct()->getName());
var_dump($cart->getItem(0)->getProperties());

$cart->getItem(0)->getProperty('color');