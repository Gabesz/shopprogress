<?php
require __DIR__ . '/vendor/autoload.php';

use App\Model\Cart;
use App\Model\Entity\CartItem;
use App\Model\Entity\Color;
use App\Model\Entity\Size;

session_start();



$cartItem1 = new CartItem(1, 1, ['color' => new Color(1, 'red'), 'size' => new Size(1, 'XL')]);
$cartItem2 = new CartItem(2, 2, ['color' => new Color(2, 'brown')]);
$cartItem3 = new CartItem(3, 3, ['color' => new Color(3, 'black'), 'size' => new Size(2, 'L')]);
$cart = new Cart;
$cart->add($cartItem1);
$cart->add($cartItem2);

$_SESSION['cart'] = base64_encode(serialize($cart));
$session_cart = unserialize(base64_decode($_SESSION['cart']));

