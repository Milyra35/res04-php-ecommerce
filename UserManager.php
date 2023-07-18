<?php 

class UserManager extends AbstractManager
{
    private PDO $db;
    

    // création de user
    public function insert(User $user) : ?User
    {
        $query = $this->db->prepare("INSERT INTO users(id,firstName,lastName, email, password) VALUES (null, :firstName,:lastName, :email, :password)");
        $parameters = [
            "firstName" => $user->getfirstName(),
            "lastName" => $user->getlastName(),
            "email" => $user->getEmail(),
            "password" => $user->getPassword()
        ];
        
        $query->execute($parameters);

        $user->setId($this->db->lastInsertId());
        return $user;

    }
    
    
    
    public function update(User $user) : ?User 
    {
        
    }
    
    public function delete(User $user) : ?void
    {
        
    }
    
    //reccuperation d'un user avec id
    public function getUserById(int $id) : ?User
    {
        
        $query = $this->db->prepare("SELECT * FROM users WHERE users.id = :id");
        $parameters = [
            "id" => $id
        ];
        $query->execute($parameters);
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if($result !== false)
        {
            $user = new User($result["firstName"],$result["lastName"], $result["email"], $result["password"]);
            $user->setId($result["id"]);

            return $user;
        }

        return null;
    

    }
    
    public function selectAll() : array
    {
    
        $list = [];
        $query = $this->db->prepare("SELECT * FROM users");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        if($result !== false)
        {
            foreach($result as $item)
            {
                $user->setId($item["id"]);
                $user = new User($item["firstName"]);
                $user = new User($item["lastName"]);
                $list[] = $user;
            }
        }

        return $list;
    
    }
}