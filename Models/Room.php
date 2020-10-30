<?php
    namespace Models;

    class Room
    {
		private $name, $id, $capacity, $cinema;

		function getName() { 
			return $this->name; 
		} 

		function getId() { 
			return $this->id; 
		} 

		function getCapacity() { 
			return $this->capacity; 
		} 

		function getCinema() { 
			return $this->cinema; 
		} 

		function setName($name) {  
			$this->name = $name; 
		} 

		function setId($id) {  
			$this->id = $id; 
		} 

		function setCapacity($capacity) {  
			$this->capacity = $capacity; 
		} 

		function setCinema($cinema) {  
			$this->cinema = $cinema; 
		} 

	}
?>
