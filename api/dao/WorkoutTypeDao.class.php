<?php
require_once dirname(__FILE__)."/BaseDao.class.php";

class WorkoutTypeDao extends BaseDao{

  public function __construct(){
    parent::__construct("workout_types");
  }

  public function get_workout_types($name, $offset, $limit, $search){

    $query = "SELECT *
              FROM workout_types ";
    // is search parametar is passed; !=NULL
    if(isset($search)){
      $params['search'] = strtolower($search);
      $query .= " WHERE LOWER(name) LIKE CONCAT('%', :search, '%') ";
    }
    $query .= "LIMIT ${limit} OFFSET ${offset}";

    return $this->query($query, $params);
  }
}

 ?>
