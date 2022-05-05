<?php

/** @var yii\web\View $this */

use app\modules\admin\models\Company;
use app\modules\admin\models\Workshop;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Запрос №4';
?>
<div class="site-lab2">
    <h5 class="alert alert-success"><?= Html::encode($this->title) ?></h5>

    <?php $from = ActiveForm::begin(); ?>
    <?= $from->field($model, 'workshop')->dropDownList(ArrayHelper::map(Workshop::find()->all(), 'id', 'name'))->label('Цех') ?>
    <?= $from->field($model, 'company')->dropDownList(ArrayHelper::map(Company::find()->all(), 'id', 'name'))->label('Компания') ?>
    <?= Html::submitButton('Найти', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>

    <?php $from = ActiveForm::begin(); ?>
    <?= $from->field($model, 'workshop')->hiddenInput(['value' => '%'])->label(false) ?>
    <?= $from->field($model, 'company')->hiddenInput(['value' => '%'])->label(false) ?>
    <?= Html::submitButton('Показать всё', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>
    <br>

    <table class="table table-condensed">
        <tr>
            <th>Цех</th>
            <th>Кол-во участков</th>
            <th>Компания</th>
            <th>Начальник</th>
        </tr>
        <?php foreach ($search as $s) : ?>
            <tr>
                <td><?php echo $s['wname']; ?></td>
                <td><?php echo $s['spcount']; ?></td>
                <td> <?php echo $s['cname']; ?></td>
                <td><?php echo $s['fullname']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>