<?php 
class Acrrual extends Db
{
 public function addAcrrual($sum,$comment,$date,$userId) // метод для добавления начисления пользователю
 {
  $sql = "INSERT INTO accruals(sum,comment,date,user_id) VALUES (?,?,?,?)";
  $preparedStmt = $this->connect()->prepare($sql);
  $preparedStmt->execute(array($sum,$comment,$date,$userId));
 }  
 public function getAcrrualtList() // метод для получения списка всех начислений из БД
 {
    $sql = 'SELECT * FROM accruals';
    $stmt = $this->statement($sql);
    $result = $stmt->fetchAll();
    return $result;
 }
 public function getUserAccrual($id) // метод для получения списка начисления одного пользователя
 {
  $sql = "SELECT * FROM accruals WHERE user_id  = '{$id}'";
  $stmt = $this->statement($sql);
  $result = json_encode($stmt->fetchAll(),JSON_UNESCAPED_UNICODE);
  return $result;
 }
}