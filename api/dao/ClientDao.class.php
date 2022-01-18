<?php
require_once dirname(__FILE__)."/BaseDao.class.php";


class ClientDao extends BaseDao{

  public function __construct(){
  parent::__construct("clients");
}

  public function get_clients($search, $offset, $limit, $order){

// parsing order order_direction
/*  switch(substr($order, 0, 1)){
    case '-': $order_direction = "ASC"; break;
    case '+': $order_direction = "DESC"; break;
    default: throw new Exception("Invalid order format. First caharacter should be either + or -"); break;
}

  //substring from first till the end
  $order_column = $this->connection->quote(substr($order, 1));*/

  list($order_column, $order_direction) = self::parse_order($order);

  // SQL statement for search option in our DAO
   return $this->query("SELECT *
                        FROM clients
                        WHERE LOWER(firstName) LIKE CONCAT('%', :firstName, '%')
                        /* manually binding these 2 columns */
                        ORDER BY ${order_column} ${order_direction}
                        LIMIT ${limit} OFFSET ${offset}",
                        ["firstName" => strtolower($search)]);
}

  public function get_client_by_client_number($client_number){
    return $this->query_unique("SELECT * FROM clients WHERE client_number = :client_number",["client_number" => $client_number]);
  }

  public function update_client_by_client_number($client_number, $client){
    $this->update("clients", $client_number, $client, "client_number");

  }
}
 ?>
