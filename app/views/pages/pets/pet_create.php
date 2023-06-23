<div class="page-header">
            	<h1><?= $title ?></h1>
</div>

<div class="right-button-margin">
    <a href="/pets" class="btn btn-primary pull-right">
        <span class="glyphicon glyphicon-list"></span> Просмотр всех питомцев
    </a>
</div>

<div id="alert" class="alert"></div>

<div class="table-wrapper">
    <form id="myForm" method="post">
    
        <table class="table table-inverse table-hover table-responsive table-bordered ">
    
            <tr>
                <td>Имя</td>
                <td><input type="text" name="name" class="form-control" required/></td>
            </tr>
    
            <tr>
                <td>Вид</td>
                <td>
                    <?php 

                    echo "<select class='form-control' name='type_id' required>";
                    echo "<option value=''>Тип животного...</option>";
                    
                    foreach ($petTypes as $type) {
                        echo "<option value='{$type['id']}'>{$type['type_name']}</option>";
                    }
                    echo "</select>";
                    ?>
                    

                </td>
            </tr>
    
            <tr>
                <td>Дата рождения</td>
                <td><input type="date" name="birthday" class="form-control" required></td>
            </tr>
    
            <tr>
                <td>Владелец</td>
                <td>
                    <?php 

                    echo "<select class='form-control' name='owner_id' required>";
                    echo "<option value=''>Выбрать владельца...</option>";
                    
                    foreach ($clientData as $client) {
                        echo "<option value='{$client['id']}'>{$client['name']} {$client['lastname']}</option>";
                    }
                    echo "</select>";
                    ?>

                </td>
            </tr>
    
            <tr>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-primary">Создать</button>
                </td>
            </tr>
    
        </table>
    </form>
</div>