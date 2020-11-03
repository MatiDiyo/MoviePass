<?php
    namespace Controllers;

    // Creado para no harcodear las url de las API
    class APIController
    {
        public static function GetRequest($method, $parameters)
        {
            $url = API_URL . '/' . $method . '?api_key=' . API_KEY . $parameters;
            $jsonContentAPI = file_get_contents($url);
            $arrayToDecode = ($jsonContentAPI) ? json_decode($jsonContentAPI, true) : array();

            return $arrayToDecode;
        }
    }
?>