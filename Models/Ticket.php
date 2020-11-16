<?php
    namespace Models;

    class Ticket
    {
		private $id, $column, $row, $showtime, $operation;

		
        function getId() { 
             return $this->id; 
        } 
    
        function getColumn() { 
             return $this->column; 
        } 
    
        function getRow() { 
             return $this->row; 
        } 
    
        function getShowtime() { 
             return $this->showtime; 
        } 
    
        function setId($id) {  
            $this->id = $id; 
        } 
    
        function setColumn($column) {  
            $this->column = $column; 
        } 
    
        function setRow($row) {  
            $this->row = $row; 
        } 
    
        function setShowtime($showtime) {  
            $this->showtime = $showtime; 
        } 

        function getOperation() { 
             return $this->operation; 
        } 
    
        function setOperation($operation) {  
            $this->operation = $operation; 
        } 
        
	}
?>


