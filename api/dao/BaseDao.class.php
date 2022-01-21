<?php
require_once dirname(__FILE__)."/../config.php";

/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once dirname(__FILE__)."/../config.php";*/

/*
* The main class for interaction whith DB.
*
* All other classes should inherit this class.
*
* @author Mela Sacic
*/

class BaseDao{
protected  $connection;

private $table;

public static function parse_order($order){
    switch(substr($order, 0, 1)){
      case '-': $order_direction = "ASC"; break;
      case '+': $order_direction = "DESC"; break;
      default: throw new Exception("Invalid order format. First character should be either + or -"); break;
    };

    // Filter SQL injection attacks on column name
   $order_column = substr($order, 1);

   return [$order_column, $order_direction];
  }

public function __construct($table){
 $this->table = $table;
 try {
   $this->connection = new PDO("mysql:host=".Config::DB_HOST().";port=".Config::DB_PORT().";dbname=".Config::DB_SCHEME(), Config::DB_USERNAME(), Config::DB_PASSWORD());
   $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   //$this->connection->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);
 } catch(PDOException $e) {
   throw $e;
 }
}

  protected function insert($table, $entity){
    $query = "INSERT INTO ${table} (";
       foreach ($entity as $column => $value) {
         $query .= $column.", ";
       }
       $query = substr($query, 0, -2);
       $query .= ") VALUES (";
       foreach ($entity as $column => $value) {
         $query .= ":".$column.", ";
       }
       $query = substr($query, 0, -2);
       $query .= ")";

       $stmt= $this->connection->prepare($query);
       $stmt->execute($entity); // sql injection prevention
       $entity['id'] = $this->connection->lastInsertId();
       return $entity;
  }

  protected function  execute_update( $table, $id, $entity, $id_column="id"){
   $query = "UPDATE ${table} SET ";
   foreach($entity as $name => $value){
     $query .= $name ."= :". $name. ", ";
   }
   $query = substr($query, 0, -2);
   $query .= " WHERE ${id_column} = :id";

   $stmt= $this->connection->prepare($query);
   $entity['id'] = $id;

   $stmt->execute($entity);
  }

  protected function query($query, $params){
    $stm = $this->connection->prepare($query);

    $stm->execute($params);
    return $stm->fetchAll(PDO::FETCH_ASSOC);
  }

// executing any type of SQL on DB
  protected function query_unique($query, $params){
    $results = $this->query($query, $params);
    return reset($results);
  }

  public function add($entity){
    return $this->insert($this->table, $entity);
  }

  public function update($id, $entity){
    $this->execute_update($this->table, $id, $entity);
  }

  public function get_by_id($id){
    return $this->query_unique("SELECT * FROM ".$this->table." WHERE id = :id", ["id" => $id]);
  }

//  koristeci pegenation support mi pullamo data in
// ovdje sam morala dodati ORDER BY id u query
  public function get_all($offset = 0, $limit = 25, $order="-id"){
    list($order_column, $order_direction) = self::parse_order($order);

    return  $this->query("SELECT *
                          FROM " .$this->table."
                          ORDER BY ${order_column} ${order_direction}
                          LIMIT ${limit} OFFSET {$offset}", []);
  }
}
?>
