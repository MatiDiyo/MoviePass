<?php
    namespace Controllers;

    use DAO\CinemaDao as CinemaDao;
    use DAO\RoomDao as RoomDao;
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

        public function Add($cinemaName, $cinemaAddress, $cinemaPrice)
        {
            $cinema = new Cinema();
            $cinema->setName($cinemaName);
            $cinema->setAddress($cinemaAddress);
            $cinema->setPrice($cinemaPrice);

            $this->cinemaDao->Add($cinema);

            $this->ShowListView();
        }

        public function Remove($id)
        {
            $this->cinemaDao->Remove($id);

            $this->ShowListView();
        }

        public function ShowEditView($id)
        {
            $cinema = $this->cinemaDao->GetOne($id);

            $roomDao = new RoomDao();
            $cinema->setRoomList($roomDao->GetAll($cinema));
            
            if($cinema!=null){
                require_once(VIEWS_PATH."cinema-add.php");  
            }else{
                //SHOW ERROR
            }

        }

        public function Edit($cinemaId, $cinemaName, $cinemaAddress,$cinemaPrice)
        {
            $cinema = new Cinema();
            $cinema->setId($cinemaId);
            $cinema->setName($cinemaName);
            $cinema->setAddress($cinemaAddress);
            $cinema->setPrice($cinemaPrice);

            $this->cinemaDao->Update($cinema);

            $this->ShowListView();
        }
    }
?>