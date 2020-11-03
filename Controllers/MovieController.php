<?php
    namespace Controllers;

    use DAO\MovieDAO as MovieDAO;
    use DAO\GenreDAO as GenreDAO;
    use Models\Movie as Movie;

    class MovieController
    {
        private $movieDAO;

        public function __construct()
        {
            $this->movieDAO = new MovieDAO();
        }

        public function ShowAddView()
        {
            require_once(VIEWS_PATH."add-cellphone.php"); //hay que cambiar aca
        }

        public function ShowListView()
        {
            $genreDAO = new GenreDAO();

            $movieList = $this->movieDAO->GetAll();
			$genreList = $genreDAO->GetAll();

            require_once(VIEWS_PATH."movies-admin.php");
        }

        public function RefreshData()
        {
            $movieDAO = new MovieDAO();
            $movieDAO->refreshData();
            $this->ShowListView();
        }

        public function Add($posterPath, $id, $language, $genreIds, $title, $overview, $releaseDate, $runtime)
        {
            $movie = new Movie();
           
            $movie->setPosterPath($posterPath);
            $movie->setId($id);
            $movie->setLanguage($language);
            $movie->setGenreIds($genreIds);
            $movie->setTitle($title);
            $movie->setOverview($overview);
            $movie->setReleaseDate($releaseDate);
            $movie->setRuntime($runtime);
            
            $this->movieDAO->Add($movie);

            $this->ShowAddView();
        }

        public function Remove($id)
        {
            $this->movieDAO->Remove($id);

            $this->ShowListView();
        }

        public function SearchForDate(){
            $date = $_GET["date"] != null ? $_GET["date"] : null;
            

            require_once(VIEWS_PATH."movies-admin.php");
        }


        public function SearchForGenres()
        {
            $genre = $_GET["genre"] != null ? $_GET["genre"] : null;

            $genreDAO = new GenreDAO();

            $genreList = $genreDAO->GetAll();
            $movieList = $this->movieDAO->GetAll();

            $count = count($movieList);

            for ($i = 0; $i < $count; $i++)
            {
                if($genre != $movieList[$i]->getGenreIds()[0])
                {   
                    unset($movieList[$i]);
                }
            }

            $count = count($movieList);

            $alert = array();

            if ($count == 0)
            {
                $alert['name'] = 'failure';
                $alert['message'] = 'No se han encontrado resultados.';
            }
            else
            {
                if ($count == 1)
                {
                    $alert['name'] = 'success';
                    $alert['message'] = 'Se ha encontrado un resultado.';
                }
                else
                {
                    $alert['name'] = 'success';
                    $alert['message'] = 'Se han encontrado '. $count . ' resultados.';
                }
            }

            require_once(VIEWS_PATH."movies-admin.php");
        }

    }