<?php
    namespace Models;
    
    class RoleUser
    {
        $description;

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