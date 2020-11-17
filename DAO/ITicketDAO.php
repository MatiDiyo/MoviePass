<?php
    namespace DAO;

    use Models\Ticket as Ticket;
    use Models\ShowTime as ShowTime;
    interface ITicketDAO
    {
        function Add(Ticket $ticket);
        //function GetAll($userId);
    }
?>