<?php
    namespace Models;

    class Cinema
    {
		//TODO AGREGAR PROPIEDADES
		
        private $address, $name, $id, $capacity;



	function getAddress() { 
 		return $this->address; 
	} 

	function setAddress($address) {  
		$this->address = $address; 
	} 

	function getName() { 
 		return $this->name; 
	} 

	function setName($name) {  
		$this->name = $name; 
	} 

	function getId() { 
 		return $this->id; 
	} 

	function setId($id) {  
		$this->id = $id; 
	} 

	function getCapacity() { 
 		return $this->capacity; 
	} 

	function setCapacity($capacity) {  
		$this->capacity = $capacity; 
	} 

}
?>
