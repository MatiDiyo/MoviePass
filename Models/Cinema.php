<?php
    namespace Models;

    class Cinema
    {

      private $address, $name, $id, $capacity, $price, $roomList;
      
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

		/*function getCapacity() { 
			return $this->capacity; 
		} 

		function setCapacity($capacity) {  
			$this->capacity = $capacity; 
		} */

	function getPrice() { 
 		return $this->price; 
	} 

	function setPrice($price) {  
		$this->price = $price; 
	} 

	function getRoomList() { 
		return $this->roomList; 
   } 

   function setRoomList($roomList) {  
	   $this->roomList = $roomList; 
   } 

}
?>
