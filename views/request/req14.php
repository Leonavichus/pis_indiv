<?php

/** @var yii\web\View $this */

use app\modules\admin\models\Category;
use app\modules\admin\models\Company;
use app\modules\admin\models\Workshop;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Запрос №14';
?>
<div class="site-lab2">
    <h5 class="alert alert-success"><?= Html::encode($this->title) ?></h5>

    <?php $from = ActiveForm::begin(); ?>
    <?= $from->field($model, 'category')->dropDownList(ArrayHelper::map(Category::find()->all(), 'id', 'name'))->label('Категория') ?>
    <?= $from->field($model, 'workshop')->dropDownList(ArrayHelper::map(Workshop::find()->all(), 'id', 'name'))->label('Цех') ?>
    <?= $from->field($model, 'company')->dropDownList(ArrayHelper::map(Company::find()->all(), 'id', 'name'))->label('Компания') ?>
    <?= Html::submitButton('Найти', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>

    <?php $from = ActiveForm::begin(); ?>
    <?= $from->field($model, 'category')->hiddenInput(['value' => '%'])->label(false) ?>
    <?= $from->field($model, 'workshop')->hiddenInput(['value' => '%'])->label(false) ?>
    <?= $from->field($model, 'company')->hiddenInput(['value' => '%'])->label(false) ?>
    <?= Html::submitButton('Показать всё', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>
    <br>

    <table class="table table-condensed">
        <tr>
            <th>Изделие</th>
            <th>Категория</th>
            <th>Количество</th>
            <th>Участок</th>
            <th>Цех</th>
            <th>Компания</th>
            <th>Не готово</th>
        </tr>
        <?php foreach ($search as $s) : ?>
            <tr>
                <td><?php echo $s['pname']; ?></td>
                <td><?php echo $s['cname']; ?></td>
                <td><?php echo $s['count']; ?></td>
                <td><?php echo $s['sname']; ?></td>
                <td> <?php echo $s['wname']; ?></td>
                <td><?php echo $s['coname']; ?></td>
                <td><?php echo $s['isReady']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>