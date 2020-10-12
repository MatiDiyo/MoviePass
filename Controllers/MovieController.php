<?php
    namespace Controllers;

    use DAO\MovieDAO as MovieDAO;
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
            require_once(VIEWS_PATH."add-cellphone.php");
        }

        public function ShowListView()
        {
            $movieList = $this->movieDAO->GetAll();

            require_once(VIEWS_PATH."movies-admin.php");
        }

        public function RefreshData()
        {
            $movieDAO = new MovieDAO();
            $movieDAO->refreshData();
            $this->ShowListView();
        }

        public function Add($posterPath, $id, $language, $genreIds, $title, $overview, $releaseDate)
        {
            $movie = new Movie();
           
            $movie->setPosterPath($posterPath);
            $movie->setId($id);
            $movie->setLanguage($language);
            $movie->setGenreIds($genreIds);
            $movie->setTitle($title);
            $movie->setOverview($overview);
            $movie->setReleaseDate($releaseDate);
            
            $this->movieDAO->Add($movie);

            $this->ShowAddView();
        }

        public function Remove($id)
        {
            $this->movieDAO->Remove($id);

            $this->ShowListView();
        }

    }