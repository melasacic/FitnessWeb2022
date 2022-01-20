<?php

require_once dirname(__FILE__).'/../dao/WorkoutDao.class.php';
require_once dirname(__FILE__).'/BaseService.class.php';

class WorkoutService extends BaseService{

  public function __construct(){
    // kreiranje instance ClientDao
    $this->dao = new WorkoutDao();
}

public function get_workouts($workout_type_id, $offset, $limit, $search){
  return $this->dao->get_workouts($workout_type_id, $offset, $limit, $search);
}

 public function add($workouts){
   try {
    return parent::add($workouts);
   } catch (Exception $e) {
      if(str_contains($e->getMessage(), 'workouts.uq_workouts_name')) {
        throw new Exception("Workout type with the same name alredy exists", 400, $e);
      }else {
        throw $e;
    }
  }
}
}
?>
