<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\IUserDAO as IUserDAO; 
    use Models\User as User;
    use Models\RoleUser as RoleUser;
    use Models\ProfileUser as ProfileUser;
    use DAO\Connection as Connection; 

    class UserDAO implements IUserDAO
    {
        private $connection;
        private $tableUser = "users";
        private $tableRole = "roleusers";
        private $tableProfile = "profileusers";

        private $role = "user_normal";

        public function Add(User $user)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableUser." (mail, pass) VALUES (:mail, :password);";

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

        public function AddProfile(ProfileUser $profileUser)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableProfile." (surname, dni, user_name, id_user) VALUES (:surname, :dni, :user_name, :id_user);";

                $parameters["surname"] = $profileUser->getSurname();
                $parameters["dni"] = $profileUser->getDni();
                $parameters["user_name"] = $profileUser->getName();
                $parameters["id_user"] = $profileUser->getId();

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function AddRoleUser(User $user){
            try
            {
                $query = "INSERT INTO ".$this->tableRole." (description_user, id_user) VALUES (:description_user, :id_user);";

                $parameters["description_user"] = $this->role;
                $parameters["id_user"] = $user->getId();

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
                
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

                $query = "SELECT * FROM ".$this->tableUser;

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
                
                $query = "SELECT * FROM ".$this->tableUser." WHERE (mail = :mail) AND (pass = :password);"; 
                
                $parameters["mail"] = $user->getMail();
                $parameters["password"] = $user->getPassword();
                
                $this->connection = Connection::GetInstance();
                
                $resultSet = $this->connection->Execute($query, $parameters);

                foreach($resultSet as $row)
                {
                    $userResult = new User();
                
                    $userResult->setId($row["id_user"]);
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

        public function GetProfile($id)
        {
            try
            {
                $profileResult = null;

                $query = "SELECT * FROM ".$this->tableProfile." WHERE (id_user = :id_user);";

                $parameters["id_user"] = $id;

                $this->connection = Connection::GetInstance();
                
                $resultSet = $this->connection->Execute($query, $parameters);

                foreach($resultSet as $row)
                {
                    $profileResult = new ProfileUser();

                    $profileResult->setSurname($row["surname"]);
                    $profileResult->setDni($row["dni"]);
                    $profileResult->setName($row["user_name"]);
                    $profileResult->setId($row["id_user"]);                    
                }
                return $profileResult;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetRole(User $user)
        {
            try
            { //SELECT * FROM users u INNER JOIN roleusers r ON u.id_user = r.id_user;
                $roleResult = null;

                $query = "SELECT * FROM ". $this->tableUser ." u INNER JOIN ".  $this->tableRole ." r ON r.id_user = u.id_user WHERE u.id_user = :id";
                //$query = "SELECT * FROM ".$this->tableRole." WHERE (id_user = :id);";
                
                $parameters["id"] = $user->getId();

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query, $parameters);

                foreach($resultSet as $row)
                {
                    $roleResult = new RoleUser();

                    $roleResult->setId($row["id_role"]);
                    $roleResult->setDescription($row["description_user"]);
                    $roleResult->setUser($row["id_user"]);
                }
                return $roleResult;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

    }
?>