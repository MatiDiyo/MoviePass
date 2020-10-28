<?php
    namespace Controllers;

    use DAO\UserDAO as UserDAO;
    use Models\User as User;

    class UserController
    {
        private $userDAO;

        public function __construct()
        {
            $this->userDAO = new UserDAO();
        }

        public function ShowSignUp()
        {
            require_once(VIEWS_PATH."signup.php");
        }

        public function ShowLogin()
        {
            require_once(VIEWS_PATH."login.php");
        }

        public function Add($mail, $password)
        {
            $user = new User();
            $user->setMail($mail);
            $user->setPassword($password);

            $this->userDAO->Add($user);

            $this->ShowLogin();
        }


/*
        public function Login()
        {
            if($_POST)
            {
                $email = $_POST["email"];
                $pass = $_POST["password"];
            }

        }
*/
    }
?>