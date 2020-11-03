<?php
    namespace Models;

    class Genre
    {
		private $id, $name;
		
		public function __construct($id = '', $name = '')
        {
            $this->id = $id;
            $this->name = $name;
        }

		function getId() { 
			return $this->id; 
		} 

		function setId($id) {  
			$this->id = $id; 
		} 

		function getName() { 
			return $this->name; 
		} 

		function setName($name) {  
			$this->name = $name; 
		} 
	}
?>