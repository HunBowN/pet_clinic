<div class="page-header">
            	<h1><?= $title ?></h1>
</div>

<?php
echo "<form id='searchForm' role='search' action=''>";
echo "<div class='input-group col-md-3 pull-left margin-right-1em'>";
// $search_value = isset($search_term) ? "value='{$search_term}'" : "";
// echo "<input type='text' class='form-control' placeholder='Введите кличку питомца ...' name='s' required {$search_value} />";
echo "<input type='text' id='searchInput' class='form-control' placeholder='Введите кличку питомца ...' name='name' required />";
echo "<div class='input-group-btn'>";
echo "<button class='btn btn-primary' type='submit'><i class='glyphicon glyphicon-search'></i></button>";
echo "</div>";
echo "</div>";
echo "</form>";
?>

<div class='right-button-margin'>
<a href='/pet' class="btn btn-primary pull-right">
<span class="glyphicon glyphicon-plus"></span> Добавить питомца
</a>
</div>

<div id="showAllBtn" class="right-button-margin">
    <a href="/pets" class="btn btn-primary pull-right">
        <span class="glyphicon glyphicon-list"></span> Просмотр всех питомцев
    </a>
</div>

<?php

if ($entitiesCount > 0) {

echo "<table id='table' class='table table-hover table-responsive table-bordered table-condensed'>";
    echo "<tr>";
        echo "<th class='col-lg-2'>Кличка</th>";
        echo "<th class='col-lg-2'>Тип</th>";
        echo "<th class='col-lg-2'>Владелец</th>";
        echo "<th class='col-lg-2'>Дата рождения</th>";
        echo "<th class='col-lg-4'>Действия</th>";
    echo "</tr>";

foreach ($pets as $pet) {

        extract($pet);

        echo "<tr id='tableContent'>";
            echo "<td>{$name}</td>";
            foreach ($petTypes as $type) {

                if($type_id == $type['id']) {
                    echo "<td>$type[type_name]</td>";
                } 
            }
            foreach ($clientData as $client) {

                if($owner_id == $client['id']) {
                    echo "<td>$client[name] $client[lastname]</td>";
                } 
            }
            echo "<td>{$birthday}</td>";

            echo "<td class='customCol'>";
                echo "<a id='getPet' data-method='get' data-id='{$id}' class='btn btn-primary left-margin'>
    <span class='glyphicon glyphicon-list'></span> Просмотр
</a>

<a id='getUpdatePetPage' data-method='get' data-id='{$id}' class='btn btn-info left-margin'>
    <span class='glyphicon glyphicon-edit'></span> Редактировать
</a>

<a id='deleteBtn' data-method='delete' data-id='{$id}' class='btn btn-danger delete-object'>
    <span class='glyphicon glyphicon-remove'></span> Удалить
</a>

";
            echo "</td>";

        echo "</tr>";

    }

echo "</table>";

$page_url = "/pets?";
$path = FROOT . '/app/views/pages/pagin.php';

include_once $path;
}

else {
echo "<div class='alert alert-info'>Питомцы не найдены.</div>";
}