<?php
    namespace Controllers;

    use DAO\UserDAO as UserDAO;
    use Models\User as User;
    use Models\RoleUser as RoleUser;
    use Models\ProfileUser as ProfileUser;

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
            $message;
            require_once(VIEWS_PATH."login.php");
        }

        public function ShowProfile()
        {
            $user = $_SESSION["loggedUser"];

            $profile = $_SESSION["profileUser"];

            $role = $_SESSION["roleUser"];

            require_once(VIEWS_PATH."profile.php");
        }

        public function ShowAddProfile()
        {
            require_once(VIEWS_PATH."profile-add.php");
        }

        public function Add($mail, $password)
        {
            $user = new User();
            $user->setMail($mail);
            $user->setPassword($password);

            $this->userDAO->Add($user);

            $userResult = $this->userDAO->GetOne($user);

            $this->userDAO->AddRoleUser($userResult);

            $this->ShowLogin();
        }

        public function AddProfile($id, $name, $surname, $dni)
        {
            $user = new ProfileUser();
            $user->setId($id);
            $user->setName($name);
            $user->setSurname($surname);
            $user->setDni($dni);

            $this->userDAO->AddProfile($user);

            $profileResult = $this->userDAO->GetProfile($user->getId());
            $_SESSION["profileUser"] = $profileResult;

            $this->ShowProfile();

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

                $profileResult = $this->userDAO->GetProfile($userResult->getId());
                $_SESSION["profileUser"] = $profileResult;

                $role = $this->userDAO->GetRole($userResult);
                $_SESSION["roleUser"] = $role;

                $this->ShowProfile();
            }
            else{
                $this->ShowLogin("Usuario o contraseña incorrecto");
            }
        }

        public function Logout()
        {
            session_destroy();

            $this->ShowLogin();
        }
    }
?>