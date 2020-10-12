<?php
    namespace Controllers;

    use DAO\CinemaDao as CinemaDao;
    use Models\Cinema as Cinema;

    class CinemaController
    {
        private $cinemaDao;

        public function __construct()
        {
            $this->cinemaDao = new CinemaDao();
        }

        public function ShowAddView()
        {
            require_once(VIEWS_PATH."cinema-add.php");
        }

        public function ShowListView()
        {
            $cinemaList = $this->cinemaDao->GetAll();

            require_once(VIEWS_PATH."cinema-list.php");
        }

        public function Add($cinemaName, $cinemaAddress, $cinemaCapacidad, $cinemaPrice)
        {
            $cinema = new Cinema();
            //TODO REEMPLAZAR POR DOMAIN CINE
            $cinema->setId(time());
            $cinema->setName($cinemaName);
            $cinema->setAddress($cinemaAddress);
            $cinema->setCapacity($cinemaCapacidad);
            $cinema->setPrice($cinemaPrice);

            $this->cinemaDao->Add($cinema);

            $this->ShowListView();
        }

        public function Remove($id)
        {
            $this->cinemaDao->Remove($id);

            $this->ShowListView();
        }
    }
?>