<?php
session_start();

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

class Prop {
  protected $id;
  protected $propName;
  protected $propValue;

  protected function getPropValue() {
    return $this->propValue;
  }
}

class Size extends Prop {

  public function __construct(int $id, string $propValue){
    $this->id = $id;
    $this->propName = 'size';
    $this->propValue = $propValue;
  }
}

class Color extends Prop {

  public function __construct(int $id, string $propValue){
    $this->id = $id;
    $this->propName = 'color';
    $this->propValue = $propValue;
  }
}

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
        array_splice($this->items, $key, 1);
        break;
      }
    }
  }

  public function getCartItem($key) {
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

$cartItem1 = new CartItem(1, 1, ['color' => new Color(1, 'red'), 'size' => new Size(1, 'XL')]);
$cartItem2 = new CartItem(2, 2, ['color' => new Color(2, 'brown')]);
$cartItem3 = new CartItem(3, 3, ['color' => new Color(3, 'black'), 'size' => new Size(2, 'L')]);
$cart = new Cart;
$cart->add($cartItem1);
$cart->add($cartItem2);

$_SESSION['cart'] = base64_encode(serialize($cart));
$session_cart = unserialize(base64_decode($_SESSION['cart']));


// ez is jó szerkeszteni a mennyiséget
//$cart->editQuantity($cartItem1, 10);
$session_cart->editQuantity($cartItem2, 10);
// vagy ez fenti sor helyett:

//$cartItem1->setQuantity(10);
//$cartItem2->setProperties(['color' => new COlor(3, 'yellow')]);

echo $session_cart->getTotal();

$cartItem4 = new CartItem(1, 1, ['color' => new Color(1, 'red'), 'size' => new Size(1, 'XL')]);
//var_dump($session_cart->getCartItem(0) === $cartItem1);

// print_r($cart->getItems());
//$cart->remove($cartItem1);
//print_r($cart->getItems());
