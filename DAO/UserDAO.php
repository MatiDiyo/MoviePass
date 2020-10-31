<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\IUserDAO as IUserDAO; 
    use Models\User as User;
    use DAO\Connection as Connection; 

    class UserDAO implements IUserDAO
    {
        private $connection;
        private $tableName = "users";

        public function Add(User $user)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (mail, pass) VALUES (:mail, :password);";

                $parameters["mail"] = $user->getMail(); //seteo de los parametros que vamos a enviar
                $parameters["password"] = $user->getPassword();

                $this->connection = Connection::GetInstance(); //genera una instancia de PDO si no existe

                $this->connection->ExecuteNonQuery($query, $parameters); //hace un INSERT 
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetAll()
        {
            try
            {
                $userList = array();

                $query = "SELECT * FROM ".$this->tableName;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);

                foreach($resultSet as $row)
                {
                    $user->setMail($row["mail"]);
                    $user->setPassword($row["pass"]);

                    array_push($userList, $user);
                }

                return $userList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetOne(User $user)
        {
            try
            {
                $userResult = null;
                
                $query = "SELECT * FROM ".$this->tableName." WHERE (mail = :mail) AND (pass = :password);"; 
                
                $parameters["mail"] = $user->getMail();
                $parameters["password"] = $user->getPassword();
                
                $this->connection = Connection::GetInstance();
                
                $resultSet = $this->connection->Execute($query, $parameters);

                foreach($resultSet as $row)
                {
                    $userResult = new User();
                
                    $userResult->setMail($row["mail"]);
                    $userResult->setPassword($row["pass"]);                
                }
                return $userResult;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }


    }
?>