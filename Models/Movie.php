<?php
    namespace Models;

    class Movie
    {
        private $posterPath;
        private $id;
        private $language;
        private $genreIds;
        private $title;
        private $overview;
        private $releaseDate;
        private $runtime; // en minutos

        public function __construct($posterPath = "", $id = "", $language = "", $genreIds = "", $title = "", $overview = "", $releaseDate = "", $runtime = "")
        {
            $this->posterPath = $posterPath;
            $this->id = $id;
            $this->language = $language;
            $this->genreIds = $genreIds;
            $this->title = $title;
            $this->overview = $overview;
            $this->releaseDate = $releaseDate;
            $this->runtime = $runtime;
        }

        public function getPosterPath()
        {
            return $this->posterPath;
        }

        public function setPosterPath($posterPath)
        {
            $this->posterPath = $posterPath;
        }

        public function getId()
        {
            return $this->id;
        }

        public function setId($id)
        {
            $this->id = $id;
        }

        public function getLanguage()
        {
            return $this->language;
        }

        public function setLanguage($language)
        {
            $this->language = $language;
        }

        public function getGenreIds()
        {
            return $this->genreIds;
        }

        public function setGenreIds($genreIds)
        {
            $this->genreIds = $genreIds;
        }

        public function getTitle()
        {
            return $this->title;
        }

        public function setTitle($title)
        {
            $this->title = $title;
        }

        public function getOverview()
        {
            return $this->overview;
        }

        public function setOverview($overview)
        {
            $this->overview = $overview;
        }

        public function getReleaseDate()
        {
            return $this->releaseDate;
        }

        public function setReleaseDate($releaseDate)
        {
            $this->releaseDate = $releaseDate;
        }

        public function getRuntime()
        {
            return $this->runtime;
        }

        public function setRuntime($runtime)
        {
            $this->runtime = $runtime;
        }
    }
?>

