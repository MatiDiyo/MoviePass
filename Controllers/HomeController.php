<?php
    namespace Controllers;

    use Controllers\MovieController as MovieController;

    class HomeController
    {
        private $movieController;

        public function __construct()
        {
            $this->movieController = new MovieController();
        }

        public function Index($message = "")
        {
            //go to index
            //require_once(VIEWS_PATH."index.php");
            
            //go to Cartelera por default
            $this->movieController->ShowListView();
        }
    }
?>