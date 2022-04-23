<h1>Регистрация</h1>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin() ?>
<?= $form->field($model, 'username')->label('Имя') ?>
<?= $form->field($model, 'password')->label('Пароль')->passwordInput() ?>
<div class="form-group">
    <div>
        <?= Html::submitButton('Регистрация', ['class' => 'btn btn-success']) ?>
    </div>
</div>
<?php ActiveForm::end() ?>