<?php
    namespace Controllers;

    use DAO\RoomDao as RoomDao;
    use DAO\CinemaDao as CinemaDao;
    use Models\Room as Room;
    use Models\Cinema as Cinema;

    class RoomController
    {
        private $roomDao;
        private $cinemaDAO;

        public function __construct()
        {
            $this->roomDao = new RoomDao();
            $this->$cinemaDAO = new CinemaDAO();
        }

        public function ShowAddView($cinemaId)
        {
            $cinemaId = $cinemaId;
            require_once(VIEWS_PATH."room-add.php");
        }

        public function ShowListView($cinema)
        {
            $roomList = $this->roomDao->GetAll($cinema);

            require_once(VIEWS_PATH."room-list.php");
        }

        public function Add($cinemaId, $roomName, $roomCapacity)
        {
            $room = new Room();
            $room->setName($roomName);
            $room->setCapacity($roomCapacity);
            
            $cinema = $this->$cinemaDAO->GetOne($cinemaId);
            $room->setCinema($cinema);

            $this->roomDao->Add($room);

            $cinema->setRoomList($this->roomDao->GetAll($cinema));

            require_once(VIEWS_PATH."cinema-add.php"); 
        }

        public function Remove($cinemaId, $roomId)
        {
            $this->roomDao->Remove($roomId);

            $cinema = $this->$cinemaDAO->GetOne($cinemaId);
            $cinema->setRoomList($this->roomDao->GetAll($cinema));

            require_once(VIEWS_PATH."cinema-add.php");
        }

        public function ShowEditView($cinemaId, $roomId)
        {
            $room = $this->roomDao->GetOne($roomId);
            if($room!=null){
                require_once(VIEWS_PATH."room-add.php");  
            }else{
                //SHOW ERROR
            }

        }

        public function Edit($cinemaId, $roomId, $roomName, $roomCapacity)
        {
            $room = new Room();
            $room->setId($roomId);
            $room->setName($roomName);
            $room->setCapacity($roomCapacity);

            $this->roomDao->Update($room);
            
            $cinema = $this->$cinemaDAO->GetOne($cinemaId);
            $room->setCinema($cinema);

            $cinema->setRoomList($this->roomDao->GetAll($cinema));

            require_once(VIEWS_PATH."cinema-add.php"); 
        }
    }
?>