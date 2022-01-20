<?php
require_one dirname(__FILE__)."/BaseDao.class.php";

class WorkoutSheduleDao extends BaseDao{

  public function __construct(){
    parent::__construct("workout_shedules");
  }

  public function get_membership_types($workout_id, $offset, $limit, $search){
    $workout_id = ["workout_id" => $workout_id];
    $query = "SELECT *
              FROM workout_shedules
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
