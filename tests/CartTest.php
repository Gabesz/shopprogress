<?php

use PHPUnit\Framework\TestCase;
use App\Model\Entity\CartItem;
use App\Model\Entity\Size;
use App\Model\Entity\Color;
use App\Model\Cart;

class CartTest extends TestCase {

  public function testItemCanBeSame(): void
  {
    $cartItem1 = new CartItem(1, 1, [new COlor(1, 'xl')]);
    $cart = new Cart();
    $cart->add($cartItem1);
    $this->assertEquals(
        $cart->getCartItem(0),
        $cartItem1
    );
  }
}