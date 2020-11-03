<?php
    namespace DAO;

    use Controllers\APIController as APIController;
    use Models\Genre as Genre;

    class GenreDAO
    {
        private $tableName = "genre";

        public function GetAll()
        {
            return $this->RetrieveData();
        }

        private function SaveData($genreList)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (id,name) VALUES (:id,:name);" ;

                $this->connection = Connection::GetInstance();
                
                foreach($genreList as $idx => $genre){

                    $parameters = array();
                    $parameters["id"] = $genre->getId();
                    $parameters["name"] = $genre->getName();

                    $this->connection->ExecuteNonQuery($query, $parameters);
                }
        
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        private function RetrieveData()
        {
            $genreList = null;
            try
            {
                $query = "SELECT id, name FROM ".$this->tableName.";";

                $this->connection = Connection::GetInstance();
                
                $result = $this->connection->Execute($query);
                
                $genreList = array();
                if($result != null){
                    foreach($result as $valuesArray)
                    {
                        $genre = new Genre();
                        $genre->setId($valuesArray["id"]);
                        $genre->setName($valuesArray["name"]);

                        array_push($genreList, $genre);
                    }
                }
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
            
            return $genreList;   
            
        }

        public function RefreshData()
        {
            // LLAMADA A LA API, OBTIENE TODOS LOS GÉNEROS PRINCIPALES
            $arrayToDecode = APIController::GetRequest('genre/movie/list', '&language=' . API_LANGUAGE);
            $genreList = array();
            foreach($arrayToDecode['genres'] as $valuesArray)
            {
                $id = $valuesArray['id'];
                $name = $valuesArray['name'];

                $genre = new Genre($id, $name); 
                array_push($genreList, $genre);
            }

            $genresDB = $this->GetAll();

            $genresToAdd = array_udiff($genreList,$genresDB, function($genreDB, $genreApi){
                return(strcmp($genreDB->getName(),$genreApi->getName()));
            });


            $this->SaveData($genresToAdd);
        }

    }
?>