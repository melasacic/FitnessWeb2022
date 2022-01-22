<?php
require_once dirname(__FILE__)."/BaseDao.class.php";

class WorkoutScheduleDao extends BaseDao{

  public function __construct(){
    parent::__construct("workout_schedules");
  }
// TODO: POPRAVITI QUERY
  public function get_workout_schedules($workout_id, $offset, $limit, $search){
    $workout_id = ["workout_id" => $workout_id];

    $query = "SELECT *
              FROM workout_schedules ";

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
