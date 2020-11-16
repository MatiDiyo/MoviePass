<?php
    namespace Controllers;

    use DAO\ShowtimeDao as ShowtimeDao;
    use DAO\TicketDao as TicketDao;
    use DAO\OperationDao as OperationDao;
    use DAO\MovieDao as MovieDao;
    use Models\Showtime as Showtime;
    use Models\Movie as Movie;
    use Models\Ticket as Ticket;
    use Models\Operation as Operation;
    
    class TicketController
    {
        private $showtimeDao;
        private $movieDao;

        public function __construct()
        {
            $this->showtimeDao = new ShowtimeDao();
            $this->movieDao = new MovieDao();
            $this->operationDao = new OperationDao();
            $this->ticketDao = new TicketDao();
        }

        public function ShowAvailable($movieId){
            $movie = $this->movieDao->GetOne($movieId);
            $showtimeList = $this->showtimeDao->GetAll(null,$movieId);

            require_once(VIEWS_PATH."tickets-available.php");
        }

        public function SelectTickets($showtimeId){
            $showtime = $this->showtimeDao->GetOne($showtimeId);

            $seats = array();
            for($i=0;$i<200;$i++){
                array_push($seats,$i);
            }

            require_once(VIEWS_PATH."tickets-seats.php");
        }

        public function BuyTickets($showtimeId, $tickets){
            $tickets;

            $seatList = $this->ParseTickets($tickets);

            $showtime = $this->showtimeDao->GetOne($showtimeId);

            $total = count($seatList) * $showtime->getRoom()->getCinema()->getPrice();

            require_once(VIEWS_PATH."tickets-confirm.php");
        }

        public function Confirm($showtimeId, $tickets, $cardNumber, $cardExpDate, $cardCVV, $documentType, $documentNumber, $cardOwner){
            $seatList = $this->ParseTickets($tickets);

            $showtime = $this->showtimeDao->GetOne($showtimeId);
            $total = count($seatList) * $showtime->getRoom()->getCinema()->getPrice();
            $user = $_SESSION["loggedUser"];

            $operation = new Operation(count($seatList), date('Y-m-d'), $total,$user);
            $operation = $this->operationDao->Add($operation);


            $ticketList = array();

            foreach($seatList as $ticket){
                $ticket->setShowtime($showtime);
                $ticket->setOperation($operation);
                $ticket = $this->ticketDao->Add($ticket);
                
                array_push($ticketList, $ticket);
            }
            
            require_once(VIEWS_PATH."tickets-print.php");
        }

        /*public function GetTickets($ticketsId=null){
            
            
            require_once(VIEWS_PATH."tickets-print.php");
        }*/

        function ParseTickets($tickets){
            $seats = explode(",", $tickets);
            array_pop($seats);

            $seatList = array();

            foreach($seats as $ticket){
                $ticketRowColumn = explode("-",$ticket);
                
                $seat = new Ticket();
                $seat->setRow($ticketRowColumn[0]);
                $seat->setColumn($ticketRowColumn[1]);

                array_push($seatList, $seat);
            }
            return $seatList;
        }
    }
?>