<?php namespace App\Model\Entity;

class CartItem {

  private $id;
  private $quantity;
  private $properties;

  public function __construct(string $id, int $quantity, array $properties) {
    $this->id = $id;
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

  public function getPrice() {
    return $this->id * 10;
  }
}