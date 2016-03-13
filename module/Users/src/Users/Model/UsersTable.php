<?php

namespace Users\Model;

use Zend\Db\TableGateway\TableGateway;

class UsersTable {

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll() {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function getUser($id) {  $id  = (int) $id;  $rowset = $this->tableGateway->select(array('id' => $id));  $row = $rowset->current();  if (!$row) {  throw new \Exception("Could not find row $id"); }  return $row; }  


    public function saveUser(Users $users) {  
    	$data = array( 'name' => $users->name, 'email' => $users->email, 'mobile' => $users->mobile, 'address' => $users->address, );  
    	$id = (int) $users->id;  
    	if ($id == 0) {  
            $this->tableGateway->insert($data); 
        } 
    	else {  
    		if ($this->getUser($id)) {  
    			$this->tableGateway->update($data, array('id' => $id)); 
    		} 
    		else {  
    			throw new \Exception('Users id does not exist'); 
    		} 
    	} 
    }

    public function deleteUser($id) { $this->tableGateway->delete(array('id' => (int) $id)); }

}
