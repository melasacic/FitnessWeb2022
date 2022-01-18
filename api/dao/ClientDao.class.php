<?php
require_once dirname(__FILE__)."/BaseDao.class.php";


class ClientDao extends BaseDao{

  public function __construct(){
  parent::__construct("clients");
}

  public function get_clients($search, $offset, $limit){
    // SQL statement for search option in our DAO
   return $this->query("SELECT *
                        FROM clients
                        WHERE firstName LIKE CONCAT('%', :firstName, '%')
                        LIMIT ${limit} OFFSET ${offset}", ["firstName" => $search]);
}

  public function get_client_by_client_number($client_number){
    return $this->query_unique("SELECT * FROM clients WHERE client_number = :client_number",["client_number" => $client_number]);
  }

  public function update_client_by_client_number($client_number, $client){
    $this->update("clients", $client_number, $client, "client_number");

  }
}
 ?>
