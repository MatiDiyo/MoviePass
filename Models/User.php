<?php
    namespace Models;

    class User
    {
        private $id;
        private $mail;
        private $password;

        function getId()
        {
            return $this->id;
        }

        function setMail($id)
        {
            $this->id = $id;
        }

        function getMail()
        {
            return $this->mail;
        }

        function setMail($mail)
        {
            $this->mail = $mail;
        }

        function getPassword()
        {
            return $this->password;
        }

        function setPassword($password)
        {
            $this->password = $password;
        }
    }
?>