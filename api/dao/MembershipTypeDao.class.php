<?php
require_once dirname(__FILE__)."/BaseDao.class.php";


class MembershipTypeDao extends BaseDao{

  public function __construct(){
    parent::__construct("membership_types");
  }

  public function get_membership_types($name, $offset, $limit, $search){
  /*  $params = ["name" => $name];
    $query = "SELECT *
              FROM membership_types
              WHERE name = :name ";
    // is search parametar is passed; !=NULL
    if(isset($search)){
      $query .= " AND ( LOWER(name) LIKE CONCAT('%', :search, '%') OR LOWER(price) LIKE CONCAT('%', :search, '%'))";
      $params['search'] = strtolower($search);
    }

    $query .= "LIMIT ${limit} OFFSET ${offset}";

    return $this->query($query, $params);*/
    $query = "SELECT *
              FROM membership_types ";
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
