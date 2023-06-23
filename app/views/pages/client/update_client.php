<div class="page-header">
            	<h1><?= $title ?></h1>
</div>

<div class="right-button-margin">
    <a href="/clients" class="btn btn-primary pull-right">
        <span class="glyphicon glyphicon-list"></span> Просмотр всех клиентов
    </a>
</div>

<div id="alert" class="alert"></div>

<div class="table-wrapper">
    <form id="updateCleintForm" data-id="<?= $client['id'] ?>" method="patch">
    
        <table class="table table-inverse table-hover table-responsive table-bordered ">
    
            <tr>
                <td>Имя</td>
                <td><input type="text" name="name" value="<?=$client['name']?>" class="form-control" required/></td>
            </tr>
            <tr>
                <td>Фамилия</td>
                <td><input type="text" name="lastname" value="<?=$client['lastname']?>" class="form-control" required/></td>
            </tr>
            <tr>
                <td>Телефон</td>
                <td><input type="text" id="phone" name="phone" value="<?=$client['phone']?>" class="form-control" required/></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" value="<?=$client['email']?>" class="form-control" required/></td>
            </tr>

            <tr>
                <td>Дата рождения</td>
                <td><input type="date" name="birthday" value="<?=$client['birthday']?>" class="form-control" required></td>
            </tr>
    
            <tr>
                <td>Питомец</td>
                <td>
                    <?php 

                        echo "<select class='form-control' name='pet_id' required multiple>";
                        echo "<option selected disabled value=''>Выбрать питомца...</option>";

                        foreach ($pets as $pet) {

                            if($pet['owner_id'] == $client['id']) {
                                echo "<option value='{$pet['id']}' selected>{$pet['name']}</option>";
                            } else {
                                echo "<option value='{$pet['id']}'>{$pet['name']}</option>";
                            }
                        }
                        echo "</select>";

                    // echo "<select class='form-control' name='pet_id' required>";
                    // echo "<option value=''>Выбрать питомца...</option>";
                    
                    // foreach ($pets as $pet) {
                    //     echo "<option value='{$pet['id']}'>{$pet['name']}</option>";
                    // }
                    // echo "</select>";
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