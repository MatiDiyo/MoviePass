<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\ICinemaDAO as ICinemaDAO;
    use Models\Cinema as Cinema;
    use DAO\Connection as Connection; 

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

                if($result != null){
                    $cinemaList = array();
                    foreach($result as $valuesArray)
                    {
                        $cinema = new Cinema();
                        $cinema->setName($valuesArray["name"]);
                        $cinema->setAddress($valuesArray["address"]);
                        $cinema->setPrice($valuesArray["price"]);
                        $cinema->setId($valuesArray["id"]);

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

                $parameters["name"] = $cinema->getName();
                $parameters["address"] = $cinema->getAddress();
                $parameters["price"] = $cinema->getPrice();
                $parameters["id"] = $cinema->getId();

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