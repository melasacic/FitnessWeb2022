<?php
require_once dirname(__FILE__)."/BaseDao.class.php";

class MembershipPayementDao extends BaseDao{

  public function __construct(){
    parent::__construct("membership_payements");
  }


/*  public function get_membership_payements($search, $offset, $limit, $order){
    list($order_column, $order_direction) = self::parse_order($order);

    return $this->query("SELECT *
                         FROM membership_payements
                         WHERE LOWER(name) LIKE CONCAT('%', :name, '%')
                         ORDER BY ${order_column} ${order_direction}
                         LIMIT ${limit} OFFSET ${offset}",
                         ["name" => strtolower($search)]);
  }*/

  /*public function add_membership_payement($membership_payement){
    return $this->insert("membership payements", $membership_payement);
  }

  public function update_membership_payement($id, $membership_payement){
    $this->update("memnership payements", $id, $membership_payement);
  }

  public function get_membership_payement_by_id($id){
    return $this->query_unique("SELECT * FROM accounts WHERE id = :id", ["id" => $id]);
  }

  public function get_all_membership_payements(){
    return $this->query("SELECT * FROM membership_payement", []);
  }*/



}
 ?>
