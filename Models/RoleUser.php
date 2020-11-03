<?php
    namespace Models;
    
    class RoleUser
    {
        private $description;

        function getDescription()
        {
            return $this->description;
        }

        function setDescription($description)
        {
            $this->description = $description;
        }
    }
?>