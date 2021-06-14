<?php namespace App\Model\Entity;

class CartItem {

  private $product;
  private $quantity;

  public function __construct(Product $product, int $quantity)
  {
    $this->product = $product;
    $this->quantity = $quantity;
    return $this;
  }

  public function setQuantity(int $quantity) {
    $this->quantity = $quantity;
    return $this;
  }

  public function getQuantity() {
    return $this->quantity;
  }

  public function getProduct() {
    return $this->product;
  }

}