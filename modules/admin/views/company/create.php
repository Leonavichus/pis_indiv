<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Company */

$this->title = 'Создать';
$this->params['breadcrumbs'][] = ['label' => 'Предприятие', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>