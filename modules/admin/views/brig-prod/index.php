<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\modules\admin\models\BrigProd;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\BrigProdSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Работа бригад';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brig-prod-index">

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
            //'id_product',
            [
                'attribute' => 'id_product',
                'value' => function ($data) {
                    return $data->product->name;
                }
            ],
            //'id_workers',
            [
                'attribute' => 'id_workers',
                'value' => function ($data) {
                    return $data->workers->fullname;
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, BrigProd $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>