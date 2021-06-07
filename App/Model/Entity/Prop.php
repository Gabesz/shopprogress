<?php namespace App\Model\Entity;

class Prop {
  protected $id;
  protected $propName;
  protected $propValue;

  public function getValue() {
    return $this->propValue;
  }
}