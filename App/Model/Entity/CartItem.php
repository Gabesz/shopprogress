<?php namespace App\Model\Entity;

class CartItem {

  private $product;
  private $quantity;
  private $properties;

  public function __construct(Product $product, int $quantity, array $properties) {
    $this->product = $product;
    $this->quantity = $quantity;
    $this->properties = $properties;
  }

  public function setProperties(array $properties) {
    $this->properties = $properties;
  }

  public function setQuantity(int $quantity) {
    $this->quantity = $quantity;
  }

  public function getQuantity() {
    return $this->quantity;
  }

  public function getProduct() {
    return $this->product;
  }

  public function getProperties() {
    return $this->properties;
  }

  public function getProperty($key) {
    return $this->properties[$key];
  }
}