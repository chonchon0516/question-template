<?php
$incomes = new Incomes();
var_dump($incomes->fetchAllIncomes());

class Incomes 
{
  private $pdo;
    public function __construct() {
      $this->pdo = new PDO('mysql:dbname=tq_quest;host=mysql', 'root', 'password');
    }
    public function fetchAllIncomes()
      {
        $sql = 'SELECT * FROM incomes';
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $incomes = $statement->fetchAll(PDO::FETCH_ASSOC); 
        return $incomes;  
      }
}






