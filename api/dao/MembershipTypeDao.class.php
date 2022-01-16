<?php
require_once dirname(__FILE__)."/BaseDao.class.php";


class MembershipTypeDao extends BaseDao{

  public function __construct(){
    parent::__construct("membership_types");
  }
}
 ?>
