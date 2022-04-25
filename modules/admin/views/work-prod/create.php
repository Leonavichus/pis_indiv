<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\WorkProd */

$this->title = 'Create Work Prod';
$this->params['breadcrumbs'][] = ['label' => 'Work Prods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-prod-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
