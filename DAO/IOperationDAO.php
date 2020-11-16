<?php
    namespace DAO;

    use Models\Operation as Operation;
    interface IOperationDAO
    {
        function Add(Operation $operation);
        function GetAll($userId);
    }
?>