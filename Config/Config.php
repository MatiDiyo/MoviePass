<?php 
    namespace Config;

    define("ROOT", dirname(__DIR__) . "/");
    //Path to your project's root folder
    define("FRONT_ROOT", "/MoviePass/");
    define("VIEWS_PATH", "Views/");
    define("CSS_PATH", FRONT_ROOT.VIEWS_PATH . "css/");
    define("JS_PATH", FRONT_ROOT.VIEWS_PATH . "js/");
    define("IMG_PATH", FRONT_ROOT.VIEWS_PATH . "img/");

    // API CONSTANTS
    define("API_URL", "https://api.themoviedb.org/3");
    define("API_KEY", "36267897603498f1c34335429569f1c0");
    define("API_LANGUAGE", "es");
    define("API_URL_IMG", "https://image.tmdb.org/t/p/w500");

    define("DB_HOST", "localhost");
    define("DB_NAME", "moviepass");
    define("DB_USER", "root");
    define("DB_PASS", "");
?>
