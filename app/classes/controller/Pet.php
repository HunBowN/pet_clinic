<?php
class controller_Pet extends Controller
{
    public function index()
    {
        $this->title = 'CreatePet';

        $client = Model::factory('Client');
        $clientData = $client->getAll();

        $pet = Model::factory('Pet');
        $petTypes = $pet->getAllTypes();

        return $this->render(
            'pages/pets/pet_create',
            [
                "clientData" => $clientData,
                "title" => 'Create pet',
                "petTypes" => $petTypes,
            ]
        );
    }
    public function createPet()
    {

        $_POST = json_decode(file_get_contents('php://input'), true);

        $insertData = $_POST;

        $pet = Model::factory('Pet');

        $date = date('Y-m-d H:i:s');

        $insertData['created'] = $date;
        $params = $pet->create($insertData);

        $name = ucfirst($insertData['name']);

        if (!$params) {
            $content = ["error" => true, "status" => 200, "message" => "Ошибка добавления питомца"];
        } else {
            $content = ["error" => false, "status" => 200, "message" => "Питомец $name удачно зарегестрирован"];
        }
        return $this->jsonResponse($content);

    }
    public function showAll()
    {

        $this->title = 'Pets';

        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $recordsPerPage = 10;
        $fromRecordNum = ($recordsPerPage * $page) - $recordsPerPage;

        $pet = Model::factory('Pet');
        $petTypes = $pet->getAllTypes();
        $pets = $pet->getAllPets($fromRecordNum, $recordsPerPage);
        $client = Model::factory('Client');
        $clientData = $client->getAll();

        $entitiesCount = $pet->getRowsCount();

        return $this->render(
            'pages/pets/pets',
            [
                "title" => 'Pets list',
                "pets" => $pets,
                "entitiesCount" => $entitiesCount,
                "page" => $page,
                "recordsPerPage" => $recordsPerPage,
                "petTypes" => $petTypes,
                "clientData" => $clientData,

            ]
        );
    }

    public function getUpdatePetPage($params)
    {

        $id = $params['id'];
        $this->title = "Pet $id";

        $petObj = Model::factory('Pet');
        $pet = $petObj->getById($id);

        $client = Model::factory('Client');
        $clientData = $client->getAll();

        $petTypes = $petObj->getAllTypes();

        return $this->render(
            'pages/pets/update_pet',
            [
                "title" => "PET id: $id",
                "pet" => $pet,
                "clientData" => $clientData,
                "petTypes" => $petTypes,

            ]
        );

    }

    public function updatePet($params)
    {

        $data = json_decode(file_get_contents('php://input'), true);
        $id = $params['id'];

        $pet = Model::factory('Pet');

        $petUpdate = $pet->update($data, $id);

        if ($petUpdate['error']) {
            $content = ["error" => true, "status" => 200, "message" => "Ошибка обновления питомца, $petUpdate[message]"];
        } else {
            $content = ["error" => false, "status" => 200, "message" => "Питомец id: $id удачно обновлен"];
        }
        return $this->jsonResponse($content);
    }


    public function getPet($params)
    {
        $id = $params['id'];
        $petObj = Model::factory('Pet');
        $pet = $petObj->getById($id);
        $petTypes = $petObj->getAllTypes();
        $petTypeId = $pet['type_id'];

        $type = $petObj->getPetType($petTypes, $petTypeId);

        $ownerName = $petObj->getOwnerName($pet['owner_id']);

        return $this->render(
            'pages/pets/pet',
            [
                "title" => "PET id: $id",
                "pet" => $pet,
                "ownerName" => $ownerName,
                "type" => $type,
            ]
        );
    }
    public function deletePet($params)
    {
        $id = $params['id'];
        $pet = Model::factory('Pet');
        $pet->deleteById($id);
        return $this->jsonResponse(
            [
                "error" => false,
                "status" => 200,
                "message" => "Питомец удален",
                "link" => false
            ]
        );
    }
    public function searchPet()
    {
        $petName = $_GET['name'];
        $pet = Model::factory('Pet')->search($petName);

        return $this->jsonResponse(
            [
                "error" => false,
                "status" => 200,
                "message" => "Питомец найден",
                "link" => false,
                "pet" => $pet,
            ]
        );
    }
}