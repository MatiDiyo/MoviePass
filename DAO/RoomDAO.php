<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\IRoomDAO as IRoomDAO;
    use DAO\CinemaDAO as CinemaDAO;
    use Models\Room as Room;
    use DAO\Connection as Connection; 

    class RoomDAO implements IRoomDAO
    {
        private $connection;
        private $tableName = "room";

        public function Add(Room $room)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (name,capacity,cinemaId) VALUES (:name,:capacity,:cinemaId);";

                $parameters["name"] = $room->getName();
                $parameters["capacity"] = $room->getcapacity();
                $parameters["cinemaId"] = $room->getCinema()->getId();

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetAll($cinema)
        {
            $roomList = null;

            try
            {
                $query = "SELECT id,name,capacity FROM ".$this->tableName." WHERE cinemaId = :cinemaId;";

                $parameters["cinemaId"] = $cinema->getId();
                
                $this->connection = Connection::GetInstance();
                
                $result = $this->connection->Execute($query, $parameters);
                
                $roomList = array();
                if($result != null){
                    foreach($result as $valuesArray)
                    {
                        $room = new Room();
                        $room->setId($valuesArray["id"]);
                        $room->setName($valuesArray["name"]);
                        $room->setCapacity($valuesArray["capacity"]);
                        $room->setCinema($cinema);

                        array_push($roomList, $room);
                    }
                }
            }
            catch(Exception $ex)
            {
                throw $ex;
            }

            return $roomList;
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
            $room = null;

            try
            {
                $query = "SELECT id,name,capacity,cinemaId FROM ".$this->tableName." WHERE id = :id;";

                $parameters["id"] = $id;

                $this->connection = Connection::GetInstance();

                $result = $this->connection->Execute($query, $parameters);

                if($result != null && !empty($result)){
                    $room_array = $result[0];

                    $room = new Room();
                    $room->setId($room_array["id"]);
                    $room->setName($room_array["name"]);
                    $room->setCapacity($room_array["capacity"]);

                    $cinemaDao = new CinemaDAO();
                    $room->setCinema($cinemaDao->GetOne($room_array["cinemaId"]));
                }
            }
            catch(Exception $ex)
            {
                throw $ex;
            }

            return $room;
        }

        public function Update(Room $room)
        {
            try
            {
                $query = "UPDATE ".$this->tableName." SET name = :name, capacity = :capacity WHERE ID = :id;";

                $parameters["id"] = $room->getId();
                $parameters["name"] = $room->getName();
                $parameters["capacity"] = $room->getCapacity();

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