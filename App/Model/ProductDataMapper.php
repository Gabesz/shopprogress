<?php namespace App\Model;

use \PDO;
use App\Model\Entity\Product;

class ProductDataMapper {

  /**
   * @var PDO
   */
  private $pdo;

  /**
   * TABLE the name of database table
   */
  const TABLE = 'product';

  /**
   * ProductDataMapper constructor.
   * @param PDO $pdo
   */
  public function __construct(PDO $pdo)
  {
    $this->pdo = $pdo;
  }

  public function find(string $id) {
    $statement = $this->pdo->prepare("SELECT * FROM ".self::TABLE." WHERE id = :id");
    //$statement->setFetchMode(PDO::FETCH_ASSOC);
    $statement->execute([
        'id' => $id
    ]);
    $data = $statement->fetch();
    if($data) {
      return $this->mapFromRecord($data);
    }
  }

  public function findAll() {
    $statement = $this->pdo->prepare("SELECT id, name, price FROM ".self::TABLE." ");
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $statement->execute();
    $data = $statement->fetchAll();
    if($data) {
      return array_map(function($v)  {
        return $this->mapFromRecord($v);
      }, $data);
    }

  }

  public function save(Product $product) {
    if($this->find($product->getId())) {
      return $this->update($product);
    }else{
      return $this->create($product);
    }
  }

  public function delete(Product $product) {
    if($this->find($product->getId())) {
      $statement = $this->pdo->prepare("DELETE FROM ".self::TABLE." WHERE id = :id LIMIT 1");
      $statement->execute(['id' => $product->getId()]);
    }
  }

  private function create(Product $product) {
    $newProduct = new Product(uniqid(true), $product->getPrice(), $product->getName());
    $statement = $this->pdo->prepare("INSERT into ".self::TABLE." (id, name, price) VALUES (:id, :name, :price)");
    $statement->execute($this->mapToParameters($newProduct));
    return $newProduct;
  }

  private function update(Product $product) {
    $statement = $this->pdo->prepare("UPDATE ".self::TABLE." SET name = :name, price = :price WHERE id = :id");
    $statement->execute($this->mapToParameters($product));
  }

  private function mapFromRecord(array $data) {
    return new Product($data['id'], $data['price'], $data['name']);
  }

  private function mapToParameters(Product $product) {
    return [
        'id' => $product->getId(),
        'name' => $product->getName(),
        'price' => $product->getPrice(),
    ];
  }
}