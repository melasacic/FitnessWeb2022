<?php
require_once dirname(__FILE__)."/BaseDao.class.php";

class WorkoutDao extends BaseDao{

  public function __construct(){
    parent::__construct("workouts");
  }

  public function get_workouts($workout_type_id, $offset, $limit, $search, $order){
    list($order_column, $order_direction) = self::parse_order($order);

    $params = ["workout_type_id" => $workout_type_id];
    $query = "SELECT *
              FROM workouts
              WHERE workout_type_id = :workout_type_id ";

    if(isset($search)){
      $query .= "AND LOWER(name) LIKE CONCAT('%', :search, '%') ";
      $params['search'] = strtolower($search);
    }
    $query .="ORDER BY ${order_column} ${order_direction} ";
    $query .="LIMIT ${limit} OFFSET ${offset}";
    return $this->query($query, $params);
}
}
?>
