<?php
$incomes = new Incomes();
echo "incomeテーブルのamountカラムの合計: ". $incomes->findTotalIncomes() . "円";


class Incomes 
{
  private $pdo;

  public function __construct()
  {
    $this->pdo = new PDO('mysql:dbname=tq_quest;host=mysql', 'root', 'password');
  }
  public function findTotalIncomes() 
  {
    $incomes = $this->fetchIncomes();
    $totalIncomes = 0;
    foreach ($incomes as $income) {
      $totalIncomes += $income["amount"];
    }
    return $totalIncomes;
  }
  public function fetchIncomes() 
  {
    $sql = 'SELECT * FROM incomes';
    $statement = $this->pdo->prepare($sql);
    $statement->execute();
    $incomes = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $incomes;
  }


}





