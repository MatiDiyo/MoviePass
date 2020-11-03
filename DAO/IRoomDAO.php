<?php
    namespace DAO;

    use Models\Room as Room;
    use Models\Cinema as Cinema;
    interface IRoomDAO
    {
        function Add(Room $room);
        function GetAll($cinema);
        function GetOne($id);
        function Remove($id);
        function Update(Room $room);
    }
?>