<?php
    namespace DAO;

    use Models\Cinema as Cinema;

    interface ICinemaDAO
    {
        function Add(Cinema $cinema);
        function GetAll();
        function GetOne($id);
        function Remove($id);
        function Update(Cinema $cinema);
    }
?>