<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\ProdWork */

$this->title = 'Создать';
$this->params['breadcrumbs'][] = ['label' => 'Работа по изделию', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prod-work-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>