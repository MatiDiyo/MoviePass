<?php
    namespace DAO;

    use DAO\ICinemaDAO as ICinemaDAO;
    use DAO\RoomDAO as RoomDAO;
    use Models\Cinema as Cinema;
    use DAO\Connection as Connection; 
    use \Exception as Exception;

    class CinemaDAO implements ICinemaDAO
    {
        private $connection;
        private $tableName = "cinema";

        public function Add(Cinema $cinema)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (name,address,price) VALUES (:name,:address,:price);";

                $parameters["name"] = $cinema->getName();
                $parameters["address"] = $cinema->getAddress();
                $parameters["price"] = $cinema->getPrice();

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetAll()
        {
            $cinemaList = null;

            try
            {
                $query = "SELECT id,name,address,price FROM ".$this->tableName.";";

                $this->connection = Connection::GetInstance();

                $result = $this->connection->Execute($query);

                $cinemaList = array();
                if($result != null){
                    
                    foreach($result as $valuesArray)
                    {
                        $cinema = new Cinema();
                        $cinema->setId($valuesArray["id"]);
                        $cinema->setName($valuesArray["name"]);
                        $cinema->setAddress($valuesArray["address"]);
                        $cinema->setPrice($valuesArray["price"]);

                        array_push($cinemaList, $cinema);
                    }
                }
            }
            catch(Exception $ex)
            {
                throw $ex;
            }

            return $cinemaList;
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
            $cinema = null;

            try
            {
                $query = "SELECT id,name,address,price FROM ".$this->tableName." WHERE id = :id;";

                $parameters["id"] = $id;

                $this->connection = Connection::GetInstance();

                $result = $this->connection->Execute($query, $parameters);

                if($result != null && !empty($result)){
                    $cinema_array = $result[0];

                    $cinema = new Cinema();
                    $cinema->setName($cinema_array["name"]);
                    $cinema->setAddress($cinema_array["address"]);
                    $cinema->setPrice($cinema_array["price"]);
                    $cinema->setId($cinema_array["id"]);
                }
            }
            catch(Exception $ex)
            {
                throw $ex;
            }

            return $cinema;
        }

        public function Update(Cinema $cinema)
        {
            try
            {
                $query = "UPDATE ".$this->tableName." SET name = :name, address = :address, price = :price WHERE ID = :id;";

                $parameters["id"] = $cinema->getId();
                $parameters["name"] = $cinema->getName();
                $parameters["address"] = $cinema->getAddress();
                $parameters["price"] = $cinema->getPrice();

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