<div class="right-button-margin">
    <a href="/pets" class="btn btn-primary pull-right">
        <span class="glyphicon glyphicon-list"></span> Просмотр всех питомцев
    </a>
</div>

<div class="page-header">
            	<h1><?= $title ?></h1>
</div>

<div id="alert" class="alert"></div>

<div class="table-wrapper">
    <form id="updatePetForm" data-id="<?= $pet['id'] ?>"  method="patch">
    
        <table class="table table-inverse table-hover table-responsive table-bordered ">
    
            <tr>
                <td>Имя</td>
                <td><input type="text" name="name" value="<?= $pet['name'] ?>" class="form-control" /></td>
            </tr>
    
            <tr>
                <td>Вид</td>
                <td>
                    <?php 

                    echo "<select class='form-control' name='type_id'>";
                    echo "<option selected disabled value=''>Тип животного</option>";
                    
                    foreach ($petTypes as $type) {

                        if($pet['type_id'] == $type['id']) {
                            echo "<option value='{$type['id']}' selected>{$type['type_name']}</option>";
                        } else {
                            echo "<option value='{$type['id']}'>{$type['type_name']}</option>";
                        }
                    }
                    echo "</select>";
                    ?>
                    

                </td>
            </tr>
    
            <tr>
                <td>Дата рождения</td>
                <td><input type="date" name="birthday" value="<?= $pet['birthday'] ?>" class="form-control"></td>
            </tr>
    
            <tr>
                <td>Владелец</td>
                <td>
                    <?php 

                    echo "<select class='form-control' name='owner_id'>";
                    echo "<option selected disabled value=''>Выбрать владельца</option>";
                    
                    foreach ($clientData as $client) {

                        if($pet['owner_id'] == $client['id']) {
                            echo "<option value='{$client['id']}' selected>{$client['name']} {$client['lastname']}</option>";
                        } else {
                            echo "<option value='{$client['id']}'>{$client['name']} {$client['lastname']}</option>";
                        }
                    }
                    echo "</select>";
                    ?>

                </td>
            </tr>
    
            <tr>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-primary">Обновить</button>
                </td>
            </tr>
    
        </table>
    </form>
</div>