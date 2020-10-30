<?php
    namespace Models;

    class Cinema
    {
		//TODO AGREGAR PROPIEDADES
		
        private $address, $name, $id, $capacity, $price;



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

	function getPrice() { 
 		return $this->price; 
	} 

	function setPrice($price) {  
		$this->price = $price; 
	} 

}
?>
