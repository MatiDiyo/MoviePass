<?php
    namespace Models;
    
    class RoleUser
    {
        private $id;
        private $description;
        private $user;

        function getId()
        {
            return $this->id;
        }

        function setId($id)
        {
            $this->id = $id;
        }

        function getDescription()
        {
            return $this->description;
        }

        function setDescription($description)
        {
            $this->description = $description;
        }

        function getUser()
        {
            return $this->user;
        }

        function setUser($user)
        {
            $this->user = $user;
        }
    }
?>