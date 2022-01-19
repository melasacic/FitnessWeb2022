<?php
require_once dirname(__FILE__)."/BaseDao.class.php";

class MembershipPayementDao extends BaseDao{

  public function __construct(){
    parent::__construct("membership_payements");
  }

  public function get_membership_payements($client_id, $offset, $limit, $order){
    list($order_column, $order_direction) = self::parse_order($order);

    $params = ["client_id" => $client_id];
    $query = "SELECT *
              FROM membership_payements
              WHERE client_id = :client_id ";

    $query .="ORDER BY ${order_column} ${order_direction} ";
    $query .="LIMIT ${limit} OFFSET ${offset}";

    return $this->query($query, $params);
  }
}
?>
