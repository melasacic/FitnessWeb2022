<?php

require_once dirname(__FILE__).'/../dao/MembershipTypeDao.class.php';
require_once dirname(__FILE__).'/BaseService.class.php';

class MembershipTypeService extends BaseService{

  public function __construct(){
    // kreiranje instance MembershipTypeDao
    $this->dao = new MembershipTypeDao();
}

}
?>
