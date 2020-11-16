<?php
    namespace Models;

    class Operation
    {
		private $id, $cantEntradas, $operationDate, $total, $user;

        function __construct($cantEntradas=null, $operationDate=null, $total=null, $user=null){
            $this->cantEntradas = $cantEntradas;
            $this->operationDate = $operationDate;
            $this->total = $total;
            $this->user = $user;
        }

        function getId() { 
             return $this->id; 
        } 
    
        function getCantEntradas() { 
             return $this->cantEntradas; 
        } 
    
        function getOperationDate() { 
             return $this->operationDate; 
        } 
    
        function getTotal() { 
             return $this->total; 
        } 
    
        function getUser() { 
             return $this->user; 
        } 
    
        function setId($id) {  
            $this->id = $id; 
        } 
    
        function setCantEntradas($cantEntradas) {  
            $this->cantEntradas = $cantEntradas; 
        } 
    
        function setOperationDate($operationDate) {  
            $this->operationDate = $operationDate; 
        } 
    
        function setTotal($total) {  
            $this->total = $total; 
        } 
    
        function setUser($user) {  
            $this->user = $user; 
        } 
        
	}
?>



