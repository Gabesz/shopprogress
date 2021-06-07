<?php namespace App\Model;

use App\Model\Entity\CartItem;

class Cart {

  private $items;

  public function add(CartItem $item){
    $this->items[] = $item;
  }

  public function editQuantity(CartItem $cartItem, int $quantity) {
    foreach($this->items as $item) {
      if($item == $cartItem){
        $item->setQuantity($quantity);
        break;
      }
    }
  }

  public function remove(CartItem $cartItem) {
    foreach($this->items as $key => $item) {
      if($item == $cartItem){
        unset($this->items[$key]);
        break;
      }
    }
  }

  public function getItem($key) {
    return $this->items[$key];
  }

  public function getItems() {
    return $this->items;
  }

  public function getTotal() {
    return empty($this->items)? 0 : array_sum(array_map(function(CartItem $v)  {
      return $v->getPrice() * $v->getQuantity();
    }, $this->items));
  }

  public function getTotalQuantity() {
    return empty($this->items)? 0 : array_sum(array_map(function(CartItem $v){
      return $v->getQuantity();
    }, $this->items));
  }
}
