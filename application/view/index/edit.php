<?php
    $field_index = 0;
?>

<h1>Анкета</h1>
<form method="post" action="/index/edit">
    <div class="form-group">
        <label for="inputLastname">Фамилия</label>
        <input type="text" name="lastname" 
               class="form-control <?= array_search('lastname', $errors) !== false ? 'is-invalid' : '' ?>" 
               id="inputLastname" 
               placeholder="Введите фамилию" 
               value="<?= !empty($user['lastname']) ? $user['lastname'] : '' ?>"
        >
    </div>
    <div class="form-group">
        <label for="inputName">Имя</label>
        <input type="text" name="name" 
               class="form-control <?= array_search('name', $errors) !== false ? 'is-invalid' : '' ?>" 
               id="inputName" 
               placeholder="Введите имя"
               value="<?= !empty($user['name']) ? $user['name'] : '' ?>"
        >
    </div>
    <div class="form-group">
        <label for="inputPatronymic">Отчество</label>
        <input type="text" name="patronymic" 
               class="form-control <?= array_search('patronymic', $errors) !== false ? 'is-invalid' : '' ?>" 
               id="inputPatronymic" 
               placeholder="Введите отчество"
               value="<?= !empty($user['patronymic']) ? $user['patronymic'] : '' ?>"
        >
    </div>
    <div class="form-group">
        <label for="inputDate">Дата рождения</label>
        <input type="date" name="date" 
               class="form-control <?= array_search('date', $errors) !== false ? 'is-invalid' : '' ?>" 
               id="inputPatronymic" 
               placeholder="Введите дату рождения"
               value="<?= !empty($user['date']) ? $user['date'] : '' ?>"
        >
    </div>
    
    <?php if ($fields) { ?>
        <?php foreach($fields as $field) { ?>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm">
                        <label>Название поля</label>
                        <input type="text" name="field[<?=$field_index  ?>][name]" class="form-control" value="<?= $field['name'] ?>" >
                    </div>
                    <div class="col-sm">
                        <label>Значение</label>
                        <input type="text" name="field[<?=$field_index  ?>][value]" class="form-control" value="<?= $field['value'] ?>" >
                    </div>
                    <div class="col-1 my-auto">
                        <a class="removeField" href="javascript:void(0)">Удалить</a>
                    </div>
                </div>
            </div>
            <?php $field_index += 1; ?>
        <?php } ?>
    <?php } ?>
    
    <div class="form-group">
        <div class="col">
            <a id="addField" href="javascript:void(0)">Добавить поле</a>
        </div>
    </div>
    
    <button type="submit" class="btn btn-primary">Отправить</button>
</form>

<script type="text/javascript">
    $.fn.profile('edit', {
        field_index: <?= $field_index ?>
    });
</script>