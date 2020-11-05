<?php
    namespace Controllers;

    use DAO\MovieDAO as MovieDAO;
    use DAO\ShowtimeDAO as ShowtimeDAO;
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
            $showtimeDAO = new ShowtimeDAO();

            $movieList = array();
            $showtimeList = $showtimeDAO->GetAll(null,null,null,null);
            foreach($showtimeList as $showtime){
                array_push($movieList,$showtime->getMovie());
            }

			$genreList = $genreDAO->GetAll();

            require_once(VIEWS_PATH."movies-admin.php");
        }

        public function RefreshData()
        {
            $this->movieDAO->refreshData();
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

        public function Search(){
            $datetime = $_GET["date"] != null ? $_GET["date"] : null;
            $genreId = $_GET["genre"] != null && $_GET["genre"] !== ""? $_GET["genre"] : null;
            $datetime = explode("T",$datetime);
            $date_part = $datetime[0];
            $time_part = $datetime[1] != null ? $datetime[1] : "00:00";

            $date = date('Y-m-d',strtotime($date_part));
            $time = date('H:i',strtotime($time_part));

            $showtimeDAO = new ShowtimeDAO();

            $movieList = array();
            $showtimeList = $showtimeDAO->GetAll(null,null,$date,$time,$genreId);
            /*foreach($showtimeList as $showtime){
                array_push($movieList,$showtime->getMovie());
            }*/

            $genreDAO = new GenreDAO();
            $genreList = $genreDAO->GetAll();

            require_once(VIEWS_PATH."movies-admin.php");
        }

    }