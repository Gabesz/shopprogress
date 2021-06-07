<?php

use PHPUnit\Framework\TestCase;
use App\Model\Entity\CartItem;
use App\Model\Entity\Product;
use App\Model\Entity\Color;
use App\Model\Cart;

class CartTest extends TestCase {

  public function testItemCanBeSameCart(): void
  {
    $product = new Product(1, 1020, 'Mobil device');
    $cartItem1 = new CartItem($product, 1, [new Color(1, 'red')]);
    $cart = new Cart();
    $cart->add($cartItem1);

    $this->assertSame(
        $cart->getItem(0),
        $cartItem1
    );
  }

}