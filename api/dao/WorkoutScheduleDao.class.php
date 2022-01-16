<?php
require_one dirname(__FILE__)."/BaseDao.class.php";

class WorkoutSheduleDao extends BaseDao{

  public function_construct(){
    parent::__construct("workout_shedules");
  }
}
 ?>
