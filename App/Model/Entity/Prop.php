<?php namespace App\Model\Entity;

class Prop {
  protected $id;
  protected $propName;
  protected $propValue;

  protected function getPropValue() {
    return $this->propValue;
  }
}