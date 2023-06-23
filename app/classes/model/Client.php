<?php
class Model_Client extends Model
{

    public function getById($id)
    {
        return $this->singleQuery("SELECT * FROM `$this->tableName` WHERE `id` = $id;");
    }

    public function getAllClients()
    {
        return $this->multipleQuery("SELECT * FROM `$this->tableName`;");
    }
    public function create($params)
    {
        return $this->insert($params);
    }

    public function update($data, $id)
    {
        $query = "UPDATE `$this->tableName` 
            SET 
            name = '$data[name]', 
            lastname = '$data[lastname]', 
            phone  = '$data[phone]', 
            email  = '$data[email]',
            birthday = '$data[birthday]' 
            WHERE id = $id";

        try {
            $this->singleQuery($query);
        } catch (\Exception $e) {
            return ["error" => true, "message" => $e->getMessage()];
        }
    }
    public function setPetsToClient($petIdArr, $ownerId)
    {
        foreach ($petIdArr as $id) {
            $query = "UPDATE `pets` 
                SET 
                owner_id = '$ownerId'
                WHERE id = $id";
            $this->singleQuery($query);
        }
    }

    public function search($name)
    {
        $query = "SELECT c.id, c.name, c.lastname, c.phone, c.email, c.birthday, GROUP_CONCAT(pet.name) as pet_name 
            FROM `clients` c 
            LEFT JOIN pets pet ON pet.owner_id = c.id  
            WHERE c.name LIKE '$name' OR c.lastname LIKE '$name' 
            GROUP BY c.id;
            ;
            ";

        return $this->multipleQuery($query);
    }

    public function getClientPets($id)
    {
        $query = "SELECT * FROM `pets` WHERE owner_id = $id;";
        return $this->multipleQuery($query);
    }
    public function getClientsWithPets($limit, $offset)
    {
        $query = "SELECT c.id, c.name, c.lastname, c.phone, c.email, c.birthday, GROUP_CONCAT(pet.name) as pet_name 
            FROM `clients` c 
            LEFT JOIN pets pet ON pet.owner_id = c.id 
            GROUP BY c.id LIMIT {$limit}, {$offset};
            ";

        return $this->multipleQuery($query);
    }
    public function getOneClientWithPets($id)
    {
        $query = "SELECT c.id, c.name, c.lastname, c.phone, c.email, c.birthday, GROUP_CONCAT(pet.name) as pet_name 
            FROM `clients` c 
            LEFT JOIN pets pet ON pet.owner_id = c.id 
            WHERE c.id = $id
            GROUP BY c.id;
            ";
        return $this->singleQuery($query);
    }
}