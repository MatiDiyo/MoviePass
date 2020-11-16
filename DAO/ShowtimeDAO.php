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

        public function GetAll($roomId = null, $movieId = null)
        {
            $showtimeList = null;

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

            return $showtimeList;
        }

        public function GetAllHistorial()
        {
            try{
                $showtimeList = array();

                $query = "SELECT * FROM ".$this->tableName.";";
    
                $this->connection = Connection::GetInstance();
        
                $resultSet = $this->connection->Execute($query);

                foreach($resultSet as $row)
                {
                    $showtime = new Showtime();

                    $showtime->setId($row["id"]);
                    $showtime->setShowtimeDate($row["showtimeDate"]);
                    $showtime->setShowtimeTime($row["showtimeTime"]);

                    $roomDao = new RoomDAO();
                    $movieDao = new MovieDAO();

                    $showtime->setRoom($roomDao->GetOne($row["roomId"]));
                    $showtime->setMovie($movieDao->GetOne($row["movieId"]));

                    array_push($showtimeList, $showtime); 
                }
                return $showtimeList;
            }catch(Exception $ex)
            {
                throw $ex;
            }

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

        public function GetBillboard($date = null, $time = null, $genreId=null){
            $showtimeList = null;

            try
            {
                $query = "SELECT s.movieId as movieId FROM ".$this->tableName." s";

                $parameters = array();

                if($genreId!=null){
                    $parameters["genreId"] = $genreId; 
                    $query .= " INNER JOIN MOVIE_GENRE mg ON s.movieId = mg.movieId";
                    $query .= " WHERE genreId = :genreId";
               }
                $query .= strstr($query,"WHERE")? " AND " : " WHERE ";
                $query .= "TIMESTAMP(showtimeDate,showtimeTime) >= current_date()";
                if($date!=null || $time!=null){
                    $query .=  " AND TIMESTAMP(showtimeDate,showtimeTime) <= CAST(";
                    $parameters["date"] = $date;
                    $parameters["time"] = $time;
                    $query .= ($date != null ? "CONCAT(:date, ' '," : "current_date(), ' '," );
                    $query .= ($time != null ? " :time )": " current_time())");
                    $query .= "as DATETIME)";
                }
                
                $query .= " GROUP BY s.movieId;";

                $this->connection = Connection::GetInstance();
                
                $result = $this->connection->Execute($query, $parameters);
                
                $showtimeList = array();
                if($result != null){
                    foreach($result as $valuesArray)
                    {
                        $showtime = new Showtime();

                        $movieDao = new MovieDAO();

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

    }
?>