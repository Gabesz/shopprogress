<?php namespace App\Model\Entity;

use App\Model\Entity\Prop;

class Size extends Prop {

  public function __construct(int $id, string $propValue){
    $this->id = $id;
    $this->propName = 'size';
    $this->propValue = $propValue;
  }
}