<?php
    namespace DAO;

    use Controllers\APIController as APIController;
    //use DAO\ICinemaDAO as ICinemaDAO;
    use Models\Genre as Genre;

    class GenreDAO
    {
        private $genreList = array();

        public function Add(Genre $genre)
        {
            $this->RetrieveData();
            
            array_push($this->genreList, $genre);

            $this->SaveData();
        }

        public function GetAll()
        {
            $this->RetrieveData();

            return $this->genreList;
        }

        private function SaveData()
        {
            $arrayToEncode = array();

            foreach($this->genreList as $genre)
            {
                $valuesArray["id"] = $genre->getId();
                $valuesArray["name"] = $genre->getName();

                array_push($arrayToEncode, $valuesArray);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
            file_put_contents('Data/genres.json', $jsonContent);
        }

        private function RetrieveData()
        {
            $this->genreList = array();

            if(file_exists('Data/genres.json'))
            {
                $jsonContent = file_get_contents('Data/genres.json');

                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayToDecode as $valuesArray)
                {
                    $genre = new Genre();

                    $genre->setId($valuesArray["id"]);
                    $genre->setName($valuesArray["name"]);
                    
                    array_push($this->genreList, $genre);
                }
            }
        }

        public function Remove($id)
        {            
            $this->RetrieveData();
            
            $this->genreList = array_filter($this->genreList, function($genre) use($id){                
                return $genre->getId() != $id;
            });
            
            $this->SaveData();
        }

        public function RefreshData()
        {
            // LLAMADA A LA API, OBTIENE TODOS LOS GÉNEROS PRINCIPALES
            $arrayToDecode = APIController::GetRequest('genre/movie/list', '&language=' . API_LANGUAGE);

            if(file_exists('Data/genres.json'))
            {
                unlink('Data/genres.json'); #si el archivo nuestro existe lo borramos
            }

            foreach($arrayToDecode['genres'] as $valuesArray)
            {
                $id = $valuesArray['id'];
                $name = $valuesArray['name'];

                $genre = new Genre($id, $name); 
                array_push($this->genreList, $genre);
            }

            $this->SaveData();
        }

        public function Search()
        {
            
        }

    }
?>