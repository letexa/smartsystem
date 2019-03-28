<h1>Анкета</h1>

<a href="/index/edit">Редактировать</a>

<div class="row">
    <div class="col-2">
        <strong>Фамилия:</strong>
    </div>
    <div class="col">
        <?= $user['lastname'] ?>
    </div>
</div>
<div class="row">
    <div class="col-2">
        <strong>Имя:</strong>
    </div>
    <div class="col">
        <?= $user['name'] ?>
    </div>
</div>
<div class="row">
    <div class="col-2">
        <strong>Отчество:</strong>
    </div>
    <div class="col">
        <?= $user['patronymic'] ?>
    </div>
</div>
<div class="row">
    <div class="col-2">
        <strong>Дата рождения:</strong>
    </div>
    <div class="col">
        <?= $user['date'] ?>
    </div>
</div>

<?php if ($fields) { ?>
    <?php foreach($fields as $field) { ?>
        <div class="row">
            <div class="col-2">
                <strong><?= $field['name'] ?>:</strong>
            </div>
            <div class="col">
                <?= $field['value'] ?>
            </div>
        </div>
    <?php } ?>
<?php } ?>

