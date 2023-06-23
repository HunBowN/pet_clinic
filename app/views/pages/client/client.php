<div class="page-header">
            	<h1><?= $title ?></h1>
</div>

<div class="right-button-margin">
    <a href="/clients" class="btn btn-primary pull-right">
        <span class="glyphicon glyphicon-list"></span> Просмотр всех клиентов
    </a>
</div>

<table class="table table-hover table-responsive table-bordered">
    <tr>
        <td>Имя/Фамилия</td>
        <td><?= $client['name'] . ' ' . $client['lastname']; ?></td>
    </tr>
    <tr>
        <td>Контакты</td>
        <td>Тел: <?=  $client['phone'] . '<br>email: ' . $client['email']; ?></td>
    </tr>
    <tr>
        <td>Питомцы</td>
        <td><?= $client['pet_name']; ?></td>
    </tr>
    <tr>
        <td>Дата рождения</td>
        <td><?= $client['birthday']; ?></td>
    </tr>
    
</table>