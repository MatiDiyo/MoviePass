<?php
    namespace Models;

    class User
    {
        private $mail;
        private $password;

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