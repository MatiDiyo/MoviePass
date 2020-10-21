<?php
    namespace DAO;

    use Models\User as User;
    use DAO\Connection as Connection;

    interface IUserDAO
    {
        function Add(User $user);
        function GetAll();
    }




?>