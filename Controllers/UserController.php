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

        public function ShowLogin($message = "")
        {
            require_once(VIEWS_PATH."login.php");
        }

        public function ShowProfile()
        {
            require_once(VIEWS_PATH."profile.php");
        }

        public function Add($mail, $password)
        {
            $user = new User();
            $user->setMail($mail);
            $user->setPassword($password);

            $this->userDAO->Add($user);

            $this->ShowLogin();
        }

        public function Login($mail, $password)
        {
            $user = new User();
            $user->setMail($mail);
            $user->setPassword($password);

            $userResult = $this->userDAO->GetOne($user);

            if(($userResult != null) && ($userResult->getPassword() == $password))
            {
                $_SESSION["loggedUser"] = $userResult;
                $this->ShowProfile();
            }
            else
            {
                $this->ShowLogin();
            }
        }

        public function Logout()
        {
            session_destroy();

            $this->ShowLogin();
        }

    }
?>