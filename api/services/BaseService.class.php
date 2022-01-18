<?php

class BaseService {

// this dao is going to be initalized in the cencrete implementation of BaseService
protected $dao;

// these functions are same for all
public function get_by_id($id){
  // proxy the call to Dao layer its not going to have any logic
  return $this->dao->get_by_id($id);
}

public function add($data){
  // proxy the call to Dao layer its not going to have any logic
  return $this->dao->add($data);
}

// in this function we have 2 DB calls
public function get_by_id($id){
  // this Dao update record
  $this->dao->update($id, $data);
  // this Dao get by id this record
  return $this->dao->get_by_id($id);
}
}
?>
