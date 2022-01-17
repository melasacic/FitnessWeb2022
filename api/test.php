<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once dirname(__FILE__)."/dao/MembershipTypeDao.class.php";
require_once dirname(__FILE__)."/dao/ClientDao.class.php";


$dao = new ClientDao();

$clients= $dao->get_all($_GET['offset'], $_GET['limit']);
print_r($clients);
print_r (json_encode( $clients));

/*$entity = [
  "name" => "Dva mjeseca",
  "price" => 60,
  "monthsValid" => 2
];

$dao->add($entity);*/



?>
