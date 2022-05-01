<?php

/** @var yii\web\View $this */

use app\modules\admin\models\Category;
use app\modules\admin\models\LabInfo;
use app\modules\admin\models\Laboratory;
use app\modules\admin\models\Product;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Запрос №12';
?>
<div class="site-lab2">
    <h5 class="alert alert-success"><?= Html::encode($this->title) ?></h5>

    <?php $from = ActiveForm::begin(); ?>
    <?= $from->field($model, 'product')->dropDownList(ArrayHelper::map(Product::find()->all(), 'id', 'name'))->label('Изделие') ?>
    <?= $from->field($model, 'category')->dropDownList(ArrayHelper::map(Category::find()->all(), 'id', 'name'))->label('Категория') ?>
    <?= $from->field($model, 'laboratory')->dropDownList(ArrayHelper::map(Laboratory::find()->all(), 'id', 'name'))->label('Лаборатория') ?>
    <?= $from->field($model, 'sdate')->label('Дата начала') ?>
    <?= $from->field($model, 'edate')->label('Дата конца') ?>
    <?= Html::submitButton('Найти', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>

    <?php $from = ActiveForm::begin(); ?>
    <?= $from->field($model, 'product')->hiddenInput(['value' => '%'])->label(false) ?>
    <?= $from->field($model, 'category')->hiddenInput(['value' => '%'])->label(false) ?>
    <?= $from->field($model, 'laboratory')->hiddenInput(['value' => '%'])->label(false) ?>
    <?= $from->field($model, 'sdate')->hiddenInput(['value' => '1970-01-01'])->label(false) ?>
    <?= $from->field($model, 'edate')->hiddenInput(['value' => '9999-12-31'])->label(false) ?>
    <?= Html::submitButton('Показать всё', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>
    <br>

    <table class="table table-condensed">
        <tr>
            <th>Испытатель</th>
            <th>Изделие</th>
            <th>Категория</th>
            <th>Лаборатория</th>
            <th>Дата начала</th>
            <th>Дата конца</th>
        </tr>
        <?php foreach ($search as $s) : ?>
            <tr>
                <td><?php echo $s['fullname']; ?></td>
                <td><?php echo $s['pname']; ?></td>
                <td><?php echo $s['cname']; ?></td>
                <td><?php echo $s['lname']; ?></td>
                <td><?php echo $s['date_start']; ?></td>
                <td><?php echo $s['date_end']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>