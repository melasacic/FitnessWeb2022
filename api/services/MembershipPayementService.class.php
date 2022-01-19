<?php

require_once dirname(__FILE__).'/../dao/MembershipPayementDao.class.php';
require_once dirname(__FILE__).'/BaseService.class.php';

class MembershipPayementService extends BaseService{

  public function __construct(){
    // kreiranje instance ClientDao
    $this->dao = new MembershipPayementDao();
}
  // HERE WE DONT NEED FUNCTIONS TO ADD OR ADD BY ID BECAOSE WE HAVE IN BaseService

  
}
?>
