<?php namespace App\Model\Entity;

class Product {

  private $id;
  private $price;
  private $name;

  public function __construct(int $id, int $price, string $name) {
    $this->id = $id;
    $this->price = $price;
    $this->name = $name;
  }

  /**
   * @return int
   */
  public function getId(): int
  {
    return $this->id;
  }

  /**
   * @return int
   */
  public function getPrice(): int
  {
    return $this->price;
  }

  /**
   * @return string
   */
  public function getName(): string
  {
    return $this->name;
  }



}