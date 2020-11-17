<?php
    namespace Controllers;

    use DAO\ShowtimeDao as ShowtimeDao;
    use DAO\RoomDao as RoomDao;
    use DAO\CinemaDao as CinemaDao;
    use DAO\MovieDao as MovieDao;
    use Models\Showtime as Showtime;
    use Models\Room as Room;
    use Models\Movie as Movie;
    use Models\Ticket as Ticket;
    
    class ShowtimeController
    {
        private $showtimeDao;
        private $roomDao;
        private $movieDao;

        public function __construct()
        {
            $this->showtimeDao = new ShowtimeDao();
            $this->roomDao = new RoomDao();
            $this->movieDao = new MovieDao();
            $this->cinemaDao = new CinemaDao();
        }

        public function ShowAddView($roomId)
        {
            $roomId = $roomId;
            $movieList = $this->movieDao->GetAll();
            require_once(VIEWS_PATH."showtime-add.php");
        }

        public function ShowListView($cinemaId, $roomId)
        {
            $showtimeList = $this->showtimeDao->GetAll($roomId);
            $room = $this->roomDao->GetOne($roomId);

            require_once(VIEWS_PATH."showtime-list.php");
        }

        public function ShowVentasRemanentes()
        {
            $showtimeList = $this->showtimeDao->GetAllHistorial();
            $cinemaList = $this->cinemaDao->GetAll();
            $vendidasList = array();
            foreach($showtimeList as $row){
                $ventas["id"] = $row->getId();
                $ventas["total"] = $this->showtimeDao->GetVentas($row);

                array_push($vendidasList, $ventas);
            }

            require_once(VIEWS_PATH."ventas-remanentes.php");
        }

        public function Add($roomId, $showtimeDate, $showtimeTime, $movieId)
        {
            $showtime = new Showtime();
            $showtime->setShowtimeDate($showtimeDate);
            $showtime->setShowtimeTime($showtimeTime);
            $movie = $this->movieDao->GetOne($movieId);
            ;
            $showtime->setMovie($movie);

            $room = $this->roomDao->GetOne($roomId);
            $showtime->setRoom($room);

            $this->showtimeDao->Add($showtime);

            $this->ShowListView(null, $roomId);
        }

        public function Remove($showtimeId)
        {
            $showtime = $this->showtimeDao->GetOne($showtimeId);
            $roomId = $showtime->getRoom()->getId();
            $this->showtimeDao->Remove($showtimeId);

            $this->ShowListView(null, $roomId);
        }

        public function ShowEditView($showtimeId)
        {
            $showtime = $this->showtimeDao->GetOne($showtimeId);
            $roomId = $showtime->getRoom()->getId();
            $movieList = $this->movieDao->GetAll();
            if($showtime!=null){
                require_once(VIEWS_PATH."showtime-add.php");  
            }else{
                //SHOW ERROR
            }

        }

        public function Edit($roomId, $showtimeId, $showtimeDate, $showtimeTime, $movieId)
        {
            $showtime = new Showtime();
            $showtime->setId($showtimeId);
            $showtime->setShowtimeDate($showtimeDate);
            $showtime->setShowtimeTime($showtimeTime);
            
            $movie = $this->movieDao->GetOne($movieId);

            $showtime->setMovie($movie);
            
            $this->showtimeDao->Update($showtime);
            
            $room = $this->roomDao->GetOne($roomId);
            $showtime->setRoom($room);

            $this->ShowListView(null, $roomId);
        }
    }
?>