<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Laboratory */

$this->title = 'Создать';
$this->params['breadcrumbs'][] = ['label' => 'Лаборатория', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laboratory-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>