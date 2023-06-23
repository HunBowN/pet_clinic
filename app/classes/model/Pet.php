<?php
class Model_Pet extends Model
{

    public function create($params)
    {
        return $this->insert($params);
    }
    public function update($data, $id)
    {
        $query = "UPDATE `$this->tableName` SET name = '$data[name]', type_id = '$data[type_id]', birthday = '$data[birthday]', owner_id  = '$data[owner_id]' WHERE id = $id";
        try {
            $this->singleQuery($query);
        } catch (\Exception $e) {
            return ["error" => true, "message" => $e->getMessage()];
        }
    }

    public function getAllTypes()
    {
        $query = "SELECT * FROM pet_types";
        return $this->multipleQuery($query);
    }
    public function getOwnerName($id)
    {
        $ownerObj = Model::factory('Client');
        $owner = $ownerObj->getById($id);
        $ownerFullName = $owner['name'] . ' ' . $owner['lastname'];
        return $ownerFullName;
    }
    public function getPetType($array, $id)
    {
        foreach ($array as $arr) {
            if (($arr['id'] == $id)) {
                return $arr['type_name'];
            }
        }
    }

    public function search($name)
    {
        $query = "SELECT pet.id, pet.name, pet.birthday, t.type_name as type_name, c.name as owner_name, c.lastname as owner_lastname 
        FROM `pets` pet 
        LEFT JOIN pet_types t ON pet.type_id = t.id 
        LEFT JOIN clients c ON pet.owner_id = c.id 
        WHERE pet.name = '$name' 
        ORDER BY pet.name ASC;";

        return $this->multipleQuery($query);
    }

    public function getAllPets($limit, $offset)
    {
        return $this->multipleQuery("SELECT * FROM " . $this->tableName . " ORDER BY name ASC LIMIT {$limit}, {$offset};");
    }

}