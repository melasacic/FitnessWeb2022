<?php

require_once dirname(__FILE__).'/../dao/WorkoutTypeDao.class.php';
require_once dirname(__FILE__).'/BaseService.class.php';

class WorkoutTypeService extends BaseService{

  public function __construct(){
    $this->dao = new WorkoutTypeDao();
}

public function get_workout_types($name, $offset, $limit, $search){
  return $this->dao->get_workout_types($name, $offset, $limit, $search);
}
}
?>
