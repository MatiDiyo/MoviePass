<?php
    namespace Controllers;

    use DAO\GenreDao as GenreDao;
    use Models\Genre as Genre;

    class GenreController
    {
        private $genreDao;

        public function __construct()
        {
            $this->genreDao = new GenreDao();
        }

        public function Add()
        {
           
            
        }

        public function Remove($id)
        {
            

        }
        
    }
?>