<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\BrigProd */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Работа бригад', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="brig-prod-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            // 'id_product',
            [
                'attribute' => 'id_product',
                'value' => function ($data) {
                    return $data->product->name;
                }
            ],
            // 'id_workers',
            [
                'attribute' => 'id_workers',
                'value' => function ($data) {
                    return $data->workers->fullname;
                }
            ],
        ],
    ]) ?>

</div>