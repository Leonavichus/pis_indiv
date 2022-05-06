<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\LabInfo */

$this->title = 'Сохранить';
$this->params['breadcrumbs'][] = ['label' => 'Журнал лабораторий', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lab-info-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>