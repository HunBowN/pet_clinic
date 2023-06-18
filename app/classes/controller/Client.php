<?php
class controller_Client extends Controller
{
    public function index()
    {
        $this->title = 'CreateClient';

        $client = Model::factory('Client');
        $clientData = $client->getAll();

        $pets = Model::factory('Pet')->getAll();

        return $this->render(
            'pages/client/client_create',
            [
                "clientData" => $clientData,
                "title" => 'Create client',
                "pets" => $pets,
            ]
        );
    }
    public function createClient()
    {

        $_POST = json_decode(file_get_contents('php://input'), true);

        $insertData = $_POST;

        $client = Model::factory('Client');

        $date = date('Y-m-d H:i:s');

        $insertData['created'] = $date;

        $petId = $insertData['pet_id'];
        unset($insertData['pet_id']);

        $insertId = $client->create($insertData);

        $client->setPetsToClient($petId, $insertId);

        $name = ucfirst($insertData['name']);

        if (!$insertId) {
            $content = ["error" => true, "status" => 200, "message" => "Ошибка добавления клиента"];
        } else {
            $content = ["error" => false, "status" => 200, "message" => "Клиент $name удачно зарегестрирован"];
        }
        return $this->jsonResponse($content);

    }
    public function showAll()
    {

        $this->title = 'Pets';

        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $recordsPerPage = 10;

        $fromRecordNum = ($recordsPerPage * $page) - $recordsPerPage;

        $client = Model::factory('Client');
        $clientData = $client->getClientsWithPets($fromRecordNum, $recordsPerPage);

        $entitiesCount = $client->getRowsCount();

        return $this->render(
            'pages/client/clients',
            [
                "title" => 'Clients list',
                "entitiesCount" => $entitiesCount,
                "page" => $page,
                "recordsPerPage" => $recordsPerPage,
                "clientData" => $clientData,
                "recordsPerPage" => $recordsPerPage,

            ]
        );
    }

    public function getUpdateClientPage($params)
    {

        $id = $params['id'];
        $this->title = "Client id: $id";

        $petObj = Model::factory('Pet');
        $pets = $petObj->getAll();

        $clientObj = Model::factory('Client');
        $client = $clientObj->getById($id);

        return $this->render(
            'pages/client/update_client',
            [
                "title" => "Client id: $id",
                "pets" => $pets,
                "client" => $client,

            ]
        );

    }

    public function updateClient($params)
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $id = $params['id'];

        $client = Model::factory('Client');

        $clientUpdate = $client->update($data, $id);

        $petIdArr = $data['pet_id'];
        $client->setPetsToClient($petIdArr, $id);

        if ($clientUpdate['error']) {
            $content = ["error" => true, "status" => 200, "message" => "Ошибка обновления клиента, $clientUpdate[message]"];
        } else {
            $content = ["error" => false, "status" => 200, "message" => "Клиент id: $id удачно обновлен"];
        }
        return $this->jsonResponse($content);
    }


    public function getClient($params)
    {
        $id = $params['id'];
        $clientObj = Model::factory('Client');
        $client = $clientObj->getOneClientWithPets($id);

        return $this->render(
            'pages/client/client',
            [
                "title" => "Client id: $id",
                "client" => $client,
                // "ownerName" => $ownerName,
                // "type" => $type,
            ]
        );
    }
    public function deleteClient($params)
    {
        $id = $params['id'];
        $client = Model::factory('Client');
        $client->deleteById($id);
        return $this->jsonResponse(
            [
                "error" => false,
                "status" => 200,
                "message" => "Клиент удален",
                "link" => false
            ]
        );
    }
    public function searchClient()
    {
        $clientName = $_GET['name'];
        $client = Model::factory('Client')->search($clientName);

        return $this->jsonResponse(
            [
                "error" => false,
                "status" => 200,
                "message" => "Клиент найден",
                "link" => false,
                "client" => $client,
            ]
        );
    }
}