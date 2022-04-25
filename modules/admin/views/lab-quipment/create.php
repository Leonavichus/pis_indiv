<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\LabQuipment */

$this->title = 'Create Lab Quipment';
$this->params['breadcrumbs'][] = ['label' => 'Lab Quipments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lab-quipment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
