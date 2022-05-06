<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\modules\admin\models\LabInfo;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\LabInfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Журнал лабораторий';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lab-info-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            // 'id_product',
            [
                'attribute' => 'id_product',
                'value' => function ($data) {
                    return $data->product->name;
                }
            ],
            // 'id_quipment',
            [
                'attribute' => 'id_quipment',
                'value' => function ($data) {
                    return $data->quipment->name;
                }
            ],
            // 'id_workers',
            [
                'attribute' => 'id_workers',
                'value' => function ($data) {
                    return $data->workers->fullname;
                }
            ],
            // 'id_lab',
            [
                'attribute' => 'id_lab',
                'value' => function ($data) {
                    return $data->lab->name;
                }
            ],
            'date_start',
            'date_end',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, LabInfo $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>