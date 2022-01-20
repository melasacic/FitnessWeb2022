<?php

require_once dirname(__FILE__).'/../dao/WorkoutScheduleDao.class.php';
require_once dirname(__FILE__).'/BaseService.class.php';

class WorkoutScheduleService extends BaseService{

  public function __construct(){
    $this->dao = new WorkoutScheduleDao();
}

public function get_workout_schedules($workout_id, $offset, $limit, $search){
  return $this->dao->get_workout_schedules($workout_id, $offset, $limit, $search);
}
}
?>
