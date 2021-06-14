<?php

require __DIR__ . "/vendor/autoload.php";

use App\Model\Entity\Product;
use App\Model\Entity\CartItem;

// use App\Model\Entity\Size;
use App\Model\Entity\Color;
use App\Model\Cart;
use App\Model\Database;
use App\Model\ProductDataMapper;


$productDataMapper = new ProductDataMapper(Database::getInstance());

$p1 = $productDataMapper->find('160c79e8f98b57');

var_dump($p1);
$p1->setPrice(0.25);
$productDataMapper->save($p1);
$p1 = $productDataMapper->find('160c79e8f98b57');
var_dump($p1);

/*
$product1->setProperties(['color' => new Color(1, 'red')]);

$cart = new Cart;
$cartItem1 = new CartItem($product1, 1);
$cart->add($cartItem1);
*/

// var_dump($cart->getItem(0)->getProduct()->getPrice());
// var_dump($cart->getItem(0)->getProduct()->getName());
//var_dump($cart->getItem(0));
// var_dump($cart->getItem(0)->getProperty('color')->getValue());
//var_dump($cart->getTotalQuantity());
//var_dump($cart->getTotal());
//$cart->remove($cartItem1);