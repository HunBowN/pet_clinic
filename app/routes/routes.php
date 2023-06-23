<?php

return [
    new Route('/','Main','index', 'GET'),
    
    new Route('/pet','Pet','index', 'GET'),
    new Route('/pet/create','Pet','createPet', 'POST'),
    new Route('/pets','Pet','showAll', 'GET'),
    new Route('/pet/:id','Pet','getPet', 'GET'),
    new Route('/pet/:id','Pet','deletePet', 'DELETE'),
    new Route('/pet/update/:id','Pet','getUpdatePetPage', 'GET'),
    new Route('/pet/update/:id','Pet','updatePet', 'PATCH'),
    new Route('/pets/search','Pet','searchPet', 'GET'),

    new Route('/client','Client','index', 'GET'),
    new Route('/client/create','Client','createClient', 'POST'),
    new Route('/clients','Client','showAll', 'GET'),
    new Route('/client/:id','Client','getClient', 'GET'),
    new Route('/client/:id','Client','deleteClient', 'DELETE'),
    new Route('/client/update/:id','Client','getUpdateClientPage', 'GET'),
    new Route('/client/update/:id','Client','updateClient', 'PATCH'),
    new Route('/clients/search','Client','searchClient', 'GET'),
];