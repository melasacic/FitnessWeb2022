<?php

require_once dirname(__FILE__).'/../dao/ClientDao.class.php';
require_once dirname(__FILE__).'/BaseService.class.php';

class ClientService extends BaseService{

  public function __construct(){
    // kreiranje instance ClientDao
    $this->dao = new ClientDao();
}
  public function get_clients($search, $offset, $limit){
    if ($search){
      // if we are getting clients with search (by name for example) we use get_clients method that is in our ClientDao
      // ovdje sam brisala Flight::json -> jer je ovo logic layer i ne interesuje me kako se data prezentovati
        return $this->dao->get_clients($search, $offset, $limit);
    }else{
      // if we are getting clients without search we use get_all method that is in our BaseDao
        return $this->dao->get_all($offset, $limit);
    }
  }

  public function add($client){
    // validation of client data
    if(!isset($client['firstName'])) throw new \Exception("First name is missing!");
    return parent::add($client);
      }
}
?>
