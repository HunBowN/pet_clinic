<div class="page-header">
            	<h1><?= $title ?></h1>
</div>

<?php
echo "<form id='searchClientForm' role='search' action=''>";
echo "<div class='input-group col-md-3 pull-left margin-right-1em'>";
echo "<input type='text' id='searchInput' class='form-control' placeholder='Введите имя клиента ...' name='name' required />";
echo "<div class='input-group-btn'>";
echo "<button class='btn btn-primary' type='submit'><i class='glyphicon glyphicon-search'></i></button>";
echo "</div>";
echo "</div>";
echo "</form>";
?>

<div class='right-button-margin'>
<a href='/client' class="btn btn-primary pull-right">
<span class="glyphicon glyphicon-plus"></span> Добавить клиента
</a>
</div>

<?php

if ($entitiesCount > 0) {

echo "<table id='table' class='table table-hover table-responsive table-bordered table-condensed'>";
    echo "<tr>";
        echo "<th class='col-lg-2'>Полное имя</th>";
        echo "<th class='col-lg-2'>Контакты</th>";
        echo "<th class='col-lg-2'>Питомцы</th>";
        echo "<th class='col-lg-1'>Дата рождения</th>";
        echo "<th class='col-lg-5'>Действия</th>";
    echo "</tr>";

foreach ($clientData as $client) {

        extract($client);

        echo "<tr id='tableContent'>";
            echo "<td>{$name} {$lastname}</td>";
            echo "<td>Тел: {$phone} <br> emal: {$email}</td>";
            echo "<td>{$pet_name}</td>";
            echo "<td>{$birthday}</td>";

            echo "<td class='customCol'>";
                echo "<a id='getClient' data-method='get' data-id='{$id}' class='btn btn-primary left-margin'>
    <span class='glyphicon glyphicon-list'></span> Просмотр
        </a>

        <a id='getUpdateClientPage' data-method='get' data-id='{$id}' class='btn btn-info left-margin'>
            <span class='glyphicon glyphicon-edit'></span> Редактировать
        </a>

        <a id='deleteClientBtn' data-method='delete' data-id='{$id}' class='btn btn-danger delete-object'>
            <span class='glyphicon glyphicon-remove'></span> Удалить
        </a>
";
            echo "</td>";

        echo "</tr>";

    }

echo "</table>";

$page_url = "/clients?";
$path = FROOT . '/app/views/pages/pagin.php';

include_once $path;
}

else {
echo "<div class='alert alert-info'>Питомцы не найдены.</div>";
}