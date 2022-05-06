<?php

use app\modules\admin\models\Product;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\BrigProd */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="brig-prod-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_product')->dropDownList(ArrayHelper::map(Product::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'id_workers')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>