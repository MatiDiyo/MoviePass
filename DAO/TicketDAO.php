<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\ITicketDAO as ITicketDAO;
    use DAO\Connection as Connection; 
    use DAO\ShowtimeDAO as ShowtimeDAO;
    use DAO\OperationDAO as OperationDAO;
    use Models\Ticket as Ticket;

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

        public function GetAll($showtimeId=null, $userId=null)
        {
            $ticketList = null;

            try
            {
                $query = "SELECT id, ticketRow, ticketColumn,operationId,showtimeId FROM ".$this->tableName;

                $parameters = array();

                if($userId!=null){ 
                    $query .= " INNER JOIN Operation ON Operation.id = operationId WHERE userId = :userId";

                    $parameters["userId"] = $userId;
                }
                if($showtimeId!=null){
                    $query .= strstr($query,"WHERE")? " AND " : " WHERE ";
                    $query .= "showtimeId = :showtimeId";

                    $parameters["showtimeId"] = $showtimeId;
                }
                
                $query .= " ORDER BY operationId, showtimeId ASC;";

                $this->connection = Connection::GetInstance();
                
                $result = $this->connection->Execute($query, $parameters);
                
                $ticketList = array();
                if($result != null){
                    foreach($result as $valuesArray)
                    {
                        $ticket = new Ticket();
                        $ticket->setId($valuesArray["id"]);
                        $ticket->setRow($valuesArray["ticketRow"]);
                        $ticket->setColumn($valuesArray["ticketColumn"]);

                        $showtimeDAO = new ShowtimeDAO();
                        $operationDAO = new OperationDAO();

                        $ticket->setShowtime($showtimeDAO->GetOne($valuesArray["showtimeId"]));
                        $ticket->setOperation($operationDAO->GetOne($valuesArray["operationId"]));

                        array_push($ticketList, $ticket);
                    }
                }
            }
            catch(Exception $ex)
            {
                throw $ex;
            }

            return $ticketList;
        }

        

    }
?>