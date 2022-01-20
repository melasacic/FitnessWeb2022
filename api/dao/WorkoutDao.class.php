<?php
require_once dirname(__FILE__)."/BaseDao.class.php";

class WorkoutDao extends BaseDao{

  public function __construct(){
    parent::__construct("workouts");
  }

  public function get_workouts($workout_type_id, $offset, $limit){
    return $this->query("SELECT *
                         FROM workouts
                         WHERE workout_type_id = :workout_type_id
                         LIMIT ${limit} OFFSET ${offset}",
                         ["workout_type_id" =>$workout_type_id]);
  }
}

 ?>
