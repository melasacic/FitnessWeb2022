<?php
require_once dirname(__FILE__)."/BaseDao.class.php";

class WorkoutTypeDao extends BaseDao{

  public function __construct(){
    parent::__construct("workout_types");
  }

  public function get_workout_types($name, $offset, $limit, $search){
    $name = ["name" => $name];
    $query = "SELECT *
              FROM workout_types
              WHERE name = :name ";
    // is search parametar is passed; !=NULL
    if(isset($search)){
      $query .= " AND ( LOWER(name) LIKE CONCAT('%', :search, '%')) ";
      $params['search'] = strtolower($search);
    }

    $query .= "LIMIT ${limit} OFFSET ${offset}";

    return $this->query($query, $params);
  }
}

 ?>
