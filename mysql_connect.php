<?php
class Mysql{
  private $host = "localhost";
  private $user = "stock";
  private $password = "trade";
  private $database = "stock_trade";


  public function execute($query){
    $mysqli = new mysqli($this->host, $this->user, $this->password, $this->database);
    if ($mysqli->connect_errno) {
      die("Connect failed: " . $mysqli->connect_error);
    }

    if (($result=$mysqli->query($query)) === false) {
      $mysqli->close();
      die("Query failed: " . $mysqli->error);
    }
  $mysqli->close();
  return $result;
  }

  public function select($query){
    $mysql_result=$this->execute($query);
    $result_array=array();
    while($row=$mysql_result->fetch_row()){ 
      $array=array();
      foreach ($row as $value) {
        $array[] = $value;
      }
      $result_array[] = $array;
    }
    var_dump($result_array);
    return $result_array;
  }

}
$query = "select * from stock_data";
$instance = new Mysql();
$instance->select($query);
