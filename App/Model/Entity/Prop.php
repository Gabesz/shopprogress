<?php namespace App\Model\Entity;

abstract class Prop {
  protected $id;
  protected $propName;
  protected $propValue;

  public function getValue() {
    return $this->propValue;
  }
}