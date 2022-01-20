<?php

require_once dirname(__FILE__).'/../dao/MembershipTypeDao.class.php';
require_once dirname(__FILE__).'/BaseService.class.php';

class MembershipTypeService extends BaseService{

  public function __construct(){
    // kreiranje instance MembershipTypeDao
    $this->dao = new MembershipTypeDao();
}

  public function get_membership_types($name, $offset, $limit, $search){
    return $this->dao->get_membership_types($name, $offset, $limit, $search);
  }
}
?>
