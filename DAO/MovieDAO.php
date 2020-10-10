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
                $valuesArray["posterPath"] = $movie->getPosterPath();
                $valuesArray["id"] = $movie->getId();
                $valuesArray["language"] = $movie->getLanguage();
                $valuesArray["genreIds"] = $movie->getGenreIds();
                $valuesArray["title"] = $movie->getTitle();
                $valuesArray["overview"] = $movie->getOverview();
                $valuesArray["releaseDate"] = $movie->getReleaseDate();

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
                    $movie->setPosterPath($valuesArray["posterPath"]);
                    $movie->setId($valuesArray["id"]);
                    $movie->setLanguage($valuesArray["language"]);
                    $movie->setGenreIds($valuesArray["genreIds"]);
                    $movie->setTitle($valuesArray["title"]);
                    $movie->setOverview($valuesArray["overview"]);
                    $movie->setReleaseDate($valuesArray["releaseDate"]);

                    array_push($this->movieList, $movie);
                }
            }
        }

        public function refreshData()
        {
            $arrayToEncode = array();
            $jsonContentAPI = file_get_contents('https://api.themoviedb.org/3/movie/now_playing?page=1&language=es-US&api_key=36267897603498f1c34335429569f1c0'); #aca deberia leer el link de la api para traernos un json
            $arrayToDecode = ($jsonContentAPI) ? json_decode($jsonContentAPI, true) : array(); #transformamos el json de la api en un arreglo

            if(file_exists('Data/movies.json'))
            {
                unlink('Data/movies.json'); #si el archivo nuestro existe lo borramos
            }

            foreach($arrayToDecode['results'] as $valuesArray)
            {
                $movie = new Movie($valuesArray['posterPath'], $valuesArray['id'], $valuesArray['language'], $valuesArray['genreIds'], $valuesArray['title'], $valuesArray['overview'], $valuesArray['releaseDate']); 
                array_push($arrayToEncode, $movie);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);

            file_put_contents('Data/movies.json', $jsonContent);

        }

    }
?>