<?php
require_once dirname(__FILE__)."/BaseDao.class.php";

class MembershipPayementDao extends BaseDao{

  public function __construct(){
    parent::__construct("membership_payements");
  }

  public function get_membership_payements($client_id, $offset, $limit){
    return $this->query("SELECT *
                         FROM membership_payements
                         WHERE client_id = :client_id
                         LIMIT ${limit} OFFSET ${offset}",
                         ["client_id" => $client_id]);
  }
}
?>
