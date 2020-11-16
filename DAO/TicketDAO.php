<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\ITicketDAO as ITicketDAO;
    use Models\Ticket as Ticket;
    use DAO\Connection as Connection; 

    class TicketDAO implements ITicketDAO
    {
        private $connection;
        private $tableName = "tickets";

        public function Add(Ticket $ticket)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (ticketRow, ticketColumn, showtimeId, operationId) VALUES (:ticketRow, :ticketColumn, :showtimeId, :operationId);";

                $parameters["ticketRow"] = $ticket->getRow();
                $parameters["ticketColumn"] = $ticket->getColumn();
                $parameters["showtimeId"] = $ticket->getShowtime()->getId();
                $parameters["operationId"] = $ticket->getOperation()->getId();

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);

                $idQuery = "SELECT LAST_INSERT_ID() as lastId;";
                $ticket->setId($this->connection->Execute($idQuery, $parameters)[0]["lastId"]);

                return $ticket;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetAll($userId)
        {
            /*$showtimeList = null;

            try
            {
                $query = "SELECT id,showtimeDate,showtimeTime, s.movieId as movieId, roomId FROM ".$this->tableName." s";

                $parameters = array();

                if($roomId!=null){ 
                    $parameters["roomId"] = $roomId;
                    $query .= strstr($query,"WHERE")? " AND " : " WHERE ";
                    $query .= " roomId = :roomId";
                }
                if($movieId!=null){
                     $parameters["movieId"] = $movieId; 
                     $query .= strstr($query,"WHERE")? " AND " : " WHERE ";
                     $query .= "movieId = :movieId";
                }
                
                $query .= " ORDER BY showtimeDate, showtimeTime ASC;";

                $this->connection = Connection::GetInstance();
                
                $result = $this->connection->Execute($query, $parameters);
                
                $showtimeList = array();
                if($result != null){
                    foreach($result as $valuesArray)
                    {
                        $showtime = new Showtime();
                        $showtime->setId($valuesArray["id"]);
                        $showtime->setShowtimeDate($valuesArray["showtimeDate"]);
                        $showtime->setShowtimeTime($valuesArray["showtimeTime"]);

                        $roomDao = new RoomDAO();
                        $movieDao = new MovieDAO();

                        $showtime->setRoom($roomDao->GetOne($valuesArray["roomId"]));
                        $showtime->setMovie($movieDao->GetOne($valuesArray["movieId"]));

                        array_push($showtimeList, $showtime);
                    }
                }
            }
            catch(Exception $ex)
            {
                throw $ex;
            }

            return $showtimeList;*/
        }

        

    }
?>