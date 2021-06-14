<?php namespace App\Model\Entity;

class Product {

  private $id;
  private $price;
  private $name;
  private $properties;

  public function __construct(string $id, float $price, string $name)
  {
    $this->id = $id;
    $this->price = $price;
    $this->name = $name;
    $this->properties = [];
    return $this;
  }

  public function setProperties(array $properties)
  {
    foreach ($properties as $key => $property) {
      $this->properties[$key] = $property;
    }
    return $this;
  }

  public function getProperties(string $key = '')
  {
    if (!empty($key)) {
      if (array_key_exists($key, $this->properties)) {
        return $this->properties[$key];
      }
      throw new \InvalidArgumentException('This property does not exists!');
    }
    return $this->properties;
  }


  /**
   * @return string
   */
  public function getId(): string
  {
    return $this->id;
  }

  /**
   * @return int
   */
  public function getPrice(): float
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

  /**
   * @param float $price
   */
  public function setPrice(float $price): void
  {
    $this->price = $price;
  }

  /**
   * @param string $name
   */
  public function setName(string $name): void
  {
    $this->name = $name;
  }





}