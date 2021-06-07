<?php

require __DIR__."/vendor/autoload.php";

use App\Model\Entity\Product;
use App\Model\Entity\CartItem;
// use App\Model\Entity\Size;
use App\Model\Entity\Color;
use App\Model\Cart;

$cart = new Cart;
$product = new Product(1, 120, 'Honda car');
$cartItem1 = new CartItem($product, 1, ['color' => new Color(1, 'red')]);
$cartItem2 = new CartItem($product, 5, ['color' => new Color(2, 'blue')]);
$cart->add($cartItem1);
$cart->add($cartItem2);
var_dump($cart->getItem(0)->getProduct()->getPrice());
var_dump($cart->getItem(0)->getProduct()->getName());
var_dump($cart->getItem(0)->getProperties());
var_dump($cart->getItem(0)->getProperty('color')->getValue());
var_dump($cart->getTotalQuantity());
var_dump($cart->getTotal());