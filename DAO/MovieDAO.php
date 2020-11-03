<?php
    namespace DAO;

    use Controllers\APIController as APIController;
    use \Exception as Exception;
    use DAO\IMovieDAO as IMovieDAO;
    use Models\Movie as Movie;
    use DAO\Connection as Connection;

    class MovieDAO implements IMovieDAO
    {

        private $connection;
        private $tableName = "movie";

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
            return $this->RetrieveData();
        }

        private function SaveData($movieList)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (`title`, `posterPath`, `language`, `overview`, `releaseDate`) VALUES (:title, :posterPath, :language, :overview, :releaseDate);" ;

                $this->connection = Connection::GetInstance();
                
                foreach($movieList as $idx => $movie){

                    $parameters = array();
                    $parameters["title"] = $movie->getTitle();
                    $parameters["posterPath"] = $movie->getPosterPath();
                    $parameters["language"] = $movie->getLanguage();
                    $parameters["overview"] = $movie->getOverview();
                    $parameters["releaseDate"] = $movie->getReleaseDate();

                    $this->connection->ExecuteNonQuery($query, $parameters);
                }
                //$query = preg_replace('/(,(?!.*,))/', ';', $query);
        
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        private function RetrieveData()
        {
            $movieList = null;
            try
            {
                $query = "SELECT id, title, posterPath, language, overview, releaseDate FROM ".$this->tableName.";";

                $this->connection = Connection::GetInstance();
                
                $result = $this->connection->Execute($query);
                
                $movieList = array();
                if($result != null){
                    foreach($result as $valuesArray)
                    {
                        $movie = new Movie();
                        $movie->setId($valuesArray["id"]);
                        $movie->setTitle($valuesArray["title"]);
                        $movie->setPosterPath($valuesArray["posterPath"]);
                        $movie->setLanguage($valuesArray["language"]);
                        $movie->setOverview($valuesArray["overview"]);
                        $movie->setReleaseDate($valuesArray["releaseDate"]);

                        array_push($movieList, $movie);
                    }
                }/*else{
                    RefreshData();
                }*/
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
            
            return $movieList;
        }

        public function RefreshData()
        {
            // PRIMER LLAMADA A LA API, OBTIENE LA LISTA DE LOS ACTUALES
            $arrayToDecode = APIController::GetRequest('movie/now_playing', '&language=' . API_LANGUAGE . '&page=1');

            $movieListDB = $this->RetrieveData();

            $movieList = array();
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
                $arrayToDecode2 = APIController::GetRequest('movie/' . $id, '&language=' . API_LANGUAGE);
                $runtime = $arrayToDecode2['runtime'];

                $movie = new Movie($posterPath, $id, $language, $genreIds, $title, $overview, $releaseDate); 
                array_push($movieList, $movie);
            }
            
            $moviesToAdd = array_udiff($movieList,$movieListDB, function($movieDB, $movieApi){
                return(strcmp($movieDB->getTitle(),$movieApi->getTitle()));
            });
            if($moviesToAdd != null && count($moviesToAdd)>0){
                echo '<script>console.log("Guardando Datos")</script>';
                $this->SaveData($moviesToAdd);
            }
        }
		
		public function GetAllThemes()
        {
			$themes = array();
            $arrayToDecode = APIController::GetRequest('genre/movie/list', '&language=' . API_LANGUAGE);

            foreach($arrayToDecode['genres'] as $valuesArray)
            {
                $themeName = $valuesArray['name'];
                $themeId = $valuesArray['id'];

                $themes[$themeId] = $themeName;
            }

            return $themes;
        }

        public function GetOne($id)
        {            
            $movie = null;

            try
            {
                $query = "SELECT id, title, posterPath, language, overview, releaseDate FROM ".$this->tableName." WHERE id=:id;";

                $parameters["id"] = $id;

                $this->connection = Connection::GetInstance();
                
                $result = $this->connection->Execute($query, $parameters);
                
                if($result != null && !empty($result)){
                    $valuesArray = $result[0];
                    $movie = new Movie();
                    $movie->setId($valuesArray["id"]);
                    $movie->setTitle($valuesArray["title"]);
                    $movie->setPosterPath($valuesArray["posterPath"]);
                    $movie->setLanguage($valuesArray["language"]);
                    $movie->setOverview($valuesArray["overview"]);
                    $movie->setReleaseDate($valuesArray["releaseDate"]);
                }
            }
            catch(Exception $ex)
            {
                throw $ex;
            }

            return $movie;
        }
    }
?>