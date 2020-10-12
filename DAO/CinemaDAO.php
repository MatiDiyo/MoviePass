<?php
    namespace DAO;

    use DAO\ICinemaDAO as ICinemaDAO;
    use Models\Cinema as Cinema;

    class CinemaDAO implements ICinemaDAO
    {
        private $cinemaList = array();

        public function Add(Cinema $cinema)
        {
            $this->RetrieveData();
            
            array_push($this->cinemaList, $cinema);

            $this->SaveData();
        }

        public function GetAll()
        {
            $this->RetrieveData();

            return $this->cinemaList;
        }

        private function SaveData()
        {
            $arrayToEncode = array();

            foreach($this->cinemaList as $cinema)
            {
				//TODO REEMPLAZAR POR DOMAIN CINE
                $valuesArray["name"] = $cinema->getName();
                $valuesArray["address"] = $cinema->getAddress();
                $valuesArray["capacity"] = $cinema->getCapacity();
                $valuesArray["price"] = $cinema->getPrice();
                $valuesArray["id"] = $cinema->getId();

                array_push($arrayToEncode, $valuesArray);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
            file_put_contents('Data/cinemas.json', $jsonContent);
        }

        private function RetrieveData()
        {
            $this->cinemaList = array();

            if(file_exists('Data/cinemas.json'))
            {
                $jsonContent = file_get_contents('Data/cinemas.json');

                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayToDecode as $valuesArray)
                {
                    $cinema = new Cinema();
					//TODO REEMPLAZAR POR DOMAIN CINE
                    $cinema->setName($valuesArray["name"]);
                    $cinema->setAddress($valuesArray["address"]);
                    $cinema->setCapacity($valuesArray["capacity"]);
                    $cinema->setPrice($valuesArray["price"]);
                    $cinema->setId($valuesArray["id"]);

                    array_push($this->cinemaList, $cinema);
                }
            }
        }

        public function Remove($id)
        {            
            $this->RetrieveData();
            
            $this->cinemaList = array_filter($this->cinemaList, function($cinema) use($id){                
                return $cinema->getId() != $id;
            });
            
            $this->SaveData();
        }

    }
?>