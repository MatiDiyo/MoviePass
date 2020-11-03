<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\IShowtimeDAO as IShowtimeDAO;
    use DAO\CinemaDAO as CinemaDAO;
    use DAO\RoomDAO as RoomDAO;
    use Models\Showtime as Showtime;
    use DAO\Connection as Connection; 

    class ShowtimeDAO implements IShowtimeDAO
    {
        private $connection;
        private $tableName = "showtime";

        public function Add(Showtime $showtime)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (showtimeDate, showtimeTime, movieId, roomId) VALUES (:showtimeDate, :showtimeTime, :movieId, :roomId);";

                $parameters["showtimeDate"] = $showtime->getShowtimeDate();
                $parameters["showtimeTime"] = $showtime->getShowtimeTime();
                $parameters["movieId"] = $showtime->getMovie()->getId();
                $parameters["roomId"] = $showtime->getRoom()->getId();

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetAll($roomId)
        {
            $showtimeList = null;

            try
            {
                $query = "SELECT id,showtimeDate,showtimeTime, movieId, roomId FROM ".$this->tableName." WHERE roomId = :roomId;";

                $parameters["roomId"] = $roomId;
                
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

                        $showtime->setRoom($roomDao->GetOne($roomId));
                        $showtime->setMovie($movieDao->GetOne($valuesArray["movieId"]));

                        array_push($showtimeList, $showtime);
                    }
                }
            }
            catch(Exception $ex)
            {
                throw $ex;
            }

            return $showtimeList;
        }

        public function Remove($id)
        {            
            try
            {
                $query = "DELETE FROM ".$this->tableName." WHERE ID = :id;";

                $parameters["id"] = $id;

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetOne($id)
        {            
            $showtime = null;

            try
            {
                $query = "SELECT id,showtimeDate,showtimeTime,roomId, movieId FROM ".$this->tableName." WHERE id = :id;";

                $parameters["id"] = $id;

                $this->connection = Connection::GetInstance();

                $result = $this->connection->Execute($query, $parameters);

                if($result != null && !empty($result)){
                    $valuesArray = $result[0];

                    $showtime = new Showtime();
                    $showtime->setId($valuesArray["id"]);
                    $showtime->setShowtimeDate($valuesArray["showtimeDate"]);
                    $showtime->setShowtimeTime($valuesArray["showtimeTime"]);

                    $roomDao = new RoomDAO();
                    $movieDao = new MovieDAO();
                    $showtime->setRoom($roomDao->GetOne($valuesArray["roomId"]));
                    $showtime->setMovie($movieDao->GetOne($valuesArray["movieId"]));
                }
            }
            catch(Exception $ex)
            {
                throw $ex;
            }

            return $showtime;
        }

        public function Update(Showtime $showtime)
        {
            try
            {
                $query = "UPDATE ".$this->tableName." SET showtimeDate = :showtimeDate, showtimeTime = :showtimeTime, movieId = :movieId WHERE ID = :id;";

                $parameters["id"] = $showtime->getId();
                $parameters["showtimeDate"] = $showtime->getShowtimeDate();
                $parameters["showtimeTime"] = $showtime->getShowtimeTime();
                $parameters["movieId"] = $showtime->getMovie()->getId();

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

    }
?>