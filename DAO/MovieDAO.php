<?php
    namespace DAO;

    use DAO\IMovieDAO as IMovieDAO;
    use Models\Movie as Movie;

    class MovieDAO implements IMovieDAO
    {
        private $movieList = array();

        public function Add(Movie $movie)
        {
            $this->RetrieveData();
            
            array_push($this->movieList, $movie);

            $this->SaveData();
        }

        public function GetAll()
        {
            $this->RetrieveData();

            return $this->movieList;
        }

        private function SaveData()
        {
            $arrayToEncode = array();

            foreach($this->movieList as $movie)
            {
				//TODO REEMPLAZAR POR DOMAIN MOVIE
                $valuesArray["recordId"] = $movie->getRecordId();
                $valuesArray["firstName"] = $movie->getFirstName();
                $valuesArray["lastName"] = $movie->getLastName();

                array_push($arrayToEncode, $valuesArray);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
            file_put_contents('Data/movies.json', $jsonContent);
        }

        private function RetrieveData()
        {
            $this->movieList = array();

            if(file_exists('Data/movies.json'))
            {
                $jsonContent = file_get_contents('Data/movies.json');

                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayToDecode as $valuesArray)
                {
                    $movie = new Movie();
					//TODO REEMPLAZAR POR DOMAIN MOVIE
                    $movie->setRecordId($valuesArray["recordId"]);
                    $movie->setFirstName($valuesArray["firstName"]);
                    $movie->setLastName($valuesArray["lastName"]);

                    array_push($this->movieList, $movie);
                }
            }
        }
    }
?>