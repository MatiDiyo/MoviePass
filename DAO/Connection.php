<?php
    namespace DAO;

    use \PDO as PDO;
    use \Exception as Exception;
    use DAO\QueryType as QueryType;

    class Connection
    {
        private $pdo = null;
        private $pdoStatement = null;
        private static $instance = null;

        //Inicializamos un objeto de tipo PDO proporcionando el server, database, user y password
        //que tenemos en nuestro Config.php
        private function __construct()
        {
            try
            {
                $this->pdo = new PDO ("mysql:host=".DB_HOST."; dbname=".DB_NAME, DB_USER, DB_PASS);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //establece el modo de errores a excepciones
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public static function GetInstance()
        {
            if(self:$instance == null) //self se utiliza para ingresar a una constante o metodo estatico desde dentro de una clase
                self::$instance = new Connection(); //si instance es null lo instancia

            return self::$instance; //y lo retornamos
        }

        public function Execute($query, $parameters = array(), $queryType = QueryType::Query)
        {//ejecuta una query de tipo SELECT, retorna una matriz
            try
            {
                $this->Prepare($query); //prepara la consulta

                $this->BindParameters($parameters, $queryType); //arma los parametros a enviar a la query

                $this->pdoStatement->execute(); //ejecuta la sentencia SQL

                return $this->pdoStatement->fetchAll(); //retorna un array de resultados donde cada fila es a su vez un array asociativo
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        //Ejecuta una query SQL de tipo INSERT, UPDATE, DELETE, retorna la cantidad de filas afectadas (si devuelve 0 no se habria ejecutado ninguna tarea)
        public function ExecuteNonQuery($query, $parameters = array(), $queryType = QueryType::Query)
        {
            try
            {
                $this->Prepare($query);

                $this->BindParameters($parameters, $queryType);

                $this->pdoStatement->execute();

                return $this->pdoStatement->rowCount();
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        private function Prepare($query)
        {
            try
            {
                $this->pdoStatement = $this->pdo->prepare($query); //ejecuta un prepare interno de PDO para preparar la consulta a ejecutar
                //prepare devuelve un objeto statement
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        private function BindParameters($parameters = array(), $queryType = QueryType::Query)
        {//dependiendo del querytype realiza el armado de los parametros
            $i = 0;

            foreach($parameters as $parameterName => $value)
            {
                $i++;
                if($queryType == QueryType::Query)
                    $this->pdoStatement->bindParam(":".$parameterName, $parameters[$parameterName]);
                else
                    $this->pdoStatement->bindParam($i, $parameters[$parameterName]);
            }
        }
    }
?>