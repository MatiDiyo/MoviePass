<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\IOperationDAO as IOperationDAO;
    use Models\Operation as Operation;
    use DAO\Connection as Connection; 

    class OperationDAO implements IOperationDAO
    {
        private $connection;
        private $tableName = "operation";

        public function Add(Operation $operation)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (cant_entradas, operationDate, total, userId) VALUES (:cant_entradas, :operationDate, :total, :userId);";

                $parameters["cant_entradas"] = $operation->getCantEntradas();
                $parameters["operationDate"] = $operation->getOperationDate();
                $parameters["total"] = $operation->getTotal();
                $parameters["userId"] = $operation->getUser()->getId();

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);

                $idQuery = "SELECT LAST_INSERT_ID() as lastId;";
                $operation->setId($this->connection->Execute($idQuery, $parameters)[0]["lastId"]);

                return $operation;
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