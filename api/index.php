<?php

require_once dirname(__FILE__)."/dao/MembershipTypeDao.class.php";

$dao = new MembershipTypeDao();

$entity = [
  "name" => "Dva mjeseca",
  "price" => 60,
  "monthsValid" => 2
];

$dao->add($entity);


?>
