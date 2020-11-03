<?php
    namespace DAO;

    use Models\Showtime as Showtime;
    interface IShowtimeDAO
    {
        function Add(Showtime $showtime);
        function GetAll($roomId);
        function GetOne($id);
        function Remove($id);
        function Update(Showtime $showtime);
    }
?>