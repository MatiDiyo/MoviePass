<?php
    namespace DAO;

    use Models\User as User;
    use Models\RoleUser as RoleUser;
    use Models\ProfileUser as ProfileUser;
    use DAO\Connection as Connection;

    interface IUserDAO
    {
        function Add(User $user);
        function GetAll();
        function GetOne(User $user);
        function GetRole(User $user);  
        function AddRoleUser(User $user);   
        function AddProfile(ProfileUser $profileUser);  
    }




?>