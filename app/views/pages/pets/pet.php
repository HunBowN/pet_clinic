<div class="page-header">
            	<h1><?= $title ?></h1>
</div>

<div class="right-button-margin">
    <a href="/pets" class="btn btn-primary pull-right">
        <span class="glyphicon glyphicon-list"></span> Просмотр всех питомцев
    </a>
</div>

<table class="table table-hover table-responsive table-bordered">
    <tr>
        <td>Кличка</td>
        <td><?= $pet['name']; ?></td>
    </tr>
    <tr>
        <td>Вид</td>
        <td><?= $type; ?></td>
    </tr>
    <tr>
        <td>Владелец</td>
        <td><?= $ownerName; ?></td>
    </tr>
    <tr>
        <td>Дата рождения</td>
        <td><?= $pet['birthday']; ?></td>
    </tr>
    
</table>