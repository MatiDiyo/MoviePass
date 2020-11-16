<?php
    namespace DAO;

    use Models\Ticket as Ticket;
    interface ITicketDAO
    {
        function Add(Ticket $ticket);
        //function GetAll($userId);
    }
?>