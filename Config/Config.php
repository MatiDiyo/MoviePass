<?php 
    namespace Config;

    define("ROOT", dirname(__DIR__) . "/");
    //Path to your project's root folder
    define("FRONT_ROOT", "/MoviePass/");
    define("VIEWS_PATH", "Views/");
    define("CSS_PATH", FRONT_ROOT.VIEWS_PATH . "css/");
    define("JS_PATH", FRONT_ROOT.VIEWS_PATH . "js/");

    define("API_URL", "https://api.themoviedb.org/3");
    define("API_KEY", "36267897603498f1c34335429569f1c0");
    define("LANGUAGE_API", "es-US");
?>
