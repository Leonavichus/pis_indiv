<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\LabInfo */

$this->title = 'Create Lab Info';
$this->params['breadcrumbs'][] = ['label' => 'Lab Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lab-info-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
