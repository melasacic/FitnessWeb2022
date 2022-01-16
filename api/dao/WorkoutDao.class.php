<?php
require_once dirname(__FILE__)."/BaseDao.class.php";

class WorkoutDao extends BaseDao{

  public function_construct(){
    parent::__construct("workouts");
  }
}
 ?>
