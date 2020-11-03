<?php
    namespace Models;
    
    class ProfileUser
    {
        $surname;
        $dni;
        $name;

        function getSurname()
        {
            return $this->surname;
        }

        function setSurname($surname)
        {
            $this->surname = $surname;
        }

        function getDni()
        {
            return $this->dni;
        }

        function setDni($dni)
        {
            $this->dni = $dni;
        }

        function getName()
        {
            return $this->name;
        }

        function setName($name)
        {
            $this->name = $name;
        }
    }
?>