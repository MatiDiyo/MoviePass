<?php
    namespace Models;

    class Movie
    {
		//TODO AGREGAR PROPIEDADES
		
        private $recordId;

        public function getRecordId()
        {
            return $this->recordId;
        }

        public function setRecordId($recordId)
        {
            $this->recordId = $recordId;
        }
    }
?>

