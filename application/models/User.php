<?php 
class User extends Db
{
 public function getUserList() // метод для получения всех пользователей из БД
 {
    $sql = 'SELECT * FROM users';
    $stmt = $this->statement($sql);
    $result = $stmt->fetchAll();
    return $result;
 }
 public function getUser($id) // метод для получения определенного пользователя из БД
 {
   $sql = "SELECT * FROM users WHERE `id`='{$id}'";
   $stmt = $this->statement($sql);
   $result = $stmt->fetchAll();
   return $result;
 }
 public function updateBalance($id,$newBalance)
 {
  $sql = "UPDATE users SET balance = :newbalance WHERE id = :userid";
  $preparedStmt = $this->connect()->prepare($sql);
  $preparedStmt->bindValue(":userid",$id);
  $preparedStmt->bindValue(":newbalance",$newBalance);
  $preparedStmt->execute();
 }
}