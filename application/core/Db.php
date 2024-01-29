<?php 
class Db 
{
    private $host = "localhost";
    private $user = "root";
    private $pwd = "mysql";
    private $dbName = "itpark";
    
    protected function connect()
    {
     $dsn = 'mysql:host='. $this->host . ';dbname=' . $this->dbName . ';charset=utf8'; 
     $pdo = new PDO($dsn,$this->user,$this->pwd);
     $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
     return $pdo;
    }
    public function statement($sql)
    {
    return $this->connect()->query($sql);
    }
}