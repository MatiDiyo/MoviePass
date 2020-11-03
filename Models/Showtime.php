<?php
    namespace Models;

    class Showtime
    {
        private $id;
        private $showtimeDate;
        private $showtimeTime;
        private $movie;
        private $room;

        public function __construct($id = "", $showtimeDate = "", $showtimeTime = "", $movie = "")
        {
            $this->id = $id;
            $this->showtimeDate = $showtimeDate;
            $this->showtimeTime = $showtimeTime;
            $this->movie = $movie;
        }

        function getId() { 
            return $this->id; 
       } 
   
       function setId($id) {  
           $this->id = $id; 
       } 
   
       function getShowtimeDate() { 
            return $this->showtimeDate; 
       } 
   
       function setShowtimeDate($showtimeDate) {  
           $this->showtimeDate = $showtimeDate; 
       } 
   
       function getShowtimeTime() { 
            return $this->showtimeTime; 
       } 
   
       function setShowtimeTime($showtimeTime) {  
           $this->showtimeTime = $showtimeTime; 
       } 
   
       function getMovie() { 
            return $this->movie; 
       } 
   
       function setMovie($movie) {  
           $this->movie = $movie; 
       } 

       function getRoom() { 
            return $this->room; 
        } 

        function setRoom($room) {  
            $this->room = $room; 
        } 

    }
        
?>
