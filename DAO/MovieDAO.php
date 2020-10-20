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

        public function Remove($id) // Método NO PROBADO
        {
            $this->RetrieveData();

            for ($i = 0; $i < count($this->movieList); $i++)
            {
                if($id == $this->movieList[$i]->getId())
                {   
                    unset($this->movieList[$i]);
                }
            }

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
                $valuesArray["poster_path"] = $movie->getPosterPath();
                $valuesArray["id"] = $movie->getId();
                $valuesArray["original_language"] = $movie->getLanguage();
                $valuesArray["genre_ids"] = $movie->getGenreIds();
                $valuesArray["title"] = $movie->getTitle();
                $valuesArray["overview"] = $movie->getOverview();
                $valuesArray["release_date"] = $movie->getReleaseDate();
                $valuesArray["runtime"] = $movie->getRuntime();

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
                    $movie->setPosterPath($valuesArray["poster_path"]);
                    $movie->setId($valuesArray["id"]);
                    $movie->setLanguage($valuesArray["original_language"]);
                    $movie->setGenreIds($valuesArray["genre_ids"]);
                    $movie->setTitle($valuesArray["title"]);
                    $movie->setOverview($valuesArray["overview"]);
                    $movie->setReleaseDate($valuesArray["release_date"]);
                    $movie->setRuntime($valuesArray["runtime"]);

                    array_push($this->movieList, $movie);
                }
            }else{
				$this->RefreshData();
			}
        }

        public function RefreshData()
        {
            // PRIMER LLAMADA A LA API, OBTIENE LA LISTA DE LOS ACTUALES
            $method = 'movie/now_playing';
            $jsonContentAPI = file_get_contents(API_URL . '/' . $method . '?page=1&language=' . LANGUAGE_API . '&api_key=' . API_KEY); #aca deberia leer el link de la api para traernos un json
            $arrayToDecode = ($jsonContentAPI) ? json_decode($jsonContentAPI, true) : array(); #transformamos el json de la api en un arreglo

            if(file_exists('Data/movies.json'))
            {
                unlink('Data/movies.json'); #si el archivo nuestro existe lo borramos
            }

            foreach($arrayToDecode['results'] as $valuesArray)
            {
                $posterPath = $valuesArray['poster_path'];
                $id = $valuesArray['id'];
                $language = $valuesArray['original_language'];
                $genreIds = $valuesArray['genre_ids'];
                $title = $valuesArray['title'];
                $overview = $valuesArray['overview'];
                $releaseDate = $valuesArray['release_date'];

                // SEGUNDA LLAMADA A LA API, OBTIENE LOS DETALLES DE UNA PELICULA EN PARTICULAR
                $method = 'movie/' . $id;
                $jsonContentAPI = file_get_contents(API_URL . '/' . $method . '?api_key=' . API_KEY . '&language=' . LANGUAGE_API);
                $arrayToDecode2 = ($jsonContentAPI) ? json_decode($jsonContentAPI, true) : array();

                $runtime = $arrayToDecode2['runtime'];

                $movie = new Movie($posterPath, $id, $language, $genreIds, $title, $overview, $releaseDate, $runtime); 
                array_push($this->movieList, $movie);
            }

            $this->SaveData();
        }
		
		public function GetAllThemes()
        {
			$themes = array();
			
            $method = 'genre/movie/list';
            $jsonContentAPI = file_get_contents(API_URL . '/' . $method . '?page=1&language=' . LANGUAGE_API . '&api_key=' . API_KEY); #aca deberia leer el link de la api para traernos un json

            $arrayToDecode = ($jsonContentAPI) ? json_decode($jsonContentAPI, true) : array(); #transformamos el json de la api en un arreglo

            foreach($arrayToDecode['genres'] as $valuesArray)
            {
                $themeName = $valuesArray['name'];
                $themeId = $valuesArray['id'];

                $themes[$themeId] = $themeName;
            }

            return $themes;
        }
    }
?>