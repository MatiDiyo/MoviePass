<?php
    namespace Controllers;

    use DAO\MovieDao as MovieDao;
    use Models\Movie as Movie;

    class MovieController
    {
        private $movieDao;

        public function __construct()
        {
            $this->movieDao = new MovieDao();
        }

        public function ShowAddView()
        {
            require_once(VIEWS_PATH."movie-add.php");
        }

        public function ShowListView()
        {
            $movieList = $this->movieDao->GetAll();

            require_once(VIEWS_PATH."movie-list.php");
        }

        public function Add($recordId, $firstName, $lastName)
        {
            $movie = new Movie();
			//TODO REEMPLAZAR POR DOMAIN CINE
            $movie->setRecordId($recordId);
            $movie->setfirstName($firstName);
            $movie->setLastName($lastName);

            $this->movieDao->Add($movie);

            $this->ShowAddView();
        }
    }
?>