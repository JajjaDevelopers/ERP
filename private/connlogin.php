<?php
$server="premium33.web-hosting.com";
// $port="3306";
$db="jajjcrmv_jajjadev";
$user="jajjcrmv_felix";
$pwd="Melchizedek44@";
$charset="utf8mb4";

$options=[
  \PDO::ATTR_ERRMODE=>\PDO::ERRMODE_EXCEPTION,
  \PDO::ATTR_DEFAULT_FETCH_MODE=>\PDO::FETCH_ASSOC,
  \PDO::ATTR_EMULATE_PREPARES=>false,
];

//creating a connection to the database
$dsn="mysql:host=$server;dbname=$db;charset=$charset";
try{
   $pdo=new \PDO($dsn,$user,$pwd);
} catch(\PDOException $e)
{
  throw new \PDOException($e->getMessage(), (int)$e->getCode());
};

?>