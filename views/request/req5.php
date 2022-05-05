<?php

/** @var yii\web\View $this */

use app\modules\admin\models\Product;
use app\modules\admin\models\WorkProd;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Запрос №5';
?>
<div class="site-lab2">
    <h5 class="alert alert-success"><?= Html::encode($this->title) ?></h5>

    <?php $from = ActiveForm::begin(); ?>
    <?= $from->field($model, 'product')->dropDownList(ArrayHelper::map(Product::find()->all(), 'id', 'name'))->label('Изделие') ?>
    <?= Html::submitButton('Найти', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>

    <?php $from = ActiveForm::begin(); ?>
    <?= $from->field($model, 'product')->hiddenInput(['value' => '%'])->label(false) ?>
    <?= Html::submitButton('Показать всё', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>
    <br>

    <table class="table table-condensed">
        <tr>
            <th>Изделие</th>
            <th>Работа над изделием</th>
        </tr>
        <?php foreach ($search as $s) : ?>
            <tr>
                <td><?php echo $s['pname']; ?></td>
                <td><?php echo $s['wname']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>