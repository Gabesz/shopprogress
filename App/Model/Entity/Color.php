<?php namespace App\Model\Entity;

use App\Model\Entity\Prop;

class Color extends Prop {

  public function __construct(int $id, string $propValue){
    $this->id = $id;
    $this->propName = 'color';
    $this->propValue = $propValue;
  }
}